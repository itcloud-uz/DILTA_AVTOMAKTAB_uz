<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KundalikApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $teacher;
    protected SchoolClass $class;
    protected Student $student;
    protected Subject $subject;

    protected function setUp(): void
    {
        parent::setUp();

        // Create standard test data
        $this->teacher = User::factory()->create([
            'name' => 'Oqituvchi Test',
            'email' => 'teacher@test.com',
            'password' => bcrypt('password123'),
        ]);

        $this->class = SchoolClass::factory()->create(['name' => '9-A']);
        $this->student = Student::factory()->create([
            'school_class_id' => $this->class->id,
            'first_name' => 'Sardor',
            'last_name' => 'Rahimov',
            'status' => 'active',
        ]);

        $this->subject = Subject::factory()->create(['name' => 'Matematika']);
    }

    public function test_user_can_access_protected_routes_without_token(): void
    {
        $response = $this->getJson('/api/v1/school-classes');
        $response->assertStatus(200);
    }

    public function test_user_can_login_and_get_token(): void
    {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'teacher@test.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'access_token',
                'token_type',
                'user' => ['id', 'name', 'email']
            ]);
    }

    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'teacher@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_authenticated_teacher_can_list_classes(): void
    {
        $response = $this->actingAs($this->teacher, 'sanctum')
            ->getJson('/api/v1/school-classes');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['name' => '9-A']);
    }

    public function test_can_fetch_class_students_with_grades_endpoint(): void
    {
        // Add a grade first
        Grade::factory()->create([
            'student_id' => $this->student->id,
            'subject_id' => $this->subject->id,
            'teacher_id' => $this->teacher->id,
            'score' => 5,
            'date' => '2026-07-02',
        ]);

        $response = $this->actingAs($this->teacher, 'sanctum')
            ->getJson("/api/v1/school-classes/{$this->class->id}/students-grades");

        $response->assertStatus(200)
            ->assertJsonPath('data.class_name', '9-A')
            ->assertJsonPath('data.students.0.first_name', 'Sardor')
            ->assertJsonPath('data.students.0.grades.0.score', 5)
            ->assertJsonPath('data.students.0.grades.0.subject', 'Matematika');
    }

    public function test_can_create_student_with_validation(): void
    {
        $response = $this->actingAs($this->teacher, 'sanctum')
            ->postJson('/api/v1/students', [
                'school_class_id' => $this->class->id,
                'first_name' => 'Ali',
                'last_name' => 'Valiyev',
                'status' => 'active',
            ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['first_name' => 'Ali']);
            
        $this->assertDatabaseHas('students', [
            'first_name' => 'Ali',
            'last_name' => 'Valiyev',
        ]);
    }

    public function test_cannot_create_student_with_invalid_class(): void
    {
        $response = $this->actingAs($this->teacher, 'sanctum')
            ->postJson('/api/v1/students', [
                'school_class_id' => 999, // Non-existent class
                'first_name' => 'Ali',
                'last_name' => 'Valiyev',
                'status' => 'active',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['school_class_id']);
    }

    public function test_can_add_grade_for_student(): void
    {
        $response = $this->actingAs($this->teacher, 'sanctum')
            ->postJson('/api/v1/grades', [
                'student_id' => $this->student->id,
                'subject_id' => $this->subject->id,
                'score' => 4,
                'date' => '2026-07-02',
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('grades', [
            'student_id' => $this->student->id,
            'subject_id' => $this->subject->id,
            'score' => 4,
            'teacher_id' => $this->teacher->id, // Defaulted to current authenticated teacher
        ]);
    }

    public function test_cannot_add_grade_with_invalid_score(): void
    {
        $response = $this->actingAs($this->teacher, 'sanctum')
            ->postJson('/api/v1/grades', [
                'student_id' => $this->student->id,
                'subject_id' => $this->subject->id,
                'score' => 6, // Invalid score, must be between 1 and 5
                'date' => '2026-07-02',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['score']);
    }
}
