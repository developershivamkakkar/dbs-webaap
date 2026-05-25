<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class FrontendDownloadController extends Controller
{
    public function index(Request $request)
    {
        $lists = Download::orderBy('created_at', 'DESC')->get();
        return view('downloads.index', compact('lists'));
    }
}
