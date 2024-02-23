<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;


class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // app()->booted(function () {
        //     // Verifică dacă există o conexiune la baza de date înainte de a efectua operațiuni de interogare
        //     if ($this->app->runningInConsole() || $this->app->runningUnitTests()) {
        //         return;
        //     }

        //     // Numără paginile și publică rezultatul în config
        //     $pageCount = Page::count();
        //     // dd($pageCount);
        //     config(['adminpanel.pages_count' => $pageCount]);
        // });

        // app()->booting(function () {
        //     $pageCount = Page::count();
        //     config(['adminlte.pages_count' => $pageCount]);
        // });
    }
}