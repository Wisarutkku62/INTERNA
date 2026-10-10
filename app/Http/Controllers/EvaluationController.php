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
        $user = \App\Models\User::with('student')->find(Auth::id());
        $studentId = $user?->student?->id;

        $passedApplications = Application::with(['internshipPosition.company', 'interview'])
            ->where('student_id', $studentId)
            ->whereHas('interview', function ($q) {
                $q->where('interview_result', 'passed');
            })
            ->whereDoesntHave('evaluation')
            ->latest()
            ->get();

        $completedApplication = Application::with(['internshipPosition.company', 'evaluation'])
            ->where('student_id', $studentId)
            ->whereHas('evaluation')
            ->latest()
            ->first();

        $evaluation = $completedApplication?->evaluation;

        return view('evaluationstd', compact('user', 'passedApplications', 'completedApplication', 'evaluation'));
    }

    public function updateAcceptance(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:accept,decline',
        ]);

        $application = Application::findOrFail($id);

        if ($request->action === 'accept') {
            $application->application_status = 'interning';
            $application->save();

            return redirect()->back()->with('success', 'ยืนยันการเข้ารับการฝึกงานเรียบร้อยแล้ว');
        } else {

            $application->application_status = 'declined';
            $application->save();

            return redirect()->back()->with('info', 'ปฏิเสธการเข้ารับการฝึกงานเรียบร้อยแล้ว');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_id'  => 'required|exists:applications,id',
            'evaluation_type' => 'required|string',
            'evaluation_score' => 'required|numeric|min:0|max:100',
            'evaluation_feedback' => 'nullable|string',
        ]);

        Evaluation::create([
            'application_id'      => $request->application_id,
            'evaluation_type'    => $request->evaluation_type,
            'evaluation_score'   => $request->evaluation_score,
            'evaluation_feedback' => $request->evaluation_feedback,
        ]);

        return redirect()->back()->with('success', 'บันทึกผลการประเมินเรียบร้อยแล้ว');
    }
}
