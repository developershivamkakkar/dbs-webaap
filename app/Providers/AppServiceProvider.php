<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\MenuItem;
use App\Services\SeoService;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind SeoService as a singleton resolved fresh per-request
        $this->app->singleton(SeoService::class, fn () => new SeoService());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);

        // Share the SEO service with the main layout and all views that need it
        View::composer('layouts.app', function ($view) {
            $view->with('seo', app(SeoService::class));
        });

        // Share active nav menu items with the header partial on every page
        View::composer('header', function ($view) {
            $navMenuItems = MenuItem::whereNull('parent_id')
                ->where('status', 'active')
                ->with(['children' => function ($q) {
                    $q->where('status', 'active')
                      ->orderBy('display_order')
                      ->with(['children' => function ($q2) {
                          $q2->where('status', 'active')->orderBy('display_order');
                      }]);
                }])
                ->orderBy('display_order')
                ->get();
            $view->with('navMenuItems', $navMenuItems);
        });
    }
}
