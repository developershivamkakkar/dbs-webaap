<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Announcement;
use Illuminate\Support\Facades\Session;

class AnnouncementsController extends Controller
{
    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-announcements', ['only' => ['index', 'store', 'edit', 'delete']]);
    }
    // TO GET THE announcements and pass it to the view
    public function index()
    {
        $announcements = Announcement::all();
        return view('admin.announcements-list', compact('announcements'));
    }

    // Function for creating a new announcement
    public function store(Request $request)
    {
        $validator = $this->validate_request($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Announcement::create($request->all());
        Session::flash('success', 'Announcement added successfully!');
        return redirect()->route('announcements.get');
    }

    // Function to edit an announcement
    public function edit(Request $request, $id)
    {
        try {
            $validator = $this->validate_request($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $announcement = Announcement::findOrFail($id);
            $announcement->update($request->all());
            Session::flash('success', 'Announcement updated successfully!');
            return redirect()->route('announcements.get');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    // Function to delete an announcement
    public function delete($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            Session::flash('success', 'Announcement deleted successfully');
            $announcement->delete();
            return redirect()->route('announcements.get');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    // Function to Validate the request
    protected function validate_request($request)
    {
        $validator = Validator::make($request->all(), [
            'content'
        ]);
        return  $validator;
    }
}
