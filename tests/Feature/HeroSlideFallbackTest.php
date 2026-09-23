<?php

use App\Models\HeroSlide;
use App\Models\InstitutionSetting;
use Illuminate\Support\Facades\Storage;

it('shows the default hero placeholder when no slides exist', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee(asset('images/placeholders/slide-image-placeholder.webp'))
        ->assertDontSee('hero_slide_images/tetu-tvc-ict-practicals.jpg');
});

it('shows the default hero placeholder for a slide without an image', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);
    HeroSlide::factory()->create(['image' => null]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee(asset('images/placeholders/slide-image-placeholder.webp'));
});

it('shows the slide image when one is set', function () {
    InstitutionSetting::create([
        'id' => 1,
        'name' => 'Tetu TVC',
        'slug' => 'tetu',
    ]);
    HeroSlide::factory()->create(['image' => 'hero-slides/campus.jpg']);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee(Storage::url('hero-slides/campus.jpg'));
});
