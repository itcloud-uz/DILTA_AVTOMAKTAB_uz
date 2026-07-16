<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    protected $model = SchoolClass::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grades = ['5', '6', '7', '8', '9', '10', '11'];
        $letters = ['A', 'B', 'C', 'D'];
        
        return [
            'name' => $this->faker->unique()->randomElement($grades) . '-' . $this->faker->randomElement($letters),
        ];
    }
}
