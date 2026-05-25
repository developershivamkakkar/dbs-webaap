<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;


class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permissions', ['only' => ['index']]);
        $this->middleware('permission:create permission', ['only' => ['store']]);
        $this->middleware('permission:delete permission', ['only' => ['delete']]);
        $this->middleware('permission:update permission', ['only' => ['update']]);
    }
    // Function to Show Permissions Index PAGE 
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.role-permission.permission.index', compact('permissions'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:permissions,name',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Permission::create($request->all());
        Session::flash('success', 'Permission added successfully!');
        return redirect()->route('permissions.get');
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('permissions')->ignore($request->id),
            ],
        ]);

        // If validation fails, redirect back with errors and input data
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the Permission record
        $permission = Permission::findOrFail($request->id);
        $permission->name = $request->name;
        $permission->save();

        // Flash a success message to the session
        Session::flash('success', 'Permission updated successfully!');

        // Redirect to the permissions list route
        return redirect()->route('permissions.get');
    }

    public function delete(Request $request)
    {
        $permission = Permission::findOrFail($request->id);
        $permission->delete();
        Session::flash('success', 'Permission deleted successfully!');
        return redirect()->route('permissions.get');
    }
}
