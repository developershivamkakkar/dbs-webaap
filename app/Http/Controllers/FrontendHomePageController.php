<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner;
use App\Models\Banner;
use App\Models\MenuItem;
use App\Models\Popup;
use App\Models\Blog;


class FrontendHomePageController extends Controller
{
    public function index()
    {
        $banners = HeroBanner::latest()->get();
        $explorebanners = Banner::all();
        $menuItems = MenuItem::all();
        $popups = Popup::where('status', 'active')->get();
        $blogs = Blog::where('status', 'published')->orderBy('created_at', 'desc')->take(4)->get();
        return view('index', compact('banners', 'explorebanners', 'menuItems', 'popups', 'blogs'));
    }
}
