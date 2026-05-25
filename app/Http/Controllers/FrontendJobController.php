<?php

namespace App\Http\Controllers;

use App\Models\JobEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FrontendJobController extends Controller
{
    public function index()
    {
        return view("job-form.index");
    }

    public function store(Request $request)
    {

        $validator = $this->validate_request($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->upload_file($request);
        $data = JobEnquiry::create($data);
        Session::flash('success', "Job Enquiry Submitted Successfully");
        return redirect()->back()->with('Success', "Job Enquiry Submitted Successfully");
    }

    protected function validate_request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
            'position_applied' => ['required', 'string'],
            'qualification' => ['required', 'string'],
            'phone_number' => ['required', 'regex:/^[0-9+\-\(\)\s]+$/', 'min:10', 'max:15'],
            'resume_file' => ['nullable', 'file', 'mimes:pdf'],
        ]);

        return $validator;
    }

    protected function upload_file(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('resume_file')) {
            $file = $request->file('resume_file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $folder_path = 'assets/enquiry-manager/resumes';
            $file->storeAs($folder_path, $file_name, 'public');
            $data['resume_file_path'] = $folder_path . '/' . $file_name;
        }

        return $data;
    }
}
