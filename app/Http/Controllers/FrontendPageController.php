<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\PageContent;
use App\Services\SeoService;

class FrontendPageController extends Controller
{
    public function show($slug)
    {
        // Find the menu item by slug
        $menu_item = MenuItem::where('url', $slug)->first();

        // Handle menu item not found
        if (! $menu_item) {
            abort(404, 'Page not found');
        }

        $page = PageContent::where('menu_item_id', $menu_item->id)->first();

        // Handle page content not found
        if (! $page) {
            abort(404, 'Page content not found');
        }

        app(SeoService::class)->fromPage($page->title, $page->content ?? '');

        // Return the view with page data
        return view('pages.show', [
            'title'   => $page->title,
            'content' => $page->content,
        ]);
    }

    public function admissions_landing_page()
    {
        return view('landing-pages.admissions');
    }
}
