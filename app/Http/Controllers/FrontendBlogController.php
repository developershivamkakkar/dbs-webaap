<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SeoService;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::where('status', 'published')->orderBy('created_at', 'DESC')->paginate(12);
        return view('blogs-frontend.index', compact('blogs'));
    }

    public function blog_detail(Request $request, $slug)
    {
        $blog  = Blog::where('slug', $slug)->firstOrFail();
        $blogs = Blog::orderBy('created_at', 'DESC')->take(6)->get();

        app(SeoService::class)->fromBlog($blog);

        return view('blogs-frontend.blog-detail', compact('blog', 'blogs'));
    }

}
