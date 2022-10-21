<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyPart>
 */
class PropertyPartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type_id' => rand(1, 4),
            'cadastral_designation' => fake()->numberBetween(9999999999, 100000000000),
            'area_ha' => fake()->randomFloat(2, 2, 150),
            'measured_at' => fake()->date,
        ];
    }

}
