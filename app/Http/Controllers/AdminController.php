<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Student;
use App\Models\Company;
use App\Models\Application;
use App\Models\Evaluation;
use App\Models\Document;
use App\Models\ApplicationDocument;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->query('tab', 'dashboard');

        $stats = [
            'total_students' => Student::count(),
            'active_interns' => Application::whereIn('application_status', ['approved', 'อนุมัติ', 'กำลังฝึกงาน'])->count(),
            'total_companies' => Company::count(),
            'passed_evaluations' => Evaluation::where('evaluation_score', '>=', 50)->count(),
        ];

        $users              = [];
        $companies          = [];
        $internships        = [];
        $documents          = [];
        $recentApplications = [];

        if ($activeTab == 'dashboard') {
            $recentApplications = Application::with(['student', 'internshipPosition.company'])
                ->latest()
                ->get();
        } elseif ($activeTab == 'users') {
            $users = User::whereHas('student')->with('student')->orderBy('id', 'asc')->get();
        } elseif ($activeTab == 'companies') {
            $companies = Company::orderBy('id', 'asc')->get();
        } elseif ($activeTab == 'internships') {
            $internships = Application::with(['student', 'internshipPosition.company'])->orderBy('id', 'asc')->get();
        } elseif ($activeTab == 'documents') {
            $documents = Document::with('student')->orderBy('id', 'desc')->get();
        }

        return view('admin.dashboardadmin', compact(
            'stats',
            'users',
            'companies',
            'internships',
            'documents',
            'recentApplications'
        ));
    }

    public function destroyUser($id)
    {
        DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);

            $student = Student::where('user_id', $user->id)->first();
            if ($student) {
                $applications = Application::where('student_id', $student->id)->get();
                foreach ($applications as $app) {
                    DB::table('evaluations')->where('application_id', $app->id)->delete();
                    DB::table('applications_documents')->where('application_id', $app->id)->delete();
                    $app->delete();
                }
                $student->delete();
            }

            $company = Company::where('user_id', $user->id)->first();
            if ($company) {
                $positions = DB::table('internship_positions')->where('company_id', $company->id)->pluck('id');
                foreach ($positions as $posId) {
                    $apps = Application::where('internship_position_id', $posId)->get();
                    foreach ($apps as $app) {
                        DB::table('evaluations')->where('application_id', $app->id)->delete();
                        DB::table('applications_documents')->where('application_id', $app->id)->delete();
                        $app->delete();
                    }
                }
                DB::table('internship_positions')->where('company_id', $company->id)->delete();
                $company->delete();
            }

            $user->delete();
        });

        return redirect()->back()->with('success', 'ลบข้อมูลผู้ใช้งานเรียบร้อยแล้ว');
    }

    public function destroyCompany($id)
    {
        DB::transaction(function () use ($id) {
            $company = Company::findOrFail($id);

            $positions = DB::table('internship_positions')->where('company_id', $company->id)->pluck('id');
            foreach ($positions as $posId) {
                $apps = Application::where('internship_position_id', $posId)->get();
                foreach ($apps as $app) {
                    DB::table('evaluations')->where('application_id', $app->id)->delete();
                    DB::table('applications_documents')->where('application_id', $app->id)->delete();
                    $app->delete();
                }
            }

            DB::table('internship_positions')->where('company_id', $company->id)->delete();
            $company->delete();
        });

        return redirect()->back()->with('success', 'ลบข้อมูลบริษัทเรียบร้อยแล้ว');
    }

    public function destroyDocument($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $appDoc = ApplicationDocument::find($id);
                if ($appDoc) {
                    $filePath = $appDoc->appdoc_file_path ?? $appDoc->file_path;
                    if ($filePath) {
                        $cleanPath = ltrim(str_replace('/storage/', '', $filePath), '/');
                        if (Storage::disk('public')->exists($cleanPath)) {
                            Storage::disk('public')->delete($cleanPath);
                        }
                    }
                    $appDoc->delete();
                    return redirect()->back()->with('success', 'ลบเอกสารการสมัครเรียบร้อยแล้ว');
                }

                $doc = Document::find($id);
                if ($doc) {
                    DB::table('applications_documents')->where('document_id', $doc->id)->delete();

                    $filePath = $doc->document_file_path ?? $doc->file_path;
                    if ($filePath) {
                        $cleanPath = ltrim(str_replace('/storage/', '', $filePath), '/');
                        if (Storage::disk('public')->exists($cleanPath)) {
                            Storage::disk('public')->delete($cleanPath);
                        }
                    }

                    $doc->delete();
                    return redirect()->back()->with('success', 'ลบเอกสารเรียบร้อยแล้ว');
                }

                return redirect()->back()->with('error', 'ไม่พบข้อมูลเอกสารที่ต้องการลบ');
            });
        } catch (\Exception $e) {
            Log::error('Error destroying document: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการลบเอกสาร');
        }
    }
    public function viewStudentProfile(int $id) 
    {
        $user = User::findOrFail($id);

        return view('student.newprofile', compact('user'));
    }

    public function viewCompanyProfile(int $id) 
    {
        $user = User::findOrFail($id);

        return view('company.companyedit', compact('user'));
    }

    
}