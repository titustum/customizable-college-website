<?php

use App\Models\Department;
use App\Models\InstitutionSetting;

it('shows placeholder banner and photo on the department page when images are missing', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $department = Department::create([
        'name' => 'Cosmetology',
        'type' => 'academic',
        'is_active' => true,
        'short_description' => 'Hands-on beauty and hairdressing training.',
    ]);

    $this->get(route('academic.department', ['slug' => $department->slug]))
        ->assertOk()
        ->assertSee(asset('images/placeholders/department-banner-placeholder.webp'), false)
        ->assertSee(asset('images/placeholders/department-placeholder.webp'), false);
});

it('shows placeholder banner and photo on the service department page when images are missing', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $department = Department::create([
        'name' => 'Sports',
        'type' => 'non-academic',
        'is_active' => true,
        'short_description' => 'Recreational and competitive sports programs.',
    ]);

    $this->get(route('non.academic.department', ['slug' => $department->slug]))
        ->assertOk()
        ->assertSee(asset('images/placeholders/department-banner-placeholder.webp'), false)
        ->assertSee(asset('images/placeholders/department-placeholder.webp'), false);
});
