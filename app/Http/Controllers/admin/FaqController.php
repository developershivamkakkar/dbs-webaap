<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:module-faqs', ['only' => ['index', 'store', 'update', 'delete']]);
    }

    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->orderBy('created_at')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question'   => ['required', 'string', 'max:500'],
            'answer'     => ['required', 'string'],
            'category'   => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status'     => ['required', 'in:active,inactive'],
        ]);

        Faq::create($request->only('question', 'answer', 'category', 'sort_order', 'status'));

        Session::flash('success', 'FAQ added successfully!');
        return redirect()->route('admin.faqs.index');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'question'   => ['required', 'string', 'max:500'],
            'answer'     => ['required', 'string'],
            'category'   => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status'     => ['required', 'in:active,inactive'],
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('question', 'answer', 'category', 'sort_order', 'status'));

        Session::flash('success', 'FAQ updated successfully!');
        return redirect()->route('admin.faqs.index');
    }

    public function delete(int $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        Session::flash('success', 'FAQ deleted successfully.');
        return redirect()->route('admin.faqs.index');
    }
}
