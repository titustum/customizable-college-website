<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_KE');

        $name = $faker->unique()->word.' Department';

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'photo' => 'departments/placeholder.png',
            'short_desc' => $faker->realText(80),
            'full_desc' => $faker->realText(500),
            'banner_pic' => 'departments/placeholder.png',
        ];
    }
}
