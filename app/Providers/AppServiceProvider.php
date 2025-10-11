<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Institution;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share institution and departments with all views using view composer
        View::composer('*', function ($view) {
            $institution = Institution::first();
            $view->with('institution', $institution);
            $view->with('departments', Department::all());
        });
    }
}
