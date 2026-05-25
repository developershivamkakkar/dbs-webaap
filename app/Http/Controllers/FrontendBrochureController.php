<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class FrontendBrochureController extends Controller
{
    public function submit(Request $request)
    {
        // ✅ Validate form data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
        ]);

        // ✅ Send email using HTML template
        Mail::send('emails.brochure-lead', compact('data'), function ($message) {
            $message->to('je.dm@dcmschools.com') // change to your email
                ->subject('New Brochure Lead - Website');
        });




        // Flash session to trigger modal & JS download
        return back()->with('success', true);

    }
}
