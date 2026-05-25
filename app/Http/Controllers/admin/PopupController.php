<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Popup;
use Illuminate\Support\Facades\Storage;


class PopupController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:module-popups', ['only' => ['index', 'upload', 'delete', 'update']]);
    }
    public function index(Request $request)
    {
        $popups = Popup::all();
        return view('admin.popups.index', compact('popups'));
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'popup_image' => ['required', 'image', 'mimes:jpg,jpeg,webp', 'max:2048'],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if ($request->has('popup_image')) {
            $image = $request->popup_image;
            $image_name = strtolower(time() . '_' . $image->getClientOriginalName()); // Generating a unique image name
            $image_path = 'assets/popup-images';
            $image->storeAs($image_path, $image_name, 'public');
            $data['image'] = $image_path . '/' . $image_name;
        }
        // Save $data to the database
        Popup::create($data);
        Session::flash('success', 'Popup Uploaded successfully!');
        return redirect()->route('popups.get');
    }


    public function delete(Request $request, $id)
    {
        try {
            $deleted_popup = Popup::find($id);

            if ($deleted_popup->image) {
                Storage::disk('public')->delete($deleted_popup->image);
            }
            // Delete the banner image from the database
            $deleted_popup->delete();
            // Flash a success message to the session
            Session::flash('success', 'Popup deleted successfully!');
            return redirect()->route('popups.get');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    public function update(Request $request, $id)
    {
        $popup = Popup::findOrFail($id);
        // Retrieve the popup by ID
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:active,inactive',  // Ensure status is either 'active' or 'inactive'
            'image' => 'nullable'
        ]);

        $popup->update($request->all());
        // Redirect with a success message
        return redirect()->back()->with('success', 'Popup status updated successfully!');
    }



}
