<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_KE');

        return [
            'department_id' => Department::inRandomOrder()->first()?->id ?? Department::factory(),
            'role_id' => Role::inRandomOrder()->first()?->id ?? Role::factory(),
            'section_assigned' => $faker->optional()->randomElement([
                'Games', 'Clubs', 'Research', 'Library', 'Guidance & Counseling', null,
            ]),
            'email' => $faker->unique()->optional()->safeEmail(),
            'name' => $faker->name(),
            'photo' => 'team/placeholder.png',
            'qualification' => $faker->randomElement([
                'BSc. Computer Science', 'Diploma in Agriculture', 'M.Ed in Educational Admin',
                'B.Ed in Science', 'Diploma in Cosmetology',
            ]),
            'graduation_year' => $faker->year(),
        ];
    }
}
