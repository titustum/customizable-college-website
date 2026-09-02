<?php

use App\Models\Application;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Department;
use App\Models\DepartmentAssignment;
use App\Models\Download;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Models\HeroSlide;
use App\Models\InstitutionSetting;
use App\Models\NewsCategory;
use App\Models\NewsItem;
use App\Models\PageVisit;
use App\Models\Partner;
use App\Models\PastPaper;
use App\Models\Role;
use App\Models\ServiceCharter;
use App\Models\SuccessStory;
use App\Models\TeamMember;
use App\Models\Tender;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Gate;

$models = [
    Application::class,
    Contact::class,
    Course::class,
    Department::class,
    DepartmentAssignment::class,
    Download::class,
    Faq::class,
    Gallery::class,
    GalleryItem::class,
    HeroSlide::class,
    InstitutionSetting::class,
    NewsCategory::class,
    NewsItem::class,
    PageVisit::class,
    Partner::class,
    PastPaper::class,
    Role::class,
    ServiceCharter::class,
    SuccessStory::class,
    TeamMember::class,
    Tender::class,
    User::class,
    Vacancy::class,
];

$studentRelatedModels = [
    Department::class,
    Course::class,
    Application::class,
    Contact::class,
];

$registrarAccess = array_map(
    fn (string $model): array => [$model, in_array($model, $studentRelatedModels, true)],
    $models,
);

it('lets admins and web admins act on every model', function (string $model) {
    foreach (['admin', 'webadmin'] as $role) {
        $user = User::factory()->create(['role' => $role]);

        expect(Gate::forUser($user)->allows('viewAny', $model))->toBeTrue();
        expect(Gate::forUser($user)->allows('create', $model))->toBeTrue();
        expect(Gate::forUser($user)->allows('update', new $model))->toBeTrue();
        expect(Gate::forUser($user)->allows('delete', new $model))->toBeTrue();
    }
})->with($models);

it('lets the registrar only act on student-related models', function (string $model, bool $allowed) {
    $user = User::factory()->create(['role' => 'registrar']);

    expect(Gate::forUser($user)->allows('viewAny', $model))->toBe($allowed);
    expect(Gate::forUser($user)->allows('create', $model))->toBe($allowed);
    expect(Gate::forUser($user)->allows('update', new $model))->toBe($allowed);
    expect(Gate::forUser($user)->allows('delete', new $model))->toBe($allowed);
})->with($registrarAccess);

it('denies plain users access to every model', function (string $model) {
    $user = User::factory()->create(['role' => 'user']);

    expect(Gate::forUser($user)->allows('viewAny', $model))->toBeFalse();
    expect(Gate::forUser($user)->allows('create', $model))->toBeFalse();
})->with($models);
