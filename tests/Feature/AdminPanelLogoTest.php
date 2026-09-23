<?php

use App\Models\InstitutionSetting;

it('uses the institution logo for the admin panel brand and favicon', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
        'logo' => 'logos/tetu-logo.png',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk()
        ->assertSee(asset('storage/logos/tetu-logo.png'))
        ->assertDontSee(asset('images/logo.jpeg'));
});

it('falls back to the default logo when the institution has none', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk()
        ->assertSee(asset('images/logo.jpeg'));
});

it('keeps the admin panel brand name as Web Admin', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Green Valley Technical College',
        'slug' => 'green-valley',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk()
        ->assertSee('Web Admin')
        ->assertDontSee('Green Valley Technical College');
});

it('falls back to the default admin panel brand name when no institution exists', function () {
    $this->get(route('filament.admin.auth.login'))
        ->assertOk()
        ->assertSee('Web Admin');
});
