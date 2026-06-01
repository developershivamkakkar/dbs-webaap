<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FrontendFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::active()->orderBy('sort_order')->orderBy('created_at')->get();
        return view('faq', compact('faqs'));
    }
}
