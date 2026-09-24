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
    /**
     * แสดงหน้าเอกสาร
     */
    public function index()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        // ดึงเอกสารที่เคยอัปโหลดไว้แล้วของนักศึกษาคนนี้
        $uploadedDocs = collect();
        if ($student) {
            $uploadedDocs = Document::where('student_id', $student->id)->get()->keyBy('document_type');
        }

        // กำหนดประเภทเอกสารบังคับ
        $documents = collect([
            (object)[
                'id' => 'required_doc_1',
                'type' => 'required_doc',
                'name' => 'หนังสือขอความอนุเคราะห์ฝึกงาน',
                'description' => 'แนบไฟล์เอกสารจากทางมหาวิทยาลัย (ไฟล์ .pdf)',
                'is_required' => true,
                'is_uploaded' => isset($uploadedDocs['required_doc']),
                'file_name' => $uploadedDocs['required_doc']->document_file_path ?? null,
            ],
        ]);

        // กำหนดประเภทเอกสาร Portfolio
        $portfolios = collect([
            (object)[
                'id' => 'portfolio_doc_1',
                'type' => 'portfolio',
                'name' => 'แฟ้มสะสมผลงาน (Portfolio)',
                'description' => 'รวบรวมผลงานและโปรเจกต์ที่เคยทำ (ไฟล์ .pdf)',
                'is_required' => true,
                'is_uploaded' => isset($uploadedDocs['portfolio']),
                'file_name' => $uploadedDocs['portfolio']->document_file_path ?? null,
            ],
        ]);

        return view('document', compact('documents', 'portfolios'));
    }

    /**
     * บันทึกการอัปโหลดเอกสารลงตาราง documents และ applications_documents
     */
    public function store(Request $request)
    {
        $request->validate([
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'portfolios.*' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->firstOrFail();

        // ค้นหา Application ล่าสุดของนักศึกษา (ถ้ามี)
        $application = Application::where('student_id', $student->id)->latest()->first();

        DB::transaction(function () use ($request, $student, $application) {
            
            // 1. จัดการอัปโหลดกลุ่มเอกสารบังคับ (Required Documents)
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $docId => $file) {
                    if ($file->isValid()) {
                        $filePath = $file->store("documents/student_{$student->id}", 'public');

                        // สร้างหรืออัปเดตข้อมูลในตาราง documents
                        $document = Document::updateOrCreate(
                            [
                                'student_id' => $student->id,
                                'document_type' => 'required_doc',
                            ],
                            [
                                'document_file_path' => $filePath,
                            ]
                        );

                        // ถ้ามี ใบสมัคร (Application) ให้ผูกเข้าตาราง applications_documents
                        if ($application) {
                            DB::table('applications_documents')->updateOrInsert(
                                [
                                    'application_id' => $application->id,
                                    'document_id' => $document->id,
                                ],
                                [
                                    'appdoc_status' => 'pending',
                                    'appdoc_remark' => 'อัปโหลดเรียบร้อยแล้ว',
                                    'updated_at' => now(),
                                    'created_at' => now(),
                                ]
                            );
                        }
                    }
                }
            }

            // 2. จัดการอัปโหลดกลุ่ม Portfolio
            if ($request->hasFile('portfolios')) {
                foreach ($request->file('portfolios') as $portId => $file) {
                    if ($file->isValid()) {
                        $filePath = $file->store("portfolios/student_{$student->id}", 'public');

                        // สร้างหรืออัปเดตข้อมูลในตาราง documents
                        $document = Document::updateOrCreate(
                            [
                                'student_id' => $student->id,
                                'document_type' => 'portfolio',
                            ],
                            [
                                'document_file_path' => $filePath,
                            ]
                        );

                        // ถ้ามี ใบสมัคร (Application) ให้ผูกเข้าตาราง applications_documents
                        if ($application) {
                            DB::table('applications_documents')->updateOrInsert(
                                [
                                    'application_id' => $application->id,
                                    'document_id' => $document->id,
                                ],
                                [
                                    'appdoc_status' => 'pending',
                                    'appdoc_remark' => 'อัปโหลด Portfolio เรียบร้อยแล้ว',
                                    'updated_at' => now(),
                                    'created_at' => now(),
                                ]
                            );
                        }
                    }
                }
            }
        });

        return redirect()->back()->with('success', 'บันทึกและอัปโหลดเอกสารเรียบร้อยแล้ว');
    }
}