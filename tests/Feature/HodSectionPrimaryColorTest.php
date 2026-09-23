<?php

use App\Models\Department;
use App\Models\InstitutionSetting;
use App\Models\Role;
use App\Models\TeamMember;

it('colors the HOD welcome section with the primary color on the department page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $role = Role::create(['name' => 'HOD', 'slug' => 'hod']);
    $department = Department::create([
        'name' => 'Cosmetology',
        'type' => 'academic',
        'is_active' => true,
    ]);
    $member = TeamMember::create([
        'name' => 'Jane Doe',
        'email' => 'hod@example.com',
    ]);
    $department->teamMembers()->attach($member->id, ['role_id' => $role->id]);

    $this->get(route('academic.department', ['slug' => $department->slug]))
        ->assertOk()
        ->assertSee('Message from the HOD')
        ->assertSee('text-primary')
        ->assertDontSee('amber-');
});

it('colors the HOD welcome section with the primary color on the service department page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $role = Role::create(['name' => 'Coordinator', 'slug' => 'coordinator']);
    $department = Department::create([
        'name' => 'Sports',
        'type' => 'non-academic',
        'is_active' => true,
    ]);
    $member = TeamMember::create([
        'name' => 'John Mwangi',
        'email' => 'coordinator@example.com',
    ]);
    $department->teamMembers()->attach($member->id, ['role_id' => $role->id]);

    $this->get(route('non.academic.department', ['slug' => $department->slug]))
        ->assertOk()
        ->assertSee('Message from the HOD')
        ->assertSee('text-primary')
        ->assertDontSee('amber-');
});
