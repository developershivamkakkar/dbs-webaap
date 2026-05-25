<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-enquires', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $contacts = Contact::orderByDesc('created_at')->get();
        return view('admin.contacts-list', compact('contacts'));
    }
}
