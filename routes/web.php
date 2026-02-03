<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

// Livewire 4 style routes
Route::livewire('/', 'pages::home')->name('home');

Route::livewire('/about', 'pages::about')->name('about');
Route::livewire('/contact', 'pages::contact')->name('contact');
Route::livewire('/departments', 'pages::departments')->name('departments');
Route::livewire('/department/{slug}', 'pages::department')->name('department');
Route::livewire('/staff-members', 'pages::staff-members')->name('staff.members');
Route::livewire('/success-stories', 'pages::success-stories')->name('success.stories');
Route::livewire('/terms-and-conditions', 'pages::terms-and-conditions')->name('terms.conditions');
Route::livewire('/privacy-policy', 'pages::privacy-policy')->name('privacy.policy');
Route::livewire('/principal-office', 'pages::principal-office')->name('principal.office');
Route::livewire('/downloads', 'pages::downloads')->name('downloads');
Route::livewire('/courses', 'pages::courses')->name('courses');
Route::livewire('/administration', 'pages::administration')->name('administration');
Route::livewire('/team', 'pages::team-members')->name('team');
Route::livewire('/vacancies', 'pages::vacancies')->name('vacancies');
Route::livewire('/past-papers', 'pages::past-papers')->name('past.papers');
Route::livewire('/create-success-story', 'pages::success-stories-create')->name('create.success.story');

// Admissions download (school verification)
Route::livewire('/admissions', 'pages::download-admission-letter')->name('admissions');

// Full online admissions (uncomment if needed)
// Route::livewire('/admissions', 'pages::admissions')->name('admissions');
// Route::livewire('/admissions/complete/{id}', 'pages::admissions-complete')->name('admissions.complete');
// Route::livewire('/admissions/download/{id}', 'pages::admissions-download')->name('admissions.download');
// Route::livewire('/admissions/verify', 'pages::admissions-verify')->name('admissions.verify');

// Keep controller-based download route
Route::get('/admissions/download/{id}', [ApplicationController::class, 'download'])
    ->name('admissions.download');
