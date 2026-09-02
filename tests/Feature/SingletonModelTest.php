<?php

use App\Models\InstitutionSetting;
use App\Models\ServiceCharter;
use LogicException;

it('prevents creating a second service charter', function () {
    ServiceCharter::create([
        'title_en' => 'Service Charter',
        'title_sw' => 'Mkataba wa Huduma',
        'description_en' => 'English description.',
        'description_sw' => 'Maelezo ya Kiswahili.',
        'commitments_en' => ['First'],
        'commitments_sw' => ['Kwanza'],
    ]);

    expect(fn () => ServiceCharter::create([
        'title_en' => 'Another Charter',
        'title_sw' => 'Mkataba Mwingine',
        'description_en' => 'More details.',
        'description_sw' => 'Maelezo zaidi.',
        'commitments_en' => ['One'],
        'commitments_sw' => ['Moja'],
    ]))->toThrow(LogicException::class);
});

it('prevents creating a second institution setting', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    expect(fn () => InstitutionSetting::create([
        'id' => 2,
        'name' => 'Another College',
        'slug' => 'another-college',
    ]))->toThrow(LogicException::class);
});
