<?php

namespace App\Http\Controllers;

use App\Models\MandatoryDisclosure;
use Illuminate\Http\Request;
use App\Models\Announcement;

class FrontendMandatoryDisclosure extends Controller
{
    public function index()
    {
        $records = MandatoryDisclosure::get();

        return view('mandatory-disclosure', compact('records'));
    }
}
