<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class BannerController extends Controller
{
    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-explore-banners', ['only' => ['index', 'upload_view', 'upload', 'delete']]);
    }
    public function index()
    {
        $banners = Banner::get();
        return view('admin.explore-banners', compact('banners'));
    }

    public function upload_view()
    {
        return view('admin.explore-banner-upload');
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_image' => ['required', 'image', 'mimes:jpg,jpeg,webp,png']

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
        Banner::create($data);
        Session::flash('success', 'Banner Uploaded successfully!');
        return redirect()->route('explore-banners.get');
    }


    public function delete(Request $request, $id)
    {
        try {
            $deleted_banner = Banner::find($id);

            if ($deleted_banner->banner_image_path) {
                Storage::disk('public')->delete($deleted_banner->banner_image_path);
            }
            // Delete the banner image from the database
            $deleted_banner->delete();
            // Flash a success message to the session
            Session::flash('success', 'Banner deleted successfully!');
            return redirect()->route('explore-banners.get');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}
