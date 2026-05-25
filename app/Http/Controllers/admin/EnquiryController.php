<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobEnquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    // To Implement Permissions
    public function __construct()
    {
        $this->middleware('permission:module-job-enquires', ['only' => ['get_job_enquires']]);
    }

    public function get_job_enquires()
    {
        $enquires = JobEnquiry::orderBy('created_at', 'DESC')->get();
        return view("admin.enquiry-manager.job-enquires", compact('enquires'));
    }
}
