<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;




class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view users', ['only' => ['index']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
        $this->middleware('permission:create user', ['only' => ['store']]);
        $this->middleware('permission:update user', ['only' => ['update']]);
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name', 'name');
        return view('admin.role-permission.user.index', compact('users', 'roles'));
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255|min:8',
            'roles' => 'required|exists:roles,name'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);
        Session::flash('success', 'User added successfully with roles');
        return redirect()->back();
    }

    // Update an existing user
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],

            'roles' => 'required|exists:roles,name'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'User updated successfully with roles');
    }
    // Delete a user
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
