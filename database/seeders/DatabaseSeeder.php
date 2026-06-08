<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user
        User::factory()->create([
            'name' => 'Web Admin',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'institution_id'=>1
        ]);

        // Seed data
        $this->call([
            InstitutionSeeder::class,
            RoleSeeder::class,
            DepartmentSeeder::class,
            TeamMemberSeeder::class,
            CourseSeeder::class,
            TenderSeeder::class,
            VacancySeeder::class,
        ]);
    }
}
