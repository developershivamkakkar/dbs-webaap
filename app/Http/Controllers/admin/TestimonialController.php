<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:module-testimonials', ['only' => ['index', 'store', 'update', 'delete']]);
    }

    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->orderBy('created_at')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'relation'    => ['nullable', 'in:parent,student,alumni,staff,other'],
            'content'     => ['required', 'string', 'max:2000'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
            'sort_order'       => ['nullable', 'integer', 'min:0'],
            'status'           => ['required', 'in:active,inactive'],
            'testimonial_date' => ['nullable', 'date'],
            'photo'            => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = $request->only('name', 'designation', 'relation', 'content', 'rating', 'sort_order', 'status', 'testimonial_date');

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        Session::flash('success', 'Testimonial added successfully.');
        return redirect()->route('admin.testimonials.index');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'relation'    => ['nullable', 'in:parent,student,alumni,staff,other'],
            'content'     => ['required', 'string', 'max:2000'],
            'rating'      => ['required', 'integer', 'min:1', 'max:5'],
            'sort_order'       => ['nullable', 'integer', 'min:0'],
            'status'           => ['required', 'in:active,inactive'],
            'testimonial_date' => ['nullable', 'date'],
            'photo'            => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $data = $request->only('name', 'designation', 'relation', 'content', 'rating', 'sort_order', 'status', 'testimonial_date');

        if ($request->hasFile('photo')) {
            if ($testimonial->photo_path) {
                Storage::disk('public')->delete($testimonial->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        Session::flash('success', 'Testimonial updated successfully.');
        return redirect()->route('admin.testimonials.index');
    }

    public function delete(int $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->photo_path) {
            Storage::disk('public')->delete($testimonial->photo_path);
        }

        $testimonial->delete();

        Session::flash('success', 'Testimonial deleted successfully.');
        return redirect()->route('admin.testimonials.index');
    }
}
