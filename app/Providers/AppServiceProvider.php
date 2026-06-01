<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\MenuItem;
use App\Models\SiteSetting;
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

        // ── Overlay config('site.*') with values from the site_settings DB table ──
        // This runs once per request; the table is cached for 60 min by SiteSetting::allCached().
        try {
            $s = SiteSetting::allCached();

            if (!empty($s)) {
                config([
                    'site.name'          => $s['site_name']      ?? config('site.name'),
                    'site.full_name'     => $s['site_full_name'] ?? config('site.full_name'),
                    'site.tagline'       => $s['site_tagline']   ?? config('site.tagline'),

                    'site.address.line1'       => $s['address_line1']  ?? config('site.address.line1'),
                    'site.address.line2'       => $s['address_line2']  ?? config('site.address.line2'),
                    'site.address.city'        => $s['address_city']   ?? config('site.address.city'),
                    'site.address.state'       => $s['address_state']  ?? config('site.address.state'),
                    'site.address.country'     => $s['address_country']?? config('site.address.country'),
                    'site.address.postal_code' => $s['address_postal'] ?? config('site.address.postal_code'),
                    'site.address.full'        => trim(
                        ($s['address_line1'] ?? '') . ', ' . ($s['address_line2'] ?? '')
                        , ', '
                    ) ?: config('site.address.full'),

                    'site.phone'            => $s['phone']            ?? config('site.phone'),
                    'site.email_info'       => $s['email_info']       ?? config('site.email_info'),
                    'site.email_admissions' => $s['email_admissions'] ?? config('site.email_admissions'),
                    'site.whatsapp'         => $s['whatsapp']         ?? config('site.whatsapp'),

                    'site.social.facebook'  => $s['social_facebook']  ?? config('site.social.facebook'),
                    'site.social.instagram' => $s['social_instagram'] ?? config('site.social.instagram'),
                    'site.social.linkedin'  => $s['social_linkedin']  ?? config('site.social.linkedin'),
                    'site.social.twitter'   => $s['social_twitter']   ?? config('site.social.twitter'),
                    'site.social.youtube'   => $s['social_youtube']   ?? config('site.social.youtube'),

                    'site.maps_embed'          => $s['maps_embed']           ?? config('site.maps_embed'),
                    'site.google_analytics'    => $s['google_analytics_id']  ?? config('site.google_analytics'),
                    'site.google_tag_manager'  => $s['google_tag_manager_id']?? config('site.google_tag_manager'),

                    'site.meta_description' => $s['meta_description'] ?? config('site.meta_description'),
                    'site.meta_keywords'    => $s['meta_keywords']    ?? config('site.meta_keywords'),

                    'site.admissions_url'   => $s['admissions_url']    ?? config('site.admissions_url'),
                    'site.brochure_url'     => $s['brochure_url']      ?? config('site.brochure_url'),
                    'site.enquiry_url'      => $s['enquiry_url']       ?? config('site.enquiry_url', ''),
                    'site.registration_url' => $s['registration_url']  ?? config('site.registration_url', ''),
                    'site.favicon'          => $s['favicon_path']      ?? config('site.favicon'),
                ]);
            }
        } catch (\Throwable $e) {
            // DB not ready (e.g. during migration) — fall back to config/site.php silently
        }

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
