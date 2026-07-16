<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Matematika', 'Fizika', 'Kimyo', 'Biologiya', 'Tarix',
            'Ona tili', 'Adabiyot', 'Ingliz tili', 'Informatika', 'Geografiya',
            'Jismoniy tarbiya', 'Tasviriy san\'at', 'Musiqa', 'Nemis tili', 'Rus tili'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($subjects),
        ];
    }
}
