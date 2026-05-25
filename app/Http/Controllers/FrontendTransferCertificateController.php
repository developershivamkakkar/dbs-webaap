<?php

namespace App\Http\Controllers;

use App\Models\TransferCertificate;
use Illuminate\Http\Request;

class FrontendTransferCertificateController extends Controller
{
    public function index()
    {
        return view('transfer-certificate');
    }

    public function search(Request $request)
    {
        $request->validate([
            'admission_number' => ['required', 'string', 'max:50'],
        ]);

        $admNo = strtoupper(trim($request->admission_number));
        $tc    = TransferCertificate::latest('created_at')->firstWhere('admission_number', $admNo);

        return view('transfer-certificate', compact('tc', 'admNo'))->with('searched', true);
    }
}
