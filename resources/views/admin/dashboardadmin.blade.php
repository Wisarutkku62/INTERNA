@extends('layouts.app')

@push('styles')
    <link rel="stylesheet"
        href="{{ asset('css/dashboardadmin.css') }}?v={{ filemtime(public_path('css/dashboardadmin.css')) }}">
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
                        สรุปภาพรวมและรายงาน
                    </a>
                    <a href="?tab=users" class="menu-link {{ $activeTab == 'users' ? 'active' : '' }}">
                        จัดการข้อมูลนักศึกษา
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
                            <h3 class="card-title">รายการสมัครงานล่าสุดในระบบ</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>ชื่อนักศึกษา</th>
                                        <th>ตำแหน่งงาน</th>
                                        <th>บริษัท</th>
                                        <th>วันที่สมัคร</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentApplications ?? [] as $app)
                                        <tr>
                                            <td>
                                                {{ $app->student->student_fname ?? '' }}
                                                {{ $app->student->student_lname ?? 'นักศึกษา' }}
                                            </td>
                                            <td>{{ $app->internshipPosition->position_name ?? '-' }}</td>
                                            <td>{{ $app->internshipPosition->company->company_name ?? '-' }}</td>
                                            <td>{{ $app->created_at ? $app->created_at->format('d/m/Y H:i') : '-' }}</td>
                                            <td>
                                                @php $status = strtolower($app->application_status ?? ''); @endphp

                                                @if(in_array($status, ['pending', 'รออนุมัติ', 'รอดำเนินการ']))
                                                    <span class="badge badge-warning">รอดำเนินการ</span>
                                                @elseif(in_array($status, ['interning', 'approved', 'กำลังฝึกงาน', 'อนุมัติ']))
                                                    <span class="badge badge-success">กำลังฝึกงาน</span>
                                                @elseif(in_array($status, ['rejected', 'ไม่อนุมัติ']))
                                                    <span class="badge badge-danger">ไม่อนุมัติ</span>
                                                @else
                                                    <span class="badge badge-warning">รอดำเนินการ</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">ยังไม่มีรายการสมัครงานล่าสุด</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- 2. จัดการผู้ใช้งาน --}}
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
                                                {{ $user->student->student_fname ?? '-' }} {{ $user->student->student_lname ?? '' }}
                                            </td>
                                            <td>{{ $user->student->student_email ?? '-' }}</td>
                                            <td>{{ $user->student->student_phone ?? '-' }}</td>
                                            <td>
                                                <div class="action-group">
                                                    <a href="{{ route('newprofile', ['user_id' => $user->id]) }}"
                                                        class="btn-action btn-edit">แก้ไข</a>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้งานรายนี้?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-action btn-delete">ลบ</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">ไม่พบข้อมูลนักศึกษา</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- 3. จัดการข้อมูลบริษัท --}}
                @elseif($activeTab == 'companies')
                    <div class="content-card">
                        <div class="card-header">
                            <h3 class="card-title">จัดการข้อมูลบริษัท</h3>
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
                                                <div class="action-group">
                                                    <a href="{{ route('company.edit.profile', ['id' => $company->id]) }}"
                                                        class="btn-action btn-edit">ตรวจ/แก้ไข</a>
                                                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST"
                                                        onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบบริษัท {{ $company->company_name }}?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-action btn-delete">ลบ</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">ไม่พบข้อมูลบริษัท</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- 4. ข้อมูลการฝึกงาน --}}
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
                                                {{ $intern->student->student_fname ?? '' }}
                                                {{ $intern->student->student_lname ?? 'นักศึกษา' }}
                                            </td>
                                            <td>
                                                {{ $intern->internshipPosition->position_name ?? '-' }}
                                                <br><small>{{ $intern->internshipPosition->company->company_name ?? '' }}</small>
                                            </td>
                                            <td>{{ $intern->internshipPosition->position_worktype ?? '-' }}</td>
                                            <td>
                                                @if(in_array(strtolower($intern->application_status ?? ''), ['interning', 'approved', 'กำลังฝึกงาน', 'อนุมัติ']))
                                                    <span class="badge badge-success">กำลังฝึกงาน</span>
                                                @elseif(in_array(strtolower($intern->application_status ?? ''), ['rejected', 'ไม่อนุมัติ']))
                                                    <span class="badge badge-danger">ไม่อนุมัติ</span>
                                                @else
                                                    <span class="badge badge-warning">รอดำเนินการ</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action-group">
                                                    <a href="{{ route('company.applicants.profile', ['id' => $intern->id]) }}"
                                                        class="btn-action btn-edit">รายละเอียด</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">ยังไม่มีข้อมูลการฝึกงาน</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- 5. ตรวจสอบเอกสาร --}}
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
                                        <th>ประเภทเอกสาร</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents ?? [] as $doc)
                                        <tr>
                                            <td>
                                                {{ $doc->student->student_fname ?? '' }} {{ $doc->student->student_lname ?? '-' }}
                                            </td>
                                            <td>{{ $doc->document_type ?? 'เอกสารฝึกงาน' }}</td>
                                            <td>{{ $doc->document_type ?? '-' }}</td>
                                            <td><span class="badge badge-success">ส่งแล้ว</span></td>
                                            <td>
                                                <div class="action-group">
                                                    {{-- ปุ่มตรวจเอกสาร --}}
                                                    @if(!empty($doc->document_file_path))
                                                        @php
                                                            $filePath = ltrim(str_replace('/storage/', '', $doc->document_file_path), '/');
                                                        @endphp
                                                        <a href="{{ asset('storage/' . $filePath) }}" target="_blank"
                                                            class="btn-action btn-edit">
                                                            ตรวจเอกสาร
                                                        </a>
                                                    @elseif(!empty($doc->appdoc_file_path))
                                                        @php
                                                            $appPath = ltrim(str_replace('/storage/', '', $doc->appdoc_file_path), '/');
                                                        @endphp
                                                        <a href="{{ asset('storage/' . $appPath) }}" target="_blank"
                                                            class="btn-action btn-edit">
                                                            ตรวจเอกสาร
                                                        </a>
                                                    @else
                                                        <button type="button" class="btn-action btn-edit"
                                                            onclick="alert('ไม่พบไฟล์เอกสารในระบบ')">
                                                            ตรวจเอกสาร
                                                        </button>
                                                    @endif

                                                    {{-- ปุ่มลบเอกสาร --}}
                                                    <form action="{{ route('admin.documents.destroy', $doc->id) }}" method="POST"
                                                        onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบเอกสารรายการนี้?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-action btn-delete">ลบ</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">ไม่พบข้อมูลเอกสาร</td>
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