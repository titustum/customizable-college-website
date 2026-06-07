<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Principal',
                'level' => 1,
                'description' => 'Institution head with full authority',
            ],
            [
                'name' => 'Deputy Principal',
                'level' => 2,
                'description' => 'Assists principal in academic and administration oversight',
            ],
            [
                'name' => 'Registrar',
                'level' => 3,
                'description' => 'Manages admissions, records and examinations',
            ],
            [
                'name' => 'Dean of Students',
                'level' => 3,
                'description' => 'Handles institutional finances and budgeting',
            ],
            [
                'name' => 'Finance Officer',
                'level' => 3,
                'description' => 'Handles institutional finances and budgeting',
            ],
            [
                'name' => 'Procurement Officer',
                'level' => 3,
                'description' => 'Handles procurement and supplies',
            ],
            [
                'name' => 'HOD',
                'level' => 4,
                'description' => 'Heads academic departments',
            ],
            [
                'name' => 'HOS',
                'level' => 4,
                'description' => 'Heads sections within departments or programs',
            ],
            [
                'name' => 'Trainer',
                'level' => 5,
                'description' => 'Delivers teaching and training to students',
            ],
            [
                'name' => 'Support Staff',
                'level' => 6,
                'description' => 'Non-academic operational support staff',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                [
                    'institution_id' => 1,
                    'level' => $role['level'],
                    'description' => $role['description'],
                ]
            );
        }
    }
}
