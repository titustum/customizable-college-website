<?php

use App\Models\InstitutionSetting;

it('renders the established year from settings on the home page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
        'established_year' => 1998,
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('>1998</div>', false);
});

it('renders the established year from settings on the about page', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
        'established_year' => 1998,
    ]);

    $this->get(route('about'))
        ->assertOk()
        ->assertSee('Empowering futures through technical education excellence since 1998', false);
});
