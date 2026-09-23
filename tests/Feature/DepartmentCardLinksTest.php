<?php

use App\Models\Department;
use App\Models\InstitutionSetting;

it('links the department card picture and name on the home page', function () {
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

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('class="relative block aspect-[4/3] overflow-hidden">', false)
        ->assertSee('/department/'.$department->slug, false)
        ->assertSee('Explore Department');
});

it('links the card picture and name of every department type on the departments page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $academic = Department::create([
        'name' => 'Cosmetology',
        'type' => 'academic',
        'is_active' => true,
        'short_description' => 'Hands-on beauty and hairdressing training.',
    ]);

    $office = Department::create([
        'name' => 'Finance',
        'type' => 'section',
        'is_active' => true,
        'short_description' => 'Budgeting and procurement support.',
    ]);

    $this->get(route('departments'))
        ->assertOk()
        ->assertSee('class="relative block aspect-[4/3] overflow-hidden">', false)
        ->assertSee('/department/'.$academic->slug, false)
        ->assertSee('/service/'.$office->slug, false)
        ->assertSee('Explore Department');
});
