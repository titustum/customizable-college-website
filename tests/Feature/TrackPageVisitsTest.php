<?php

use App\Models\PageVisit;

it('records legitimate page visits', function () {
    $this->get('/courses');

    expect(PageVisit::where('url', '/courses')->count())->toBe(1);
});

it('does not record livewire asset requests', function (string $path) {
    $this->get($path);

    expect(PageVisit::where('url', '/'.$path)->count())->toBe(0);
})->with([
    '/livewire-b88d722b/livewire.min.js',
    '/livewire-b88d722b/css/app.css',
    '/livewire-b88d722b/livewire.min.css',
]);

it('does not record well-known traffic advice requests', function () {
    $this->get('/.well-known/traffic-advice');

    expect(PageVisit::where('url', '/.well-known/traffic-advice')->count())->toBe(0);
});

it('does not record static asset requests', function (string $path) {
    $this->get($path);

    expect(PageVisit::where('url', $path)->count())->toBe(0);
})->with([
    '/build/assets/app-abc123.js',
    '/build/assets/app-abc123.css',
    '/favicon.ico',
    '/images/logo.png',
    '/images/logo.svg',
    '/fonts/inter.woff2',
    '/media/banner.jpg',
]);

it('excludes historical asset records from the excludeAssets scope', function () {
    PageVisit::factory()->create(['url' => '/']);
    PageVisit::factory()->create(['url' => '/courses']);
    PageVisit::factory()->create(['url' => '/livewire-b88d722b/livewire.min.js']);
    PageVisit::factory()->create(['url' => '/.well-known/traffic-advice']);
    PageVisit::factory()->create(['url' => '/build/assets/app-abc123.js']);
    PageVisit::factory()->create(['url' => '/storage/hero.jpg']);

    $urls = PageVisit::excludeAssets()->pluck('url');

    expect($urls)->toContain('/');
    expect($urls)->toContain('/courses');
    expect($urls)->not->toContain('/livewire-b88d722b/livewire.min.js');
    expect($urls)->not->toContain('/.well-known/traffic-advice');
    expect($urls)->not->toContain('/build/assets/app-abc123.js');
    expect($urls)->not->toContain('/storage/hero.jpg');
});
