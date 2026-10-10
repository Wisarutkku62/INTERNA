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
            ->where(function ($q) {
                $q->where('application_status', 'pending')
                    ->orWhereHas('interview', function ($iq) {
                        $iq->where('interview_result', 'pending');
                    });
            })
            ->latest()
            ->first();

        $passedApplications = Application::with(['internshipPosition.company', 'interview'])
            ->where('student_id', $studentId)
            ->whereHas('interview')
            ->latest()
            ->first();

        $evaluation = $completedApplication?->evaluation;

        return view('evaluationstd', compact(
            'user',
            'application',
            'passedApplications',
            'completedApplication',
            'evaluation'
        ));
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
