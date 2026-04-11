<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

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
        // Set global timezone to Asia/Kolkata
        date_default_timezone_set('Asia/Kolkata');
        Carbon::setLocale('en');

        // Ensure all Carbon instances use Asia/Kolkata timezone
        Carbon::macro('createFromFormat', function ($format, $time, $tz = null) {
            return parent::createFromFormat($format, $time, $tz ?? 'Asia/Kolkata');
        });

        Blade::component('app', 'layouts.app');
        Blade::component('admin.components.sidebar', 'admin-sidebar');
        Blade::component('admin.components.header', 'admin-header');
        Blade::component('admin.components.footer', 'admin-footer');
        Blade::component('parent.components.sidebar', 'parent-sidebar');
        Blade::component('parent.components.header', 'parent-header');
        Blade::component('parent.components.footer', 'parent-footer');
    }
}
