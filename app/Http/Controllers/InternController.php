<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\InternshipPosition;
use App\Models\Document;
use App\Models\ApplicationDocument;
use Illuminate\Support\Facades\Auth;

class InternController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role === 'company') {
                return redirect()->route('company.overview'); // หรือ url('/company/overview')
            }
        }

        return view('index');
    }

    public function internship(Request $request)
    {
        $query = InternshipPosition::with('company');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('position_name', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('company', function ($compQuery) use ($keyword) {
                        $compQuery->where('company_name', 'LIKE', "%{$keyword}%");
                    });
            });
        }

        if ($request->filled('category')) {
            $category = $request->category;

            if ($category === 'Technology & IT') {
                $query->where(function ($q) {
                    $q->where('position_category', 'Technology & IT')
                        ->orWhere('position_category', 'LIKE', '%Software%')
                        ->orWhere('position_category', 'LIKE', '%Frontend%')
                        ->orWhere('position_category', 'LIKE', '%Backend%')
                        ->orWhere('position_category', 'LIKE', '%Infrastructure%')
                        ->orWhere('position_category', 'LIKE', '%IT%');
                });
            } elseif ($category === 'Design & Creative') {
                $query->where(function ($q) {
                    $q->where('position_category', 'Design & Creative')
                        ->orWhere('position_category', 'LIKE', '%Design%')
                        ->orWhere('position_category', 'LIKE', '%Graphic%');
                });
            } else {
                $query->where('position_category', 'LIKE', '%' . $category . '%');
            }
        }

        if ($request->filled('worktype')) {
            $worktype = $request->worktype;
            if ($worktype === 'Onsite') {
                $query->whereIn('position_worktype', ['Onsite', 'On-site']);
            } elseif ($worktype === 'Online') {
                $query->whereIn('position_worktype', ['Online', 'Remote']);
            } else {
                $query->where('position_worktype', $worktype);
            }
        }

        if ($request->filled('interview_type')) {
            $interviewType = $request->interview_type;
            if ($interviewType === 'Onsite') {
                $query->whereIn('position_interview_type', ['Onsite', 'On-site']);
            } else {
                $query->where('position_interview_type', $interviewType);
            }
        }

        $internship_positions = $query->orderBy('id', 'desc')->get();

        return view('application', compact('internship_positions'));
    }

    public function internship_detail(int $id)
    {
        $positions = InternshipPosition::findOrFail($id);
        return view('company.positiondetail', compact('positions'));
    }

    public function apply(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'กรุณาเข้าสู่ระบบก่อนสมัครงาน');
        }

        $user = Auth::user();
        $student = $user?->student;

        if (!$student || empty($student->student_fname) || $student->student_fname === '-' || empty($student->student_phone)) {
            return redirect()->back()->with('error', 'กรุณากรอกข้อมูลส่วนตัวให้สมบูรณ์ก่อนทำการสมัครงาน');
        }

        $hasDocument = Document::where('student_id', $student->id)->exists();
        if (!$hasDocument) {
            return redirect()->back()->with('error', 'กรุณาอัปโหลดเอกสารสมัครงาน/เรซูเม่ในหน้าโปรไฟล์ก่อนทำการสมัครงาน');
        }

        $existingApplication = Application::where('internship_position_id', $id)
            ->where('student_id', $student->id)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'คุณได้ทำการสมัครตำแหน่งงานนี้ไปแล้ว');
        }

        $application = Application::create([
        'internship_position_id' => $id,
        'student_id'             => $student->id,
        'application_status'     => 'pending',
    ]);

    $documents = Document::where('student_id', $student->id)->get();

    foreach ($documents as $doc) {
        ApplicationDocument::create([
            'application_id' => $application->id,
            'document_id'    => $doc->id,
            'appdoc_status'  => 'pending',
            'appdoc_remark'  => null,
        ]);
    }

    return redirect()->back()->with('success', 'ส่งใบสมัครงานเรียบร้อยแล้ว');
}
}