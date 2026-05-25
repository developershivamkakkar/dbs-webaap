<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class FrontendResourceController extends Controller
{

    public function index(Request $request)
    {
        $lists = Resource::all();
        return view('resource-list', compact('lists'));
    }
}
