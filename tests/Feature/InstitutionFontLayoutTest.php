<?php

use App\Models\InstitutionSetting;

it('applies the institution primary font and color in the app layout', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
        'primary_font' => 'Nunito',
        'primary_color' => '#2cbd17',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('family=Nunito&display=swap', false)
        ->assertSee("--font-body: 'Nunito'", false)
        ->assertSee("--primary-font: 'Nunito'", false)
        ->assertSee('--primary-color: #2cbd17', false)
        ->assertSee('--color-primary: var(--primary-color)', false)
        ->assertSee('--color-orange-600: var(--primary-color)', false);
});

it('falls back to the default font and color when none are set', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('family=Inter&display=swap', false)
        ->assertSee("--font-body: 'Inter'", false)
        ->assertSee('--primary-color: #f97316', false)
        ->assertSee('--color-primary: var(--primary-color)', false);
});
