<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // โหลดข้อมูล Application พร้อมกับ Company และ Interview
        $application = Application::with(['internshipPosition.company', 'interview'])
            ->where('student_id', $user->student->id ?? null)
            ->latest()
            ->first();

        // โหลดข้อมูล Evaluation
        $evaluation = $application 
            ? Evaluation::where('application_id', $application->id)->latest()->first() 
            : null;

        return view('evaluationstd', compact('user', 'application', 'evaluation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_id'  => 'required|exists:applications,id',
            'evaluation_type'  => 'required|string',
            'evaluation_score' => 'required|numeric|min:0|max:100',
            'evaluation_feedback' => 'nullable|string',
        ]);

        Evaluation::create([
            'application_id'      => $request->application_id,
            'evaluation_type'     => $request->evaluation_type,
            'evaluation_score'    => $request->evaluation_score,
            'evaluation_feedback' => $request->evaluation_feedback,
        ]);

        return redirect()->back()->with('success', 'บันทึกผลการประเมินเรียบร้อยแล้ว');
    }
}