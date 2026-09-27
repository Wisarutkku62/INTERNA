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
<<<<<<< HEAD:resources/views/dashboardadmin.blade.php
=======
                </a>
                <a href="?tab=permissions" class="menu-link {{ $activeTab == 'permissions' ? 'active' : '' }}">
                    🔑 จัดการสิทธิ์การใช้งานระบบ
>>>>>>> 1cfcb19441f7ad03738c645244de89ef0961517e:resources/views/admin/dashboardadmin.blade.php
                </a>
                <a href="?tab=companies" class="menu-link {{ $activeTab == 'companies' ? 'active' : '' }}">
                    จัดการข้อมูลบริษัท
                </a>
                <a href="?tab=internships" class="menu-link {{ $activeTab == 'internships' ? 'active' : '' }}">
                    ข้อมูลการฝึกงาน
<<<<<<< HEAD:resources/views/dashboardadmin.blade.php
=======
                </a>
                <a href="?tab=verify_docs" class="menu-link {{ $activeTab == 'verify_docs' ? 'active' : '' }}">
                    📑 ตรวจสอบเอกสารในระบบ
>>>>>>> 1cfcb19441f7ad03738c645244de89ef0961517e:resources/views/admin/dashboardadmin.blade.php
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
<<<<<<< HEAD:resources/views/dashboardadmin.blade.php
            <div class="stats-grid">
                <div class="stat-card">
                    <h4>นักศึกษาทั้งหมด</h4>
                    <div class="number">{{ $stats['total_students'] ?? 0 }}</div>
=======
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
                        <h4>เอกสารรอตรวจสอบ</h4>
                        <div class="number">{{ $stats['pending_docs'] ?? 0 }}</div>
                    </div>
                    <div class="stat-card">
                        <h4>ประเมินผ่านแล้ว</h4>
                        <div class="number">{{ $stats['passed_evaluations'] ?? 0 }}</div>
                    </div>
>>>>>>> 1cfcb19441f7ad03738c645244de89ef0961517e:resources/views/admin/dashboardadmin.blade.php
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

<<<<<<< HEAD:resources/views/dashboardadmin.blade.php
            <div class="content-card">
                <div class="card-header">
                    <h3 class="card-title">สรุปสถานะการฝึกงานล่าสุด</h3>
=======
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">สรุปสถานะระบบล่าสุด</h3>
                    </div>
                    <p style="color: #718096;">แสดงข้อมูลสถิติภาพรวมของระบบ...</p>
>>>>>>> 1cfcb19441f7ad03738c645244de89ef0961517e:resources/views/admin/dashboardadmin.blade.php
                </div>
                <p style="color: #718096;">แสดงข้อมูลสถิติภาพรวมของระบบ...</p>
            </div>

            {{-- 2. จัดการผู้ใช้งาน & Advisor --}}
            @elseif($activeTab == 'users')
<<<<<<< HEAD:resources/views/dashboardadmin.blade.php
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
                                    <button class="btn-action btn-edit">แก้ไข</button>

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
=======
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">จัดการข้อมูลนักศึกษา</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>บทบาท</th>
                                    <th>สิทธิ์ระบบ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><span class="badge badge-success">{{ $user->permission_status }}</span></td>
                                    <td>
                                        <a href="#" class="btn-action btn-edit">แก้ไข</a>
                                        <!-- ฟอร์มลบข้อมูลลง Database -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('ยืนยันการลบผู้ใช้?')">ลบ</button>
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

            {{-- 3. [เพิ่มใหม่] จัดการสิทธิ์การใช้งานระบบ --}}
            @elseif($activeTab == 'permissions')
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">จัดการสิทธิ์การใช้งานระบบ (Permissions Management)</h3>
                        <a href="#" class="btn-add">+ กำหนดสิทธิ์ใหม่</a>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>กลุ่มผู้ใช้งาน (Role)</th>
                                    <th>เข้าถึงเมนู</th>
                                    <th>สิทธิ์อนุมัติเอกสาร</th>
                                    <th>สิทธิ์จัดการผู้ใช้</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Admin System</b></td>
                                    <td>ทุกเมนู</td>
                                    <td><span class="badge badge-success">อนุญาต</span></td>
                                    <td><span class="badge badge-success">อนุญาต</span></td>
                                    <td>
                                        <button class="btn-action btn-edit">แก้ไขสิทธิ์</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Advisor (อาจารย์ที่ปรึกษา)</b></td>
                                    <td>ตรวจเอกสาร, ดูสถิติ</td>
                                    <td><span class="badge badge-success">อนุญาต</span></td>
                                    <td><span class="badge badge-danger">ไม่อนุญาต</span></td>
                                    <td>
                                        <button class="btn-action btn-edit">แก้ไขสิทธิ์</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Student (นักศึกษา)</b></td>
                                    <td>ยื่นเอกสาร, ดูสถานะ</td>
                                    <td><span class="badge badge-danger">ไม่อนุญาต</span></td>
                                    <td><span class="badge badge-danger">ไม่อนุญาต</span></td>
                                    <td>
                                        <button class="btn-action btn-edit">แก้ไขสิทธิ์</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            {{-- 4. จัดการข้อมูลบริษัท --}}
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
                                        <span class="badge {{ $company->status == 'approved' ? 'badge-success' : 'badge-warning' }}">
                                            {{ $company->status == 'approved' ? 'อนุมัติแล้ว' : 'รอตรวจสอบ' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn-action btn-edit">แก้ไข</button>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('ยืนยันการลบบริษัท?')">ลบ</button>
                                        </form>
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

            {{-- 5. ข้อมูลการฝึกงาน --}}
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
                                    <td><button class="btn-action btn-edit">รายละเอียด</button></td>
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

            {{-- 6. [เพิ่มใหม่] หน้าตรวจสอบเอกสารในระบบ --}}
            @elseif($activeTab == 'verify_docs')
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">ตรวจสอบและอนุมัติเอกสารฝึกงาน</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>นักศึกษา</th>
                                    <th>ประเภทเอกสาร</th>
                                    <th>ไฟล์แนบ</th>
                                    <th>วันที่ส่ง</th>
                                    <th>สถานะการตรวจ</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendingDocs ?? [] as $doc)
                                <tr>
                                    <td>{{ $doc->student_name }}</td>
                                    <td>{{ $doc->title }}</td>
                                    <td><a href="{{ asset($doc->file_path) }}" target="_blank" style="color: #0037ff;">📁 เปิดดูไฟล์</a></td>
                                    <td>{{ $doc->created_at ? $doc->created_at->format('d/m/Y') : '-' }}</td>
                                    <td><span class="badge badge-warning">รอการตรวจสอบ</span></td>
                                    <td>
                                        <button class="btn-action btn-approve">อนุมัติ</button>
                                        <button class="btn-action btn-reject">ส่งกลับแก้ไข</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; color: #a0aec0;">ไม่มีเอกสารที่รอการตรวจสอบ</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            {{-- 7. หน้าเอกสารและผลประเมิน (ภาพรวมเอกสารทั้งหมด) --}}
            @elseif($activeTab == 'documents')
                <div class="content-card">
                    <div class="card-header">
                        <h3 class="card-title">รายการเอกสารทั้งหมดและผลการประเมิน</h3>
                        <a href="#" class="btn-add">+ อัปโหลดเอกสารใหม่</a>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>ชื่อนักศึกษา</th>
                                    <th>ชื่อเอกสาร</th>
                                    <th>คะแนนประเมิน</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ (ลบ/แก้ไข)</th>
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
                                        <button class="btn-action btn-edit">แก้ไข</button>
                                        
                                        <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('คุณต้องการลบเอกสารนี้ออกจากฐานข้อมูลหรือไม่?')">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; color: #a0aec0;">ไม่พบข้อมูลเอกสารในระบบ</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
>>>>>>> 1cfcb19441f7ad03738c645244de89ef0961517e:resources/views/admin/dashboardadmin.blade.php
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