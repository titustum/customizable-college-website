<?php

use App\Models\InstitutionSetting;

it('applies the institution primary font to the admin panel', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
        'primary_font' => 'Nunito',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk()
        ->assertSee('fonts.bunny.net/css?family=nunito:400,500,600,700&display=swap', false);
});

it('falls back to the default admin font when none is set', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('filament.admin.auth.login'))
        ->assertOk()
        ->assertSee('fonts.bunny.net/css?family=albert-sans:400,500,600,700&display=swap', false);
});
