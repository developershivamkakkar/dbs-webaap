<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\MenuItem;
use App\Models\Blog; // Assuming MenuItem model has the slugs

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        // Fetch menu items
        $menuItems = MenuItem::all(); // Adjust this based on your actual model
        $urls = [];

        // Add static pages with slugs
        $urls[] = [
            'loc' => url('/'),
            'priority' => '1.0',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];
        $urls[] = [
            'loc' => url('/gallery/school-events'),
            'priority' => '0.6',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];
        $urls[] = [
            'loc' => url('/gallery/infrastructure'),
            'priority' => '0.6',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];
        $urls[] = [
            'loc' => url('/gallery/activities'),
            'priority' => '0.6',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];
        $urls[] = [
            'loc' => url('/contact'),
            'priority' => '0.9',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];
        $urls[] = [
            'loc' => url('/job-enquiry'),
            'priority' => '0.9',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];
        $urls[] = [
            'loc' => url('/admissions'),
            'priority' => '0.9',
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly'
        ];

        // Generate URLs from menu items
        foreach ($menuItems as $item) {
            if ($item->url) {
                $urls[] = [
                    'loc' => url($item->url),
                    'priority' => '0.6',
                    'lastmod' => now()->toAtomString(), // You can set this to $item->updated_at if available
                    'changefreq' => 'monthly'
                ];
            }
        }

        // Add published blogs to sitemap
        $blogs = Blog::where('status', 'published')->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => url('/blog/' . $blog->slug),
                'priority' => '0.5',
                'lastmod' => optional($blog->updated_at)->toAtomString() ?? now()->toAtomString(),
                'changefreq' => 'monthly'
            ];
        }



        return response()->view('sitemap.index', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
