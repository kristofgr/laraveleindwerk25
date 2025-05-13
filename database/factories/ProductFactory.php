<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_ids = Category::pluck('id');


        // return fake products with name and description
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'category_id' => $category_ids->random()
        ];
    }
}
