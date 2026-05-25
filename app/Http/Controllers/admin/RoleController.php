<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;





class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view roles', ['only' => ['index']]);
        $this->middleware('permission:delete role', ['only' => ['delete']]);
        $this->middleware('permission:create role', ['only' => ['store']]);
        $this->middleware('permission:update role', ['only' => ['update']]);
        $this->middleware('permission:give-permission-to-role', ['only' => ['give_permission_to_role', 'add_permission_to_role']]);
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.role-permission.role.index', compact('roles'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles,name',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Role::create($request->all());
        Session::flash('success', 'Role added successfully!');
        return redirect()->route('roles.get');
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($request->id),
            ],
        ]);

        // If validation fails, redirect back with errors and input data
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the Role record
        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->save();

        // Flash a success message to the session
        Session::flash('success', 'Role updated successfully!');

        // Redirect to the roles list route
        return redirect()->route('roles.get');
    }

    // Function to Delete 
    public function delete(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->delete();
        Session::flash('success', 'Role deleted successfully!');
        return redirect()->route('roles.get');
    }

    // Function to assign permissions
    public function add_permission_to_role(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);
        $permissions = Permission::all();
        return view('admin.role-permission.role.add-permissions', compact('role', 'permissions'));
    }

    public function give_permission_to_role(Request $request, $role_id)
    {
        $validator = Validator::make($request->all(), [
            'permission' => 'required|array',
            'permission.*' => 'exists:permissions,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Role::findOrFail($role_id);
        $permissions = Permission::whereIn('name', $request->permission)->get();
        $role->syncPermissions($permissions);

        Session::flash('success', 'Permissions assigned successfully!');

        return redirect()->route('roles.get');
    }
}
