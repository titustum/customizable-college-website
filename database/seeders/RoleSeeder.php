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
                'display_order' => 1,
            ],
            [
                'name' => 'Deputy Principal',
                'level' => 2,
                'display_order' => 2,
            ],
            [
                'name' => 'Registrar',
                'level' => 3,
                'display_order' => 3,
            ],
            [
                'name' => 'Dean of Students',
                'level' => 3,
                'display_order' => 4,
            ],
            [
                'name' => 'Finance Officer',
                'level' => 3,
                'display_order' => 5,
            ],
            [
                'name' => 'Procurement Officer',
                'level' => 3,
                'display_order' => 6,
            ],
            [
                'name' => 'HOD',
                'level' => 4,
                'display_order' => 7,
            ],
            [
                'name' => 'HOS',
                'level' => 4,
                'display_order' => 8,
            ],
            [
                'name' => 'Trainer',
                'level' => 5,
                'display_order' => 9,
            ],
            [
                'name' => 'Support Staff',
                'level' => 6,
                'display_order' => 10,
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                [
                    'level' => $role['level'],
                    'display_order' => $role['display_order'],
                ]
            );
        }
    }
}
