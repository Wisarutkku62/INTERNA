<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function newProfile()
    {
        $user = Auth::user();

        return view('student.newprofile', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('student.profile', compact('user'));
    }

    public function saveProfile(Request $request)
{
    $request->validate([
        'fname'           => ['nullable', 'string', 'max:100'],
        'lname'           => ['nullable', 'string', 'max:100'],
        'gender'          => ['nullable', 'string'],
        'day'             => ['nullable'],
        'month'           => ['nullable'],
        'year'            => ['nullable'],
        'nationality'     => ['nullable', 'string'],
        'religion'        => ['nullable', 'string'],
        'education'       => ['nullable', 'string'],
        'phone'           => ['nullable', 'string', 'max:10'],
        'address'         => ['nullable', 'string', 'max:200'],
        'bio'             => ['nullable', 'string'],
        'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
    ]);

    $user = Auth::user();

    if ($user->role === 'admin' && $request->filled('student_id')) {
        $student = Student::findOrFail($request->student_id);
    } else {
        $student = Student::where('user_id', $user->id)->first();
    }

    $birthday = null;
    if ($request->day && $request->month && $request->year) {
        $birthday = ($request->year) . '-' .
            str_pad($request->month, 2, '0', STR_PAD_LEFT) . '-' .
            str_pad($request->day, 2, '0', STR_PAD_LEFT);
    }

    $data = [
        'student_fname'       => $request->fname,
        'student_lname'       => $request->lname,
        'student_gender'      => $request->gender,
        'student_birthday'    => $birthday,
        'student_religion'    => $request->religion,
        'student_nationality' => $request->nationality,
        'student_degree'      => $request->education,
        'student_bio'         => $request->bio,
        'student_phone'       => $request->phone,
        'student_address'     => $request->address,
    ];

    if ($request->hasFile('profile_picture')) {
        if ($student?->student_profile && Storage::disk('public')->exists($student->student_profile)) {
            Storage::disk('public')->delete($student->student_profile);
        }

        $data['student_profile'] = $request->file('profile_picture')->store('student_profiles', 'public');
    }

    if ($student) {
        $student->update($data);
    } else {
        $data['user_id'] = $user->id;
        $data['student_email'] = $user->email;
        Student::create($data);
    }

    if ($user->role === 'admin') {
        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'บันทึกข้อมูลนักศึกษาเรียบร้อยแล้ว');
    }

    return redirect()
        ->route('profile.profile')
        ->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
}

    public function evaluation()
    {
        return view('evaluation');
    }

    public function saveEvaluation(Request $request)
    {
        // เดี๋ยวค่อยเขียนบันทึก DB
    }
    public function overview()
    {
        return view('ManageInternship');
    }
    public function appointment()
    {
        return view('appointment');
    }
    public function updateAppointment(Request $request)
    {
        $action = $request->input('action');

        return back()->with('success', 'บันทึกสถานะการนัดหมายเรียบร้อยแล้ว');
    }
}
