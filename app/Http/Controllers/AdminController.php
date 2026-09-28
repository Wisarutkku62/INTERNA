<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Company;
use App\Models\Application;
use App\Models\Evaluation;
use App\Models\ApplicationDocument;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->query('tab', 'dashboard');

        $stats = [
            'total_students'     => Student::count(),
            'active_interns'     => class_exists(Application::class) ? Application::where('application_status', 'approved')->count() : 0,
            'total_companies'    => class_exists(Company::class) ? Company::count() : 0,
            'passed_evaluations' => class_exists(Evaluation::class) ? Evaluation::where('evaluation_score', '>=', 50)->count() : 0,
        ];

        $users = [];
        $companies = [];
        $internships = [];
        $documents = [];

        if ($activeTab == 'users') {
            $users = User::with('student')->orderBy('id', 'asc')->get();
        } elseif ($activeTab == 'companies' && class_exists(Company::class)) {
            $companies = Company::orderBy('id', 'asc')->get();
        } elseif ($activeTab == 'internships' && class_exists(Application::class)) {
            $internships = Application::with(['student', 'internshipPosition.company'])->orderBy('id', 'asc')->get();
        } elseif ($activeTab == 'documents' && class_exists(ApplicationDocument::class)) {
            $documents = ApplicationDocument::with(['application.student', 'document'])->orderBy('id', 'asc')->get();
        }

       return view('admin.dashboardadmin', compact(
            'stats',
            'users',
            'companies',
            'internships',
            'documents'
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
    
}
