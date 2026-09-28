<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\InternshipPosition;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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
        $user = Auth::user();

        return view('company.companyedit', compact('user'));
    }
    public function editProfileSave(Request $request)
    {
        $validated = $request->validate([
            'company_name'        => ['required', 'string', 'max:100'],
            'company_description' => ['nullable', 'string'],
            'company_address'     => ['required', 'string', 'max:200'],
            'company_website'     => ['nullable', 'url', 'max:100'],
            'contact_name'        => ['required', 'string', 'max:50'],
            'contact_position'    => ['required', 'string', 'max:50'],
            'contact_phone'       => ['nullable', 'string', 'max:10'],
            'contact_email'       => ['nullable', 'email', 'max:100'],
            'company_logo_image'  => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        if ($request->hasFile('company_logo_image')) {
            $validated['company_logo_image'] = $request->file('company_logo_image')->store('logos', 'public');
        }

        Company::updateOrCreate(
            ['user_id' => Auth::id()],
            $validated
        );

        return redirect()
            ->route('company.overview')
            ->with('success', 'บันทึกโปรไฟล์เรียบร้อยแล้ว');
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
    public function history()
    {
        return view('company.InformationandHistory');
    }
    
    public function delete(int $id): RedirectResponse
    {
        $internshippositions_delete = InternshipPosition::findOrFail($id);

        $internshippositions_delete->delete();

        return redirect()->back();
    }
}
