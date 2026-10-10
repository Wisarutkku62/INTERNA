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
        'document_type' => ['required', 'string'],
        'file'          => ['required', 'file', 'mimes:pdf,doc,docx,jpg,png', 'max:10240'], 
    ]);

    if ($request->hasFile('file')) {
        $user = Auth::user();

        $student = Student::firstOrCreate(
            ['user_id' => $user->id],
            [
                'student_fname' => $user->name ?? 'Student',
                'student_lname' => 'User',
                'student_email' => $user->email ?? 'student@example.com',
            ]
        );

        $path = $request->file('file')->store('documents', 'public');

        $document = new Document();
        $document->student_id         = $student->id;
        $document->document_type       = $request->document_type; 
        $document->document_file_path = $path;
        $document->save();

        return redirect()
            ->route('documents.index')
            ->with('success', 'อัปโหลดเอกสารเรียบร้อยแล้ว');
    }

    return back()->with('error', 'กรุณาเลือกไฟล์เอกสาร');
}
public function delete(int $id)
    {
        $document = Document::findOrFail($id);

        if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->back()->with('success', 'ลบเอกสารเรียบร้อยแล้ว');
    }
}