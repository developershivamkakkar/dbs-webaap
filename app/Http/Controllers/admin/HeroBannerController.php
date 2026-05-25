<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\HeroBanner;
use Illuminate\Support\Facades\Storage;



class HeroBannerController extends Controller
{

    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-hero-banners', ['only' => ['index', 'upload_view', 'upload', 'delete']]);
    }
    public function index()
    {
        $banners = HeroBanner::latest()->get();
        return view('admin.hero-banners', compact('banners'));
    }

    public function upload_view()
    {
        return view('admin.upload-hero-banner');
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_image' => ['required', 'image', 'mimes:jpg,jpeg,webp']

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if ($request->has('banner_image')) {
            $image = $request->banner_image;
            $image_name = strtolower(time() . '_' . $image->getClientOriginalName()); // Generating a unique image name
            $image_path = 'assets/hero-banners';
            $image->storeAs($image_path, $image_name, 'public');
            $data['banner_image_path'] = $image_path . '/' . $image_name;
        }
        // Save $data to the database
        HeroBanner::create($data);
        Session::flash('success', 'Banner Uploaded successfully!');
        return redirect()->route('banners.get');
    }


    public function delete(Request $request, $id)
    {
        try {
            $deleted_banner = HeroBanner::find($id);

            if ($deleted_banner->banner_image_path) {
                Storage::disk('public')->delete($deleted_banner->banner_image_path);
            }
            // Delete the banner image from the database
            $deleted_banner->delete();
            // Flash a success message to the session
            Session::flash('success', 'Banner deleted successfully!');
            return redirect()->route('banners.get');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}
