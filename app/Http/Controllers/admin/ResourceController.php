<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Resource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ResourceController extends Controller
{

    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-resource-list', ['only' => ['resource_list', 'create', 'store', 'update_view', 'update', 'delete']]);
    }
    //Function to fetch resource List
    public function resource_list()
    {
        $lists = Resource::all();
        return view('admin.resource-list', compact('lists'));
    }

    public function create(Request $request)
    {
        return view('admin.resource-create');
    }

    // Function to create a Resource and store it in the database 
    public function store(Request $request)
    {
        // Validate Incoming Request
        $validator = $this->validate_request($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Upload Image 
        $data = $this->upload_file($request);

        Resource::create($data);
        // Flash a success message to the session
        Session::flash('success', 'Resource created successfully!');
        return redirect()->route('resources.get');
    }

    public function update_view($id)
    {
        $updated_resource_item = Resource::where('id', $id)->first();
        return view('admin.resource-update', ['updated_resource_item' => $updated_resource_item]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = $this->validate_request($request);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Find the resource to update
            $updated_resource = Resource::findOrFail($id);

            // Update resource attributes
            $data = $this->upload_file($request);
            $updated_resource->update($data);

            // Flash a success message to the session
            Session::flash('success', 'Resource Updated successfully!');
            return redirect()->route('resources.get');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., resource not found, database errors)
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            // Find the resource to delete
            $deleted_resource = Resource::findOrFail($id);

            // Delete the associated file if it exists
            if ($deleted_resource->resource_file_path) {
                Storage::disk('public')->delete($deleted_resource->resource_file_path);
            }

            // Delete the resource from the database
            $deleted_resource->delete();

            // Flash a success message to the session
            Session::flash('success', 'Resource deleted successfully!');
            return redirect()->route('resources.get');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }



    // Common function for validate request during creation and updation
    protected function validate_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resource_name' => ['required', 'string'],
            'session' => ['required', 'string'],
            'resource_file' => ['required', 'mimes:pdf']
        ]);

        return $validator;
    }

    //Common function for File Upload
    protected function upload_file(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('resource_file')) {
            $file = $request->file('resource_file');
            $resource_name = str::slug(strtolower($request->input('resource_name')));
            $session_name = str::slug(strtolower($request->input('session')));
            $file_name = time() . '_' . $resource_name . '_' . $session_name . '.' . $file->getClientOriginalExtension();
            $folder_path = 'assets/resource_files';
            $file->storeAs($folder_path, $file_name, 'public');
            $data['resource_file_path'] = $folder_path . '/' . $file_name;
        }

        return $data;
    }
}
