@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboardadmin.css') }}?v={{ filemtime(public_path('css/dashboardadmin.css')) }}">
@endpush

@section('content')
@php
$activeTab = request('tab', 'dashboard');
@endphp

<div class="admin-page-wrapper">
    <div class="admin-container">

        <!-- Sidebar เมนูด้านซ้าย -->
        <div class="admin-sidebar">
            <div class="sidebar-title">เมนูผู้ดูแลระบบ</div>
            <div class="admin-menu">
                <a href="?tab=dashboard" class="menu-link {{ $activeTab == 'dashboard' ? 'active' : '' }}">
                    สรุปภาพรวมและรายงาน
                </a>
                <a href="?tab=users" class="menu-link {{ $activeTab == 'users' ? 'active' : '' }}">
                    จัดการ User
                </a>
                <a href="?tab=companies" class="menu-link {{ $activeTab == 'companies' ? 'active' : '' }}">
                    จัดการข้อมูลบริษัท
                </a>
                <a href="?tab=internships" class="menu-link {{ $activeTab == 'internships' ? 'active' : '' }}">
                    ข้อมูลการฝึกงาน
                </a>
                <a href="?tab=documents" class="menu-link {{ $activeTab == 'documents' ? 'active' : '' }}">
                    เอกสารและผลประเมิน
                </a>
            </div>
        </div>

        <!-- Content ฝั่งขวา -->
        <div class="admin-content">

            {{-- 1. หน้าสรุปภาพรวม --}}
            @if($activeTab == 'dashboard')
            <div class="stats-grid">
                <div class="stat-card">
                    <h4>นักศึกษาทั้งหมด</h4>
                    <div class="number">{{ $stats['total_students'] ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <h4>กำลังฝึกงาน</h4>
                    <div class="number">{{ $stats['active_interns'] ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <h4>บริษัทในระบบ</h4>
                    <div class="number">{{ $stats['total_companies'] ?? 0 }}</div>
                </div>
                <div class="stat-card">
                    <h4>ประเมินผ่านแล้ว</h4>
                    <div class="number">{{ $stats['passed_evaluations'] ?? 0 }}</div>
                </div>
            </div>

            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">สรุปสถานะการฝึกงานล่าสุด</h3>
                </div>
                <p style="color: #718096;">แสดงข้อมูลสถิติภาพรวมของระบบ...</p>
            </div>

            {{-- 2. จัดการผู้ใช้งาน & Advisor --}}
            @elseif($activeTab == 'users')
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">จัดการข้อมูลนักศึกษา</h3>
                </div>

                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    @if($user->student && ($user->student->student_fname || $user->student->student_lname))
                                    {{ $user->student->student_fname }} {{ $user->student->student_lname }}
                                    @else
                                    <span style="color: #a0aec0;">(ยังไม่กรอกข้อมูลส่วนตัว)</span>
                                    @endif
                                </td>
                                <td>{{ $user->student->student_email ?? $user->email }}</td>
                                <td>{{ $user->student->student_phone ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('newprofile', ['user_id' => $user->id]) }}" class="btn-action btn-edit" style="text-decoration: none; display: inline-block;">แก้ไข</a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้งานรายนี้?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลผู้ใช้งาน</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif($activeTab == 'companies')
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">จัดการข้อมูลและอนุมัติบริษัท</h3>
                </div>

                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ชื่อบริษัท</th>
                                <th>ผู้ติดต่อ</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies ?? [] as $company)
                            <tr>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->contact_name }}</td>
                                <td>{{ $company->contact_phone ?? '-' }}</td>
                                <td>
                                    <button class="btn-action btn-edit">ตรวจ/แก้ไข</button>

                                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบบริษัท {{ $company->company_name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลบริษัท</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif($activeTab == 'internships')
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">ข้อมูลการลงทะเบียนและสถานะฝึกงาน</h3>
                </div>

                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ชื่อนักศึกษา</th>
                                <th>บริษัทที่ฝึกงาน</th>
                                <th>รูปแบบการทำงาน</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($internships ?? [] as $intern)
                            <tr>
                                <td>
                                    {{ $intern->student->student_fname ?? '' }} {{ $intern->student->student_lname ?? 'นักศึกษา' }}
                                </td>
                                <td>
                                    {{ $intern->internshipPosition->position_name ?? '-' }}
                                    <br><small style="color: #718096;">{{ $intern->internshipPosition->company->company_name ?? '' }}</small>
                                </td>
                                <td>{{ $intern->internshipPosition->position_worktype ?? '-' }}</td>
                                <td><span class="badge badge-warning">{{ $intern->application_status }}</span></td>
                                <td>
                                    <button class="btn-action btn-edit">รายละเอียด</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลการลงทะเบียน</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif($activeTab == 'documents')
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">ตรวจสอบเอกสารและผลการประเมิน</h3>
                </div>

                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ชื่อนักศึกษา</th>
                                <th>เอกสาร</th>
                                <th>หมายเหตุ</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($documents ?? [] as $doc)
                            <tr>
                                <td>
                                    {{ $doc->application->student->student_fname ?? '' }} {{ $doc->application->student->student_lname ?? '-' }}
                                </td>
                                <td>{{ $doc->document->doc_name ?? 'เอกสารสมัครงาน' }}</td>
                                <td>{{ $doc->appdoc_remark ?? '-' }}</td>
                                <td><span class="badge badge-success">{{ $doc->appdoc_status }}</span></td>
                                <td>
                                    <button class="btn-action btn-edit">ตรวจเอกสาร</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลเอกสาร</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>
@endsection