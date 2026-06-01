<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class FrontendTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::active()
            ->orderBy('sort_order')
            ->orderBy('created_at')
            ->get();

        return view('testimonials', compact('testimonials'));
    }
}
