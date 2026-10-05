<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\InternshipPosition;
use Illuminate\Support\Facades\Auth;

class InternController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('index', compact('user'));
    }
    public function internship(Request $request)
    {
        $query = InternshipPosition::query();
        $keyword = $request->keyword;

        if ($keyword) {
            $query->where(
                'position_name',
                'LIKE',
                '%' . $keyword . '%'
            );
        }

        $internship_positions = $query->get();
        return view('application', compact('internship_positions', 'keyword'));
    }

    public function internship_detail($id)
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
        $studentId = $user?->student?->id;

        if (!$studentId) {
            return redirect()->back()->with('error', 'กรุณากรอกข้อมูลโปรไฟล์นักศึกษาให้ครบถ้วนก่อนสมัครงาน');
        }

        $existingApplication = Application::where('internship_position_id', $id)
            ->where('student_id', $studentId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'คุณได้ทำการสมัครตำแหน่งงานนี้ไปแล้ว');
        }

        Application::create([
            'internship_position_id' => $id,
            'student_id'             => $studentId,
            'application_status'     => 'pending',
        ]);

        return redirect()->back()->with('success', 'ส่งใบสมัครงานเรียบร้อยแล้ว');
    }
}
