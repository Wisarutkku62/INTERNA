@extends("layouts.company_nav")

@push('styles')
<link rel="stylesheet" href="{{ asset('css/managecom.css') }}">
@endpush

@section('content')
<div class="dashboard-wrapper">
    <aside class="card profile-card">
        <div class="logo-section">
    <form action="{{ route('company.update.logo') }}" method="POST" enctype="multipart/form-data" id="logoForm" class="logo-form-wrapper">
        @csrf
        <div class="logo-box">
            @if($user?->company?->company_profile)
                <img src="{{ asset('storage/' . $user->company->company_profile) }}" alt="Logo" class="company-logo-img">
            @else
                <svg class="building-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M3 21h18M3 7v14M21 7v14M6 10h4M6 14h4M14 10h4M14 14h4M9 3h6v4H9z" />
                </svg>
            @endif
        </div>
        <label for="company_logo_input" class="btn-camera" style="cursor: pointer;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                <circle cx="12" cy="13" r="4" />
            </svg>
        </label>
        
        <input type="file" name="company_logo" id="company_logo_input" accept="image/*" style="display: none;" onchange="document.getElementById('logoForm').submit();">
    </form>
    <span class="logo-label">รูปโลโก้บริษัท</span>
</div>

        <h3 class="welcome-title">{{$user?->company?->company_name}}</h3>
        <a href="{{route('company.edit.profile')}}" class="btn-edit">แก้ไขข้อมูลบริษัท</a>
        <p class="text-commend">กรุณากรอกข้อมูลบริษัทให้ครบก่อนยืนยันตัวตน</p>
    </aside>

    <main class="main-content">
        <div class="grid-top">
            <section class="card job-card">
                <h3 class="card-title">ตำแหน่งงานของคุณ</h3>
                <div class="stat-item">
                    <span class="stat-num">{{$user?->company?->internshippositions?->count() ?? 0}}</span>
                    <span class="stat-label">ทั้งหมด</span>
                </div>
                <div class="button-group">
                    <a href="{{route('company.announcement')}}" class="btn-action btn-blue">
                        สร้างประกาศงาน
                    </a>
                    <a href="{{route('company.announcement.all')}}" class="btn-action btn-gray">ดูงานทั้งหมด</a>
                </div>
            </section>

            <section class="card package-card">
                <div class="card-header">
                    <h3 class="card-title">นัดหมายสัมภาษณ์เร็วๆ นี้</h3>
                </div>

                <div class="interview-list">
                    @forelse($interviews as $interview)
                    <div class="interview-item">
                        <div class="interview-time">
                            <span class="time-num">{{$interview?->interview_start_time}}</span>
                            <span class="time-date">{{$interview?->interview_date}}</span>
                        </div>
                        <div class="interview-info">
                            <strong>{{$interview?->application?->student?->student_fname}} {{$interview?->application?->student?->student_lname}}</strong>
                            <p>ตำแหน่ง: {{$interview?->application?->internshipPosition?->position_name}}</p>
                        </div>
                        <div class="group-text">
                            <span class="badge-status">สัมภาษณ์ออนไลน์</span>
                            <a href="{{route('company.interview_evaluation', $interview->application_id)}}" class="btn-estimate">ประเมินผลสัมภาษณ์</a>
                        </div>
                    </div>
                    @empty
                    <p class="empty-enroll">ไม่พบข้อมูลผู้สมัคร</p>
                    @endforelse
                </div>
            </section>
        </div>

        <section class="card applicants-card">
            <div class="card-header">
                <h3 class="card-title">ผู้สมัครล่าสุด</h3>
            </div>
            <div class="interview-list">
                @forelse ($applicants as $applicant)
                <div class="interview-item">
                    <div class="interview-time">
                        <span class="time-num">{{$applicant->created_at}}</span>
                    </div>
                    <div class="interview-info">
                        <strong>{{$applicant->student->student_fname}} {{$applicant->student->student_lname}}</strong>
                        <p>{{$applicant->internshipposition->position_name}}</p>
                    </div>
                    <div class="badge-group">
                        <span class="badge-status">{{$applicant->internshipposition->position_interview_type}}</span>
                        <a href="{{route('company.applicants.profile', $applicant->id)}}" class="info-more">ดูรายละเอียดเพิ่มเติม</a>
                    </div>
                </div>
                @empty
                <p class="empty-enroll">ไม่พบข้อมูลผู้สมัคร</p>
                @endforelse
            </div>
        </section>
    </main>
</div>
@endsection