<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;





class AdminLoginController extends Controller
{
    // Function for Login
    public function index()
    {
        return view('admin.login');
    }

    // Function for Authenticate the User 
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            // Now Authenticate User 
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                $user = Auth::guard('admin')->user();
                return redirect()->route('admin.dashboard');


                // if ($user->role == 'admin') {
                //     // redirect user to dashboard 
                //     return redirect()->route('admin.dashboard');
                // } else {
                //     // logout Current Session and back to login page
                //     Auth::guard('admin')->logout();
                //     Session::flash('error', 'Either email/ password is incorrect');
                //     return redirect()->route('admin.login');
                // }
            } else {
                Session::flash('error', 'Either email/ password is incorrect');
                return redirect()->route('admin.login');
            }
        } else {
            return back()->withInput($request->only('email'))->withErrors($validator);
        }
    }
}
