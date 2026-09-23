<?php

use App\Models\InstitutionSetting;

it('renders the institution name dynamically on the home page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Green Valley Technical College',
        'slug' => 'green-valley',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Green Valley Technical College')
        ->assertDontSee('Tetu Technical and Vocational College');
});

it('renders county and sub-county dynamically on the home page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Green Valley Technical College',
        'slug' => 'green-valley',
        'county' => 'Bomet',
        'sub_county' => 'Sotik',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Located in Sotik Sub-County, Bomet County', false)
        ->assertDontSee('Located in Tetu Sub-County, Nyeri County', false)
        ->assertSee('education in Bomet County.', false);
});

it('renders the college motto dynamically in the navigation', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Green Valley Technical College',
        'slug' => 'green-valley',
        'motto' => 'Excellence in Every Skill',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Excellence in Every Skill')
        ->assertDontSee('Skills for Industrial Growth');
});
