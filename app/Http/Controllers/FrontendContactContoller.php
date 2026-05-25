<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class FrontendContactContoller extends Controller
{
    public function index(Request $request)
    {
        return view('contact');
    }

    public function store(Request $request)
    {

        $validator = $this->validate_request($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data = Contact::create($data);
        Session::flash('success', "Enquiry Submitted Successfully");
        return redirect()->back()->with('Success', "Enquiry Submitted Successfully");
    }

    protected function validate_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
            'phone_number' => ['required', 'regex:/^[0-9+\-\(\)\s]+$/', 'min:10', 'max:15'],
        ]);

        return $validator;
    }
}
