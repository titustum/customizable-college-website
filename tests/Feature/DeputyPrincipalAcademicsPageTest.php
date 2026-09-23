<?php

use App\Models\InstitutionSetting;

it('renders the deputy principal academics page without the featured courses section', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('deputy.academics'))
        ->assertOk()
        ->assertDontSee('Featured Courses');
});
