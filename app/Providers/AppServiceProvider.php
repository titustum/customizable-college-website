<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\InstitutionSetting;
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
            $setting = InstitutionSetting::first();
            $view->with('setting', $setting);
            $view->with('departments', Department::all());
        });
    }
}
