<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
     public function profile()
    {
        $user = Auth::user()->load('student');

        return view('profile', compact('user'));
    }

    public function saveProfile(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:100'],
            'lname' => ['required', 'string', 'max:100'],
            'gender' => ['nullable', 'string'],
            'day' => ['nullable'],
            'month' => ['nullable'],
            'year' => ['nullable'],
            'nationality' => ['nullable', 'string'],
            'religion' => ['nullable', 'string'],
            'education' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'email'],
            'address' => ['nullable', 'string', 'max:200'],
            'bio' => ['nullable', 'string'],
        ]);

        $birthday = null;

        if ($request->day && $request->month && $request->year) {
            $birthday = ($request->year - 543) . '-' .
                        str_pad($request->month, 2, '0', STR_PAD_LEFT) . '-' .
                        str_pad($request->day, 2, '0', STR_PAD_LEFT);
        }

        Student::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'student_fname' => $request->fname,
                'student_lname' => $request->lname,
                'student_gender' => $request->gender,
                'student_birthday' => $birthday,
                'student_religion' => $request->religion,
                'student_nationality' => $request->nationality,
                'student_degree' => $request->education,
                'student_bio' => $request->bio,
                'student_email' => $request->email,
                'student_phone' => $request->phone,
                'student_address' => $request->address,
            ]
        );

        return redirect()
            ->route('profile.profile')
            ->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    
    public function evaluation()
    {
        return view ('evaluation.profile');
    }

    public function saveEvaluation(Request $request)
    {
    // เดี๋ยวค่อยเขียนบันทึก DB
    }
}
