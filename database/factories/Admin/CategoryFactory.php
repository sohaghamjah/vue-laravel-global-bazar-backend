<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = "upload/category/" . $this->faker->numberBetween(1, 10) . ".png";
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'image' => $this->faker->imageUrl('350', '350'),
            'image' => $image,
        ];
    }
}
