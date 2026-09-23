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
