@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Recheck.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="recheck-container">
    <div class="main-card-wrapper">
        <header class="page-header">
            <h1 class="page-title">ตรวจสอบสถานะผู้สมัครและนักศึกษา</h1>
            <p class="page-subtitle">จัดการและติดตามสถานะผู้สมัคร การสัมภาษณ์ และนักศึกษาฝึกงานทั้งหมด</p>
        </header>

        {{-- สถิติการ์ด 5 ใบ --}}
        <div class="stats-grid">
            <a href="{{ route('company.applicants.all', ['status' => 'all']) }}"
                class="stat-card card-all {{ $currentStatus == 'all' ? 'active' : '' }}">
                <div class="stat-info">
                    <span class="stat-label">ผู้สมัครทั้งหมด</span>
                    <span class="stat-value">{{ $applicants_all->count() }}</span>
                </div>
            </a>

            <a href="{{ route('company.applicants.all', ['status' => 'passed']) }}"
                class="stat-card card-passed {{ $currentStatus == 'passed' ? 'active' : '' }}">
                <div class="stat-info">
                    <span class="stat-label">ผ่านการสัมภาษณ์</span>
                    <span class="stat-value">{{ $applicants_interview_passed->count() }}</span>
                </div>
            </a>

            <a href="{{ route('company.applicants.all', ['status' => 'failed']) }}"
                class="stat-card card-failed {{ $currentStatus == 'failed' ? 'active' : '' }}">
                <div class="stat-info">
                    <span class="stat-label">ไม่ผ่านการสัมภาษณ์</span>
                    <span class="stat-value">{{ $applicants_interview_failed->count() }}</span>
                </div>
            </a>

            <a href="{{ route('company.applicants.all', ['status' => 'interning']) }}"
                class="stat-card card-interning {{ $currentStatus == 'interning' ? 'active' : '' }}">
                <div class="stat-info">
                    <span class="stat-label">กำลังฝึกงาน</span>
                    <span class="stat-value">{{ $applicants_interning->count() }}</span>
                </div>
            </a>

            <a href="{{ route('company.applicants.all', ['status' => 'completed']) }}"
                class="stat-card card-completed {{ $currentStatus == 'completed' ? 'active' : '' }}">
                <div class="stat-info">
                    <span class="stat-label">ฝึกงานสำเร็จ</span>
                    <span class="stat-value">{{ $applicants_completed->count() }}</span>
                </div>
            </a>
        </div>

        {{-- ตารางข้อมูล --}}
        <div class="table-card">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ผู้สมัคร / นักศึกษา</th>
                            <th>ตำแหน่งที่สมัคร</th>
                            <th>บริษัท</th>
                            <th>สถานะปัจจุบัน</th>
                            <th>วันที่สมัคร</th>
                            <th class="text-center">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applicants as $applicant)
                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="avatar"></div>
                                    <div>
                                        <div class="user-name">{{ $applicant?->student?->student_fname ?? '' }} {{ $applicant?->student?->student_lname ?? '' }}</div>
                                        <div class="user-email">{{ $applicant?->student?->student_email ?? '' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $applicant?->internshipPosition?->position_name ?? '' }}</td>
                            <td>{{ $applicant?->internshipPosition?->company?->company_name ?? '' }}</td>
                            <td>
                                @if ($applicant?->evaluation || $applicant?->application_status == 'completed')
                                    <span class="badge badge-completed">ฝึกงานสำเร็จ</span>
                                @elseif ($applicant?->application_status == 'interning')
                                    <span class="badge badge-interning">กำลังฝึกงานอยู่</span>
                                @elseif ($applicant?->interview?->interview_result == 'passed')
                                    <span class="badge badge-passed">ผ่านการสัมภาษณ์</span>
                                @elseif ($applicant?->interview?->interview_result == 'failed')
                                    <span class="badge badge-failed">ไม่ผ่านการสัมภาษณ์</span>
                                @elseif ($applicant?->interview?->interview_result == 'pending' || $applicant?->application_status == 'pending')
                                    <span class="badge badge-pending">กำลังรอดำเนินการ</span>
                                @else
                                    <span class="badge badge-secondary">{{ $applicant?->application_status }}</span>
                                @endif
                            </td>
                            <td>{{ $applicant?->updated_at }}</td>
                            <td class="text-center">
                                <div class="action-buttons">
                                    <button class="btn-action btn-view">ดูรายละเอียด</button>

                                    @if ($applicant?->application_status == 'interning' && !$applicant?->evaluation)
                                    <a href="{{ route('company.evaluation', $applicant->id) }}" class="btn-action btn-evaluate">
                                        ประเมินผล
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                ไม่พบผู้สมัครในระบบ
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div> {{-- ปิด .main-card-wrapper --}}
</div> {{-- ปิด .recheck-container --}}
@endsection