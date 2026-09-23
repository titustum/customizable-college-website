<?php

use App\Models\InstitutionSetting;

it('renders the principal office page without the administrative units section', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('principal.office'))
        ->assertOk()
        ->assertDontSee('Administrative Units');
});
