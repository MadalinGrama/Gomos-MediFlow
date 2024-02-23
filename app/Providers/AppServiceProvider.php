<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\MenuItem;
use App\Models\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

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
        $menuItems = MenuItem::with('children')->whereNull('parent_id')->get();
        // dd($menuItems);
        $settings = Settings::getSettings();     
        View::share(compact('menuItems', 'settings'));

        $socialLinks = Settings::getSocialLinks();
        View::share('socialLinks', $socialLinks);

    }
}
