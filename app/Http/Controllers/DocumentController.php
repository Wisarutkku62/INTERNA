<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Application;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id ?? 1)->first();
        
        $uploadedDocs = collect();
        if ($student) {
            // ดึงรายการเอกสารทั้งหมดของนักศึกษา
            $uploadedDocs = Document::where('student_id', $student->id)
                ->orderByDesc('id')
                ->get();
        }

        return view('document', compact('uploadedDocs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $user = Auth::user();
        $student = Student::where('user_id', $user->id ?? 1)->firstOrFail();
        $application = Application::where('student_id', $student->id)->latest()->first();

        DB::transaction(function () use ($request, $student, $application) {
            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                if ($file->isValid()) {
                    $filePath = $file->store("documents/student_{$student->id}", 'public');

                    // บันทึกไฟล์เอกสารทั่วไป
                    $document = Document::create([
                        'student_id' => $student->id,
                        'document_type' => 'เอกสารฝึกงาน',
                        'document_file_path' => $filePath,
                    ]);

                    if ($application) {
                        DB::table('applications_documents')->updateOrInsert(
                            [
                                'application_id' => $application->id,
                                'document_id' => $document->id,
                            ],
                            [
                                'appdoc_status' => 'pending',
                                'appdoc_remark' => 'อัปโหลดเอกสารเรียบร้อยแล้ว',
                                'updated_at' => now(),
                                'created_at' => now(),
                            ]
                        );
                    }
                }
            }
        });

        return redirect()->back()->with('success', 'บันทึกและอัปโหลดเอกสารเรียบร้อยแล้ว');
    }
}