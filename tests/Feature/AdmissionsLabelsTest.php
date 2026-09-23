<?php

use App\Models\InstitutionSetting;

it('aligns the admission form label icons with their text', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('admissions'))
        ->assertOk()
        ->assertSee('class="flex items-center text-sm font-semibold text-gray-700 mb-2"', false);
});
