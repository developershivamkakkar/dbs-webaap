<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolEvent;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Exception;



class SchoolEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:module-events', ['only' => ['index', 'store', 'edit', 'update', 'delete']]);
    }
    public function index()
    {
        $events = SchoolEvent::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    // Function to Create a Event
    public function store(Request $request)
    {
        $validator = $this->validate_request($request);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Preserve input data for user convenience.
        }
        try {

            $data = $this->upload_image($request);
            SchoolEvent::create($data);
            // Flash a success message to the session
            Session::flash('success', 'Event created successfully!');
            return redirect()->route('admin.events.get');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }

    }


    public function edit(Request $request, $event_id)
    {
        $event = SchoolEvent::findOrFail($event_id);
        return view('admin.events.edit-event', compact('event'));
    }

    // Function to Update a Blog 
    public function update(Request $request, $event_id)
    {
        // Validate the request data
        $validator = $this->validate_request($request, $event_id);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Preserve input data for user convenience.
        }

        try {
            // Find the existing blog post by ID
            $event = SchoolEvent::findOrFail($event_id);

            // Upload the image (if there's any file to upload)
            $data = $this->upload_image($request);

            // Update the blog data (we're assuming $data contains the necessary fields)
            $event->update($data);

            // Flash a success message to the session
            Session::flash('success', 'Event updated successfully!');

            // Redirect back to the blogs list
            return redirect()->route('admin.events.get');
        } catch (Exception $e) {
            // In case of an error, redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }


    // Function to delete a Event 
    public function delete($event_id)
    {
        try {
            $event = SchoolEvent::findOrFail($event_id);
            $event_image_path = $event->event_image_path;
            $event->delete();
            // Check if the image file exists in storage before attempting to delete it
            if (Storage::disk('public')->exists($event_image_path)) {
                // Delete the image file from storage
                Storage::disk('public')->delete($event_image_path);
            }

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }

        return redirect()->route('admin.events.get'); // Redirect back to the Event list
    }


    // Common Function to Validate a Request
    protected function validate_request(Request $request, $event_id = null)
    {
        // Validate the request fields
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'], // Title is required and must not exceed 255 characters.
            'slug' => [
                'required',
                'max:191',
                'unique:school_events,slug,' . $event_id,  // Ignore current Event slug during update
            ],
            'content' => ['required'], // Content is required.
            'published_date' => ['required', 'date'], // Published date is required and must be a valid date.
            'event_date' => ['required', 'date'], // Event  date is required and must be a valid date.
            'status' => ['required', 'in:draft,published,archived'], // Status must be one of the enum values.
            'event_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'], // Event image is required and must be a valid image file.
        ]);

        return $validator;

    }


    // Function to  Upload a Image 
    protected function upload_image(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('event_image')) {
            $file = $request->file('event_image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $folder_path = 'assets/event-images';
            $file->storeAs($folder_path, $file_name, 'public');
            $data['event_image_path'] = $folder_path . '/' . $file_name;
        }

        return $data;
    }
}
