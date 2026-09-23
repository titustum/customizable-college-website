<?php

use App\Models\InstitutionSetting;

test('the application returns a successful response', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
});
