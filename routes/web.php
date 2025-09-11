<?php

use Livewire\Volt\Volt;

Volt::route('/', 'pages.home')->name('home');

Volt::route('/about', 'pages.about')
    ->name('about');
Volt::route('/contact', 'pages.contact')
    ->name('contact');
Volt::route('/admissions', 'pages.admissions')
    ->name('admissions');
Volt::route('/departments', 'pages.departments')
    ->name('departments');
Volt::route('/staff-members', 'pages.staff-members')
    ->name('staff.members');
Volt::route('/sucess-stories', 'pages.success-stories')
    ->name('success.stories');
Volt::route('/terms-and-conditions', 'pages.terms-and-conditions')
    ->name('terms.conditions');
Volt::route('/principal-office', 'pages.principal-office')
    ->name('principal.office');
Volt::route('/downloads', 'pages.downloads')
    ->name('downloads');
Volt::route('/courses', 'pages.courses')
    ->name('courses');
Volt::route('/administration', 'pages.administration')
    ->name('administration');
Volt::route('/team', 'pages.team-members')
    ->name('team');
Volt::route('/departments/{slug}', 'pages.department')
    ->name('department');
Volt::route('/vacancies', 'pages.vacancies')
    ->name('vacancies');
Volt::route('/past-papers', 'pages.past-papers')
    ->name('past.papers');
Volt::route('/create-success-story', 'pages.success-stories-create')
    ->name('create.success.story');
