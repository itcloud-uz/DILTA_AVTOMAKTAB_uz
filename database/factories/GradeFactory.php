<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    protected $model = Grade::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'teacher_id' => User::factory(),
            'score' => $this->faker->numberBetween(2, 5), // 2, 3, 4, 5
            'date' => $this->faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
        ];
    }
}
