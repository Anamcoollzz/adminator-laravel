<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CrudExample>
 */
class CrudExampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'office' => $this->faker->city(),
            'age' => $this->faker->numberBetween(18, 70),
            'salary' => $this->faker->randomFloat(0, 30000, 1500000),
        ];
    }
}
