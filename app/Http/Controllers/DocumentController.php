<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        
        $student = Student::where('user_id', $user->id ?? 1)->first();

        if ($student) {
            $documents = Document::where('student_id', $student->id)
                ->orderByDesc('id')
                ->get();
        } else {
            $documents = collect();
        }

        return view('document', compact('documents'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:20480'],
        ]);

        if ($request->hasFile('file')) {
            $user = Auth::user();

            $student = Student::firstOrCreate(
                ['user_id' => $user->id ?? 1],
                [
                    'student_fname' => $user->name ?? 'Student',
                    'student_lname' => 'User',
                    'student_email' => $user->email ?? 'student@example.com',
                ]
            );

            $path = $request->file('file')->store('documents', 'public');

            $document = new Document();
            $document->student_id = $student->id;
            $document->document_type = 'เอกสารฝึกงาน';
            $document->document_file_path = Storage::url($path);
            $document->save();

            return redirect()
                ->route('documents.index')
                ->with('success', 'ส่งไฟล์เอกสารเรียบร้อยแล้ว');
        }

        return back()->with('error', 'กรุณาเลือกไฟล์เอกสาร');
    }
}