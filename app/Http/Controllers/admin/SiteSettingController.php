<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:module-site-settings');
    }

    public function index()
    {
        // Always read fresh from DB on this page (bypass cache)
        Cache::forget('site_settings');
        $settings = SiteSetting::allCached();
        return view('admin.site-settings.index', compact('settings'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'site_name'              => 'required|string|max:255',
            'email_admissions'       => 'nullable|email|max:255',
            'email_info'             => 'nullable|email|max:255',
            'google_analytics_id'    => 'nullable|string|max:50',
            'google_tag_manager_id'  => 'nullable|string|max:50',
            'favicon'                => 'nullable|file|mimes:ico,png,jpg,jpeg,svg,webp|max:512',
            'brochure_file'          => 'nullable|file|mimes:pdf|max:10240',
            'sidebar_register_text'  => 'nullable|string|max:100',
            'sidebar_register_url'   => 'nullable|string|max:255',
        ]);

        $fields = [
            // General
            'site_name', 'site_full_name', 'site_tagline',
            // Contact
            'address_line1', 'address_line2', 'address_city',
            'address_state', 'address_country', 'address_postal',
            'phone', 'email_admissions', 'email_info', 'whatsapp',
            // Social
            'social_facebook', 'social_instagram', 'social_linkedin',
            'social_twitter', 'social_youtube',
            // Maps & Analytics
            'maps_embed', 'google_analytics_id', 'google_tag_manager_id',
            // SEO
            'meta_description', 'meta_keywords',
            // Links
            'admissions_url', 'brochure_url', 'enquiry_url', 'registration_url',
            // Sidebar CTA
            'sidebar_register_enabled', 'sidebar_register_text', 'sidebar_register_url',
        ];

        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $request->input($field, '');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $ext  = $file->getClientOriginalExtension();
            $dest = public_path('storage/assets');
            if (!is_dir($dest)) { mkdir($dest, 0755, true); }
            $file->move($dest, 'favicon.' . $ext);
            $data['favicon_path'] = 'storage/assets/favicon.' . $ext;
        }

        // Handle brochure PDF upload
        if ($request->hasFile('brochure_file')) {
            $file = $request->file('brochure_file');
            $dest = public_path('brochures');
            if (!is_dir($dest)) { mkdir($dest, 0755, true); }
            $filename = 'brochure-' . time() . '.pdf';
            $file->move($dest, $filename);
            $data['brochure_path'] = 'brochures/' . $filename;
            // Also set the brochure_url to the new file if not overridden
            if (empty($data['brochure_url'])) {
                $data['brochure_url'] = '/' . $data['brochure_path'];
            }
        }

        // Normalise sidebar toggle (unchecked checkboxes are not submitted)
        $data['sidebar_register_enabled'] = $request->has('sidebar_register_enabled') ? '1' : '0';

        SiteSetting::saveAll($data);

        return redirect()->route('admin.site-settings.index')
                         ->with('success', 'Website settings saved successfully.');
    }
}
