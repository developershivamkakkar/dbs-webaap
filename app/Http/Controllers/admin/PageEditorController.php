<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\PageContent;
use Illuminate\Support\Facades\Validator;


class PageEditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:module-page-editor', ['only' => ['dependent_dropdown', 'getSubMenus', 'show', 'save', 'upload']]);
    }
    public function dependent_dropdown(Request $request)
    {
        $menu_items = MenuItem::whereNull('parent_id') // Fetch top-level menu items
            ->orWhereHas('children', function ($query) {
                $query->with('children'); // Fetch children and their children
            })
            ->with('children.children') // Eager load children and their children
            ->get();
        return view('admin.menu.dependent-dropdown', compact('menu_items'));
    }

    public function getSubMenus($parentId)
    {
        // Retrieve sub-menus based on the parentId
        $subMenus = MenuItem::where('parent_id', $parentId)->pluck('name', 'id');

        return response()->json($subMenus);
    }

    public function show(Request $request)
    {
        // Get the parent_menu and sub_menu values from the request
        $parentId = $request->input('parent_menu');
        $subMenuId = $request->input('sub_menu');

        // Check if a submenu ID is provided
        if ($subMenuId) {
            // Find the submenu item by ID
            $menuItem = MenuItem::find($subMenuId);
        } elseif ($parentId) {
            // Find the parent menu item by ID
            $menuItem = MenuItem::find($parentId);
        } else {
            // Handle the case where neither parent nor submenu is selected
            abort(404, 'Menu item not selected');
        }

        // If the menu item is not found, show a 404 error
        if (!$menuItem) {
            abort(404, 'Page not found');
        }

        // Get page content for the selected menu item
        $content = $menuItem->pageContent->content ?? null;

        // Pass data to the view
        return view('admin.page-editor.show', [
            'content' => $content,
            'menuItem' => $menuItem,
        ]);
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'menu_item_id' => 'required|exists:menu_items,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if a page content record exists for the menu item
        $pageContent = PageContent::where('menu_item_id', $request->input('menu_item_id'))->first();

        if ($pageContent) {
            // Update existing page content
            $pageContent->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);
        } else {
            // Create new page content
            PageContent::create([
                'menu_item_id' => $request->input('menu_item_id'),
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);
        }

        // Redirect with success message
        return redirect()->back()->with('success', 'Page content saved successfully.');
    }

    public function upload(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'upload' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // Adjust the size limit as needed
        ]);

        // Store the uploaded file in the public directory
        $path = $request->file('upload')->store('pageditor_images', 'public');

        // Return the image URL to CKEditor
        return response()->json([
            'url' => asset('storage/' . $path)
        ]);
    }
}
