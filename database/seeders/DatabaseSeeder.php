<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use App\Models\Role;
use App\Models\TeamMember;
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
        ]);

        // Seed roles
        $this->call([
            RoleSeeder::class,
            InstitutionSeeder::class,
            DepartmentSeeder::class,
            TeamMemberSeeder::class,
        ]);

        // Seed courses under each department
        $departments = Department::all();

        $departments->each(function ($department) {
            Course::factory(3)->create([
                'department_id' => $department->id,
            ]);
        });
    }
}
