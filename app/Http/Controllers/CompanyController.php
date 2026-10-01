<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\InternshipPosition;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Interview;
use App\Models\Student;
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
        ->whereDoesntHave('interview')
        ->with(['student', 'internshipPosition'])
        ->get();

        $interviews = Interview::where('interview_result', 'pending') 
    ->whereHas('application.internshipPosition', function ($query) use ($companyId) {
        $query->where('company_id', $companyId);
            })
            ->with([
                'application.student',
                'application.internshipPosition'
            ])
            ->get();

        return view('company.managecom', compact('user', 'applicants', 'interviews'));
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
    public function announcement_create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'position_name' => ['string', 'max:100', 'required'],
            'position_category' => ['string', 'max:100', 'required'],
            'position_capacity' => ['integer', 'min:0', 'required'],
            'position_worktype' => ['string', 'required'],
            'position_interview_type' => ['string', 'required'],
            'position_start_date' => ['required', 'string'],
            'position_end_date' => ['required', 'string'],
            'position_start_time' => ['required', 'date_format:H:i'],
            'position_end_time' => ['required', 'date_format:H:i'],
            'position_allowance' => ['integer', 'required', 'min:0'],
            'position_qualification' => ['string', 'required'],
            'position_description' => ['string', 'required']
        ]);

        $position = new InternshipPosition();
        $position->company_id = Auth::user()->company->id;
        $position->position_name = $validated['position_name'];
        $position->position_description = $validated['position_description'];
        $position->position_qualification = $validated['position_qualification'];
        $position->position_category = $validated['position_category'];
        $position->position_capacity = $validated['position_capacity'];
        $position->position_allowance = $validated['position_allowance'];
        $position->position_start_date = $validated['position_start_date'];
        $position->position_end_date = $validated['position_end_date'];
        $position->position_start_time = $validated['position_start_time'];
        $position->position_end_time = $validated['position_end_time'];
        $position->position_worktype = $validated['position_worktype'];
        $position->position_interview_type = $validated['position_interview_type'];

        $position->save();

        return redirect()->route('company.announcement.all');
    }
    public function announcement_all()
    {
        $user = Auth::user();

        $companyId = $user?->company?->id;

        $positions = InternshipPosition::where('company_id', $companyId)->get();

        return view('company.alljob', compact('user', 'positions'));
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

    public function announcement_edit(int $id)
    {
        $internshippositions_edit = InternshipPosition::findOrFail($id);

        return view('company.announcementedit', compact('internshippositions_edit'));
    }
    public function announcement_update(Request $request, int $id): RedirectResponse
    {
        $position = InternshipPosition::findOrFail($id);

        $validated = $request->validate([
            'position_name' => ['string', 'max:100', 'required'],
            'position_category' => ['string', 'max:100', 'required'],
            'position_capacity' => ['integer', 'min:0', 'required'],
            'position_worktype' => ['string', 'required'],
            'position_interview_type' => ['string', 'required'],
            'position_start_date' => ['required', 'string'],
            'position_end_date' => ['required', 'string'],
            'position_start_time' => ['required', 'date_format:H:i'],
            'position_end_time' => ['required', 'date_format:H:i'],
            'position_allowance' => ['integer', 'required', 'min:0'],
            'position_qualification' => ['string', 'required'],
            'position_description' => ['string', 'required']
        ]);

        $position->position_name = $validated['position_name'];
        $position->position_description = $validated['position_description'];
        $position->position_qualification = $validated['position_qualification'];
        $position->position_category = $validated['position_category'];
        $position->position_capacity = $validated['position_capacity'];
        $position->position_allowance = $validated['position_allowance'];
        $position->position_start_date = $validated['position_start_date'];
        $position->position_end_date = $validated['position_end_date'];
        $position->position_start_time = $validated['position_start_time'];
        $position->position_end_time = $validated['position_end_time'];
        $position->position_worktype = $validated['position_worktype'];
        $position->position_interview_type = $validated['position_interview_type'];

        $position->save();

        return redirect()->route('company.announcement.all');

    }
    public function studentInformation(int $id)
    {
    
        $application = Application::with(['student', 'internshipPosition', 'interview'])->findOrFail($id);

        $interview = $application->interview;

        return view('company.studentinformation', compact('application', 'interview'));
    }

    public function applicants_profile(int $id)
    {   
        $applicants_profile = Application::with(['student', 'internshipPosition', 'interview'])
        ->findOrFail($id);

    return view('company.studentInformation', compact('applicants_profile'));
    }

    public function viewresume()
    {
        return view('company.viewdocument');
    }

    public function createInterview(int $id)
    {
        $applicants = Application::with(['student', 'internshipPosition'])
        ->findOrFail($id);
        return view('company.interviewcompany', compact('applicants'));
    }

    public function storeInterview(Request $request, int $id)
{
    $request->merge([
        'interview_date'       => "{$request->year}-{$request->month}-{$request->day}",
        'interview_start_time' => "{$request->hour}:{$request->minute}",
    ]);


    $validated = $request->validate([
        'interview_date'       => 'required' ,'date',
        'interview_start_time' => 'required' ,'date_format:H:i',
        'interview_mode'       => 'required' ,'in:onsite,online',
        'interview_location'   => 'nullable' ,'string' ,'max:255',
        'email_details'        => 'nullable' ,'string',
    ], [
        'interview_start_time.date_format' => 'กรุณาเลือกเวลาเริ่มสัมภาษณ์ให้ครบถ้วน (ชั่วโมงและนาที)',
    ]);

    $interview = new Interview();

    $interview->application_id       = $id;
    $interview->interview_date       = $validated['interview_date'];
    $interview->interview_start_time = $validated['interview_start_time'];
    $interview->interview_mode       = $validated['interview_mode'];
    $interview->interview_location   = $validated['interview_location'] ?? null;
    $interview->email_details        = $validated['email_details'] ?? null;
    $interview->interview_result     = 'pending'; 

    $interview->save();

    return redirect()->route('company.overview')->with('success', 'สร้างนัดสัมภาษณ์งานเรียบร้อยแล้ว');
}

public function profile()
    {
        $user = Auth::user();

        return view('company.profilecompany', compact('user'));
    }

public function interview_evaluation(int $id)
{   
    $user = Auth::user();

    $companyId = $user?->company?->id;

    $applicants = Application::whereHas('internshipPosition', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->with(['student', 'internshipPosition', 'interview'])
        ->findOrFail($id);
    return view('company.manageinterview', compact('applicants'));
}

public function interview_evaluation_update(Request $request, int $id)
{   
    $validated = $request->validate([
        'interview_result' => 'required|string',
        'email_details'    => 'nullable|string'
    ], [
        'interview_result.required' => 'กรุณาเลือกสถานะผู้สมัคร',
    ]);
    $interview = Interview::where('application_id', $id)->firstOrFail();

    $interview->interview_result = $validated['interview_result'];
    $interview->email_details    = $validated['email_details'] ?? null;

    $interview->save();

    return redirect()->route('company.overview')->with('success', 'บันทึกผลการประเมินเรียบร้อยแล้ว');
}
}
