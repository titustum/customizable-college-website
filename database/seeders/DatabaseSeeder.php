<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Course;
use App\Models\TeamMember;
use App\Models\Role;

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
        ]);

        // Seed roles
        $this->call([
            RoleSeeder::class,
        ]);

        // Seed departments
        $departments = Department::factory(5)->create();

        // Seed courses and team members under each department
        $roles = Role::all();

        $departments->each(function ($department) use ($roles) {
            // Courses
            Course::factory(3)->create([
                'department_id' => $department->id,
            ]);

            // Team Members
            TeamMember::factory(4)->create([
                'department_id' => $department->id,
                'role_id' => $roles->random()->id,
            ]);
        });
    }
}
