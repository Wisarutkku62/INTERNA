<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\InternshipPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    public function overview()
{
    $user = Auth::user();
    
    $companyId = $user?->company?->id;

    $applicants = Application::whereHas('internshipPosition', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->with(['student', 'internshipPosition'])
        ->get();

    return view('company.managecom', compact('user', 'applicants'));
}
    public function editProfile() 
    {
        return view('company.companyedit');
    }
    public function announcement()
    {
        return view('company.announcement');
    }
    public function announcement_create(Request $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'max:100', 'required'],
            'department' => ['string', 'max:100', 'required'],
            'job_type' => ['string', 'required'],
            'work_type' => ['string', 'required'],
            'location' => ['string', 'max:100', 'required'],
            'salary' => ['integer', 'required', 'min:0'],
            'qualifications' => ['string', 'required'],
            'description' => ['string', 'required']
        ]);

        $internshippositions = new InternshipPosition();

        $internshippositions->position_name = $validated['title'];
        $internshippositions->position_description = $validated['description'];
        $internshippositions->position_category = $validated['department'];
        $internshippositions->position_capacity = $validated['department'];
        $internshippositions->salary = $validated['salary'];
        $internshippositions->job_type = $validated['job_type'];
        $internshippositions->position_worktype = $validated['work_type'];
        $internshippositions->position_interview_type = $validated['work_type'];
        $internshippositions->workdate = $validated['work_date'];
        $internshippositions->worktype = $validated['work_time'];
        $internshippositions->location = $validated('location');
        // ไม่มีใน DB
        $internshippositions->qualifications = $validated['qualifications'];
        
        $internshippositions->save();
    }
    public function announcement_all()
    {
        $user = Auth::user();
    
        $companyId = $user?->company?->id;

        $positions = InternshipPosition::where('company_id', $companyId)->get();

        return view('company.alljob', compact('user','positions'));
    }
}
