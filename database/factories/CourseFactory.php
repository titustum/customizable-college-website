<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_KE');

        $department = Department::inRandomOrder()->first() ?? Department::factory();

        return [
            'department_id' => $department->id,
            'name' => $faker->randomElement([
                'Diploma in '.$department->name,
                'Certificate in '.$department->name,
                'Artisan in '.$department->name,
            ]),
            'photo' => 'image-placeholder.webp',
            'requirement' => $faker->randomElement([
                'KCSE C+ and above',
                'KCSE D+ or relevant Certificate',
                'KCSE D (plain) and Artisan Certificate',
            ]),
            'duration' => $faker->randomElement([
                '2 years', '3 years', '1 year', '6 months',
            ]),
            'exam_body' => $faker->randomElement([
                'KNEC', 'TVETA', 'CDACC', 'NITA',
            ]),
        ];
    }
}
