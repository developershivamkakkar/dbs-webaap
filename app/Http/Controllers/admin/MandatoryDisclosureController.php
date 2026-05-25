<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MandatoryDisclosure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class MandatoryDisclosureController extends Controller
{

    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-mandatory-disclosure', ['only' => ['index', 'update_view', 'update']]);
    }
    public function index(Request $request, $id = 1)
    {
        $mandatory_disclosure = MandatoryDisclosure::firstOrCreate(['id' => $id]);
        return view('admin.mandatory-disclosure', compact('mandatory_disclosure'));
    }
    public function update_view(Request $request, $id = 1)
    {
        $mandatory_disclosure = MandatoryDisclosure::firstOrCreate(['id' => $id]);
        return view('admin.mandatory-disclosure-update', compact('mandatory_disclosure'));
    }

    public function update(Request $request, $id = 1)
    {
        $validator = Validator::make($request->all(), [
            'name_of_school' => ['nullable', 'string'],
            'affiliation' => ['nullable', 'string'],
            'school_code' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'principal' => ['nullable', 'string'],
            'school_email' => ['nullable', 'string'],
            'school_contact' => ['nullable', 'string'],
            'doc_affiliation' => ['nullable', 'mimes:pdf', 'file'],
            'doc_trust' => ['nullable', 'file', 'mimes:pdf'],
            'doc_noc' => ['nullable', 'file', 'mimes:pdf'],
            'doc_rte' => ['nullable', 'file', 'mimes:pdf'],
            'doc_building_safety' => ['nullable', 'file', 'mimes:pdf'],
            'doc_fire_safety' => ['nullable', 'file', 'mimes:pdf'],
            'doc_deo_cerificate' => ['nullable', 'file', 'mimes:pdf'],
            'doc_water_health_sanitation' => ['nullable', 'file', 'mimes:pdf'],
            'land_certificate' => ['nullable', 'file', 'mimes:pdf'],
            'fee_structure' => ['nullable', 'file', 'mimes:pdf'],
            'academic_calendar' => ['nullable', 'file', 'mimes:pdf'],
            'smc' => ['nullable', 'file', 'mimes:pdf'],
            'pta' => ['nullable', 'file', 'mimes:pdf'],
            'board_result' => ['nullable', 'file', 'mimes:pdf'],
            'total_teachers' => ['nullable', 'string'],
            'pgt' => ['nullable', 'string'],
            'tgt' => ['nullable', 'string'],
            'prt' => ['nullable', 'string'],
            'teacher_section_ratio' => ['nullable', 'string'],
            'special_education' => ['nullable', 'string'],
            'counsellor_wellness' => ['nullable', 'string'],
            'campus_area' => ['nullable', 'string'],
            'class_rooms' => ['nullable', 'string'],
            'laboratories' => ['nullable', 'string'],
            'internet' => ['nullable', 'string'],
            'girls_toilets' => ['nullable', 'string'],
            'boys_toilets' => ['nullable', 'string'],
            'cbse_saras' => ['nullable', 'file', 'mimes:pdf'],
            'inspection_video' => ['nullable', 'string'],
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        try {
            $mandatory_disclosure = MandatoryDisclosure::firstOrCreate(['id' => $id]);
            $data = $request->except(['_token', '_method']);

            foreach ($data as $key => $value) {
                if ($request->hasFile($key)) {
                    // Store the file and update the database field
                    $file = $request->file($key);
                    $file_name = time() . '_' . $file->getClientOriginalName(); // Combine timestamp and original name
                    $file_path = 'assets/mandatory-disclosure';
                    $file->storeAs($file_path, $file_name, 'public');
                    $mandatory_disclosure->$key = $file_path . '/' . $file_name;
                } else {
                    $mandatory_disclosure->$key = $value;
                }
            }

            $mandatory_disclosure->save();
            Session::flash('success', "Mandatory Disclosure Updated Successfully");
            return redirect()->route('md.get');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the mandatory disclosure.');
        }
    }
}
