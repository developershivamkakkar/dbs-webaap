<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LandingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:module-landing-page');
    }

    public function index()
    {
        Cache::forget('landing_settings');
        $settings = LandingSetting::allCached();
        return view('admin.landing-page.index', compact('settings'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'adm_hero_title' => 'required|string|max:255',
        ]);

        $fields = [
            // Admissions page
            'adm_page_title', 'adm_meta_description',
            'adm_hero_title', 'adm_hero_subtitle',
            'adm_step_1_icon', 'adm_step_1_title', 'adm_step_1_text',
            'adm_step_2_icon', 'adm_step_2_title', 'adm_step_2_text',
            'adm_step_3_icon', 'adm_step_3_title', 'adm_step_3_text',
            'adm_step_4_icon', 'adm_step_4_title', 'adm_step_4_text',
        ];

        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $request->input($field, '');
        }

        LandingSetting::saveAll($data);

        return redirect()->route('admin.landing-page.index')
                         ->with('success', 'Landing page content saved successfully.');
    }
}
