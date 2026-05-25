<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TransferCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransferCertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:module-transfer-certificates', ['only' => ['index', 'store', 'delete']]);
    }

    public function index(Request $request)
    {
        $query = TransferCertificate::orderBy('session', 'desc')->orderBy('student_name');

        if ($request->filled('session')) {
            $query->where('session', $request->session);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('admission_number', 'like', "%{$s}%")
                  ->orWhere('student_name', 'like', "%{$s}%");
            });
        }

        $tcs            = $query->get();
        $sessions       = TransferCertificate::select('session')->distinct()->orderBy('session', 'desc')->pluck('session');
        $sessionOptions = $this->generateSessions();

        return view('admin.transfer-certificates.index', compact('tcs', 'sessions', 'sessionOptions'));
    }

    /** Generate academic session list e.g. 2015-16 … current+1 */
    private function generateSessions(): array
    {
        $options = [];
        $year    = (int) date('Y') + 1;   // one year ahead
        for ($y = $year; $y >= 2020; $y--) {
            $options[] = $y . '-' . substr($y + 1, 2);
        }
        return $options;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admission_number' => ['required', 'string', 'max:50'],
            'student_name'     => ['required', 'string', 'max:150'],
            'father_name'      => ['required', 'string', 'max:150'],
            'session'          => ['required', 'string', 'max:20'],
            'tc_file'          => ['required', 'file', 'mimes:pdf', 'max:5120'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $path = $request->file('tc_file')->store('transfer-certificates', 'public');

        TransferCertificate::create([
            'admission_number' => strtoupper(trim($request->admission_number)),
            'student_name'     => $request->student_name,
            'father_name'      => $request->father_name,
            'session'          => $request->session,
            'tc_file_path'     => $path,
        ]);

        Session::flash('success', 'Transfer Certificate uploaded successfully.');
        return redirect()->route('admin.tc.index');
    }

    public function delete(int $id)
    {
        $tc = TransferCertificate::findOrFail($id);
        Storage::disk('public')->delete($tc->tc_file_path);
        $tc->delete();

        Session::flash('success', 'Transfer Certificate deleted successfully.');
        return redirect()->route('admin.tc.index');
    }
}
