<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Principal',
                'slug' => Str::slug('Principal'),
                'level' => 1,
                'display_order' => 1,
            ],
            [
                'name' => 'Deputy Principal',
                'slug' => Str::slug('Deputy Principal'),
                'level' => 2,
                'display_order' => 2,
            ],
            [
                'name' => 'Registrar',
                'slug' => Str::slug('Registrar'),
                'level' => 3,
                'display_order' => 3,
            ],
            [
                'name' => 'Dean of Students',
                'slug' => Str::slug('Dean of Students'),
                'level' => 3,
                'display_order' => 4,
            ],
            [
                'name' => 'Finance Officer',
                'slug' => Str::slug('Finance Officer'),
                'level' => 3,
                'display_order' => 5,
            ],
            [
                'name' => 'Procurement Officer',
                'slug' => Str::slug('Procurement Officer'),
                'level' => 3,
                'display_order' => 6,
            ],
            [
                'name' => 'HOD',
                'slug' => Str::slug('HOD'),
                'level' => 4,
                'display_order' => 7,
            ],
            [
                'name' => 'Coordinator',
                'slug' => Str::slug('Coordinator'),
                'level' => 4,
                'display_order' => 8,
            ],
            [
                'name' => 'Trainer',
                'slug' => Str::slug('Trainer'),
                'level' => 5,
                'display_order' => 9,
            ],
            [
                'name' => 'Support Staff',
                'slug' => Str::slug('Support Staff'),
                'level' => 6,
                'display_order' => 10,
            ],
            [
                'name' => 'Coach',
                'slug' => Str::slug('Coach'),
                'level' => 7,
                'display_order' => 11,
            ],
            [
                'name' => 'Counsellor',
                'slug' => Str::slug('Counsellor'),
                'level' => 7,
                'display_order' => 11,
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                [
                    'name' => $role['name'],
                    'level' => $role['level'],
                    'display_order' => $role['display_order'],
                ]
            );
        }
    }
}
