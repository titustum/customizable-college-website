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
        User::create([
            'name' => 'Web Admin',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'password'=>'password'
        ]);

        $this->call([
            InstitutionSettingSeeder::class,
            RoleSeeder::class,
            DepartmentSeeder::class,
            SuccessStorySeeder::class,
            TeamMemberSeeder::class,
            CourseSeeder::class,
            TenderSeeder::class,
            VacancySeeder::class,
        ]);
    }
}
