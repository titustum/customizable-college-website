<?php

use App\Models\InstitutionSetting;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

it('applies the institution primary color to the admin panel', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
        'primary_color' => '#bd175f',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk();

    expect(FilamentColor::getColors()['primary'])->toBe(Color::generatePalette('#bd175f'));
});

it('falls back to a primary color for the admin panel when none is set', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk();

    expect(FilamentColor::getColors())->toHaveKey('primary');
});
