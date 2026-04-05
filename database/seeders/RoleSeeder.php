<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Principal',
            'Deputy Principal',
            'HOD',
            'Industrial Liaison Officer',
            'Registrar',
            'Head of Section',
            'Dean of Students',
            'Librarian',
            'Driver',
            'Secretary',
            'Chief Cook',
            'Sports Coordinator',
            'Trainer',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
