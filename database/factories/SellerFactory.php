<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = 'upload/category/' . $this->faker->numberBetween(1, 10) . '.png';
        return [
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'shop_name' => fake()->name(),
            'image' => $image,
            'slug' => fake()->slug(),
            'email_verified_at' => now(),
            'password' => '12345678', // password
            'remember_token' => Str::random(10),
            'is_verified' => 1,
        ];
    }
}
