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

 
        <div class="stats-grid">
            <div class="stat-card card-all">
                <div class="stat-info">
                    <span class="stat-label">ผู้สมัครทั้งหมด</span>
                    <span class="stat-value">{{$applicants->count()}}</span>
                </div>
            </div>
            <div class="stat-card card-passed">
                <div class="stat-info">
                    <span class="stat-label">ผ่านการสัมภาษณ์</span>
                    <span class="stat-value">{{$applicants_interview_passed->count()}}</span>
                </div>
            </div>
            <div class="stat-card card-failed">
                <div class="stat-info">
                    <span class="stat-label">ไม่ผ่านการสัมภาษณ์</span>
                    <span class="stat-value">{{$applicants_interview_failed->count()}}</span>
                </div>
            </div>
            <div class="stat-card card-interning">
                <div class="stat-info">
                    <span class="stat-label">กำลังฝึกงาน</span>
                    <span class="stat-value">40</span>
                </div>
            </div>
        </div>


        <div class="table-card">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ผู้สมัคร / นักศึกษา</th>
                            <th>ตำแหน่งที่สมัคร</th>
                            <th>บริษัท</th>
                            <th>สถานะปัจจุบัน</th>
                            <th>วันที่สมัคร
                                
                            </th>
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
                                        <div class="user-name">{{$applicant?->student?->student_fname ?? ''}} {{$applicant?->student?->student_lname ?? ''}}</div>
                                        <div class="user-email">{{$applicant?->student?->student_email ?? ''}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$applicant?->internshipPosition?->position_name ?? ''}}</td>
                            <td>{{$applicant?->internshipPosition?->company?->company_name ?? ''}}</td>
                            <td><span class="badge badge-passed">
                                @if ($applicant?->interview?->interview_result == 'passed')
                                    ผ่านการสัมภาษณ์
                                @elseif ($applicant?->interview?->interview_result == 'failed')
                                    ไม่ผ่านการสัมภาษณ์
                                @elseif ($applicant?->interview?->interview_result == 'pending')
                                    กำลังรอดำเนินการ
                                @endif
                            </span></td>
                            <td>{{$applicant?->updated_at}}</td>
                            <td class="text-center">
                                <button class="btn-action btn-view">ดูรายละเอียด</button>
                                <button class="btn-action btn-edit">แก้ไข</button>
                            </td>
                        </tr>
                        @empty
                            <span>
                                ไม่พบผู้สมัครในระบบ
                            </span>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection