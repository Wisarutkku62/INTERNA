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

        <div class="admin-sidebar">
            <div class="sidebar-title">เมนูผู้ดูแลระบบ</div>
            <div class="admin-menu">
                <a href="?tab=dashboard" class="menu-link {{ $activeTab == 'dashboard' ? 'active' : '' }}">
                    📊 สรุปภาพรวมและรายงาน
                </a>
                <a href="?tab=users" class="menu-link {{ $activeTab == 'users' ? 'active' : '' }}">
                    👥 จัดการผู้ใช้งาน & Advisor
                </a>
                <a href="?tab=companies" class="menu-link {{ $activeTab == 'companies' ? 'active' : '' }}">
                    🏢 จัดการข้อมูลบริษัท
                </a>
                <a href="?tab=internships" class="menu-link {{ $activeTab == 'internships' ? 'active' : '' }}">
                    🎓 ข้อมูลการฝึกงาน
                </a>
                <a href="?tab=documents" class="menu-link {{ $activeTab == 'documents' ? 'active' : '' }}">
                    📄 เอกสารและผลประเมิน
                </a>
            </div>
        </div>

        <div class="admin-content">
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

            @elseif($activeTab == 'users')
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">จัดการข้อมูลนักศึกษา และ Advisor</h3>
                        <a href="#" class="btn-add">+ เพิ่มผู้ใช้งาน</a>
                    </div>

                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>บทบาท</th>
                                    <th>Advisor</th>
                                    <th>สิทธิ์ระบบ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users ?? [] as $user)
                                <tr>
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->advisor_name ?? '-' }}</td>
                                    <td><span class="badge badge-success">{{ $user->permission_status }}</span></td>
                                    <td>
                                        <button class="btn-action btn-edit">แก้ไข</button>
                                        <button class="btn-action btn-delete">ลบ</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลผู้ใช้งาน</td>
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
                        <a href="#" class="btn-add">+ เพิ่มบริษัท</a>
                    </div>

                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>ชื่อบริษัท</th>
                                    <th>ผู้ติดต่อ</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies ?? [] as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->contact_person }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>
                                        @if($company->status == 'approved')
                                            <span class="badge badge-success">อนุมัติแล้ว</span>
                                        @else
                                            <span class="badge badge-warning">รอตรวจสอบ</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn-action btn-edit">ตรวจ/แก้ไข</button>
                                        <button class="btn-action btn-delete">ลบ</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลบริษัท</td>
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
                                    <th>ช่วงเวลา</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($internships ?? [] as $intern)
                                <tr>
                                    <td>{{ $intern->student_name }}</td>
                                    <td>{{ $intern->company_name }}</td>
                                    <td>{{ $intern->period }}</td>
                                    <td><span class="badge badge-warning">{{ $intern->status }}</span></td>
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
                                    <th>ผลประเมิน</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents ?? [] as $doc)
                                <tr>
                                    <td>{{ $doc->student_name }}</td>
                                    <td>{{ $doc->doc_name }}</td>
                                    <td>{{ $doc->evaluation_score ?? 'ยังไม่ประเมิน' }}</td>
                                    <td><span class="badge badge-success">{{ $doc->doc_status }}</span></td>
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