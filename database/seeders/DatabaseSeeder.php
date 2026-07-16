<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create teachers (Users)
        $teachers = User::factory(5)->create();
        
        // Add a default test teacher that we can easily log in with
        $testTeacher = User::factory()->create([
            'name' => 'Oqituvchi Test',
            'email' => 'teacher@kundalik.com',
            'password' => bcrypt('password123'),
        ]);
        $allTeachers = $teachers->concat([$testTeacher]);

        // 2. Create 10 subjects
        $subjects = Subject::factory(10)->create();

        // 3. Create 5 classes
        $classes = SchoolClass::factory(5)->create();

        // 4. For each class, create 20 students
        foreach ($classes as $class) {
            $students = Student::factory(20)->create([
                'school_class_id' => $class->id
            ]);

            // 5. For each student, generate some random grades
            foreach ($students as $student) {
                // Generate between 5 and 15 random grades per student
                $gradeCount = rand(5, 15);
                
                for ($i = 0; $i < $gradeCount; $i++) {
                    Grade::factory()->create([
                        'student_id' => $student->id,
                        'subject_id' => $subjects->random()->id,
                        'teacher_id' => $allTeachers->random()->id,
                    ]);
                }
            }
        }

        // Seed YHQ Questions
        $this->call(QuestionSeeder::class);
    }
}

