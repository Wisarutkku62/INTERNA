@extends("layouts.app")

@push('styles')
<link rel="stylesheet"
    href="{{ asset('css/evaluationstd.css') }}?v={{ filemtime(public_path('css/evaluationstd.css')) }}">
@endpush

@section('content')
<div class="dashboard-wrapper">

    <div class="profile-card card">
        <div class="logo-section">
            <div class="logo-box">
                <svg class="building-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="12" cy="8" r="4"></circle>
                    <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
                </svg>
                <button class="btn-camera">📷</button>
            </div>
            <div class="logo-label">รูปโปรไฟล์นักศึกษา</div>
        </div>

        <div class="welcome-title">
            <div>ยินดีต้อนรับ</div>
            <div>
                @php
                $fname = $user?->student?->student_fname;
                @endphp
                @if(!empty($fname) && $fname !== '-')
                {{ $fname }}
                @else
                {{ \App\Models\Student::whereNotNull('student_fname')->where('student_fname', '!=', '-')->value('student_fname') }}
                @endif
            </div>
        </div>

        <a href="{{ route('newprofile') }}" class="btn-edit">แก้ไขข้อมูลส่วนตัว</a>
        <a href="{{ route('documents.index') }}" class="btn-manage">จัดการเอกสาร</a>
    </div>

    <div class="main-content">

        <div class="grid-top">
            <section class="card">
                <h2 class="card-title">ตำแหน่งงานที่สมัคร</h2>
                <ul class="approval-list">
                    @if(isset($application) && $application)
                    <li class="approval-done">
                        <div>
                            <div><strong>ตำแหน่ง:</strong> {{ $application->internshipPosition->position_name ?? '-' }}</div>
                            <div><strong>บริษัท:</strong>
                                {{ $application->internshipPosition->company->company_name ?? '-' }}
                            </div>
                        </div>
                    </li>
                    @else
                    <li class="text-muted">ยังไม่มีข้อมูลการสมัครงาน</li>
                    @endif
                </ul>
            </section>

            <section class="card">
                <div class="card-header">
                    <h3 class="card-title">นัดหมายสัมภาษณ์</h3>
                    <a href="#" class="link-more">ดูทั้งหมด</a>
                </div>

                <div class="interview-list">
                    @if(isset($application) && $application->interview)
                    <div class="interview-item">
                        <div class="interview-time">
                            <span class="time-num">
                                {{ \Carbon\Carbon::parse($application->interview->interview_start_time)->format('H:i') }}
                            </span>
                            <span class="time-date">
                                {{ \Carbon\Carbon::parse($application->interview->interview_date)->isToday() ? 'วันนี้' : \Carbon\Carbon::parse($application->interview->interview_date)->format('d/m/Y') }}
                            </span>
                        </div>
                        <div class="interview-info">
                            <strong>{{ $application->internshipPosition?->company?->company_name ?? 'บริษัท' }}</strong>
                            <p>ตำแหน่ง: {{ $application->internshipPosition?->position_name ?? '-' }}</p>
                        </div>
                        <span class="badge-status">
                            {{ strtolower($application->interview->interview_mode) == 'onsite' ? 'สัมภาษณ์ On-site' : 'สัมภาษณ์ Online' }}
                        </span>
                    </div>
                    @else
                    <p class="text-muted" style="padding: 15px 0;">ยังไม่มีนัดหมายสัมภาษณ์</p>
                    @endif
                </div>
            </section>
        </div>

        <section class="card">
            <h2 class="card-title card-title-left">ตำแหน่งที่ผ่านการสัมภาษณ์</h2>

            @if(isset($passedApplications) && $passedApplications->count() > 0)
            <div class="passed-applications-list" style="display: flex; flex-direction: column; gap: 16px; margin-top: 16px;">
                @foreach($passedApplications as $app)
                <div class="passed-item-card" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">

                    <div class="item-info">
                        <h3 class="position-title" style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 6px;">
                            {{ $app->internshipPosition?->position_name ?? 'ไม่ระบุตำแหน่ง' }}
                        </h3>
                        <p class="company-name" style="font-size: 14px; color: #64748b; margin-bottom: 8px;">
                            <strong>บริษัท:</strong> {{ $app->internshipPosition?->company?->company_name ?? 'ไม่ระบุบริษัท' }}
                        </p>

                        <div class="status-tag">
                            @if($app->application_status == 'interning')
                            <span class="badge" style="background-color: #d1fae5; color: #047857; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                กำลังฝึกงานอยู่ที่นี่
                            </span>
                            @elseif($app->application_status == 'declined')
                            <span class="badge" style="background-color: #fee2e2; color: #b91c1c; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                สิทธิ์ถูกปฏิเสธแล้ว
                            </span>
                            @else
                            <span class="badge" style="background-color: #dcfce7; color: #15803d; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                ผ่านการสัมภาษณ์ (รอการยืนยัน)
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="item-actions" style="display: flex; gap: 10px; align-items: center;">
                        @if($app->application_status != 'interning' && $app->application_status != 'declined')
                        <form action="{{ route('student.application.accept', $app->id) }}" method="POST" onsubmit="return confirm('คุณต้องการยืนยันเข้ารับการฝึกงานในตำแหน่งนี้ใช่หรือไม่?');">
                            @csrf
                            <input type="hidden" name="action" value="accept">
                            <button type="submit" class="btn-accept" style="background-color: #10b981; color: white; border: none; padding: 10px 18px; border-radius: 8px; font-weight: 500; cursor: pointer; transition: 0.2s;">
                                เข้ารับการฝึกงาน
                            </button>
                        </form>

                        <form action="{{ route('student.application.accept', $app->id) }}" method="POST" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะปฏิเสธสิทธิ์การฝึกงานในตำแหน่งนี้?');">
                            @csrf
                            <input type="hidden" name="action" value="decline">
                            <button type="submit" class="btn-decline" style="background-color: #f1f5f9; color: #64748b; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 8px; font-weight: 500; cursor: pointer; transition: 0.2s;">
                                ไม่เข้ารับการฝึกงาน
                            </button>
                        </form>
                        @else
                        <span style="font-size: 14px; color: #94a3b8;">ดำเนินการเรียบร้อยแล้ว</span>
                        @endif
                    </div>

                </div>
                @endforeach
            </div>
            @else
            <p class="empty-evaluation" style="color: #64748b; margin-top: 12px;">ยังไม่มีข้อมูลการผ่านการสัมภาษณ์ในขณะนี้</p>
            @endif
        </section>

        <section class="card">
            <h2 class="card-title card-title-left">ผลการประเมินการฝึกงาน</h2>

            @if(isset($evaluation) && $evaluation)
            <div class="evaluation-result-box">
                <div class="score-summary">
                    <div class="type-info">
                        <span class="type-value">ตำแหน่งงาน / บริษัท:</span>
                        <div class="comment-text" style="font-weight: 600; color: #0f172a; margin-top: 4px;">
                            {{ $completedApplication?->internshipPosition?->position_name ?? '-' }}
                            <span style="font-weight: 400; color: #64748b;">
                                ({{ $completedApplication?->internshipPosition?->company?->company_name ?? '-' }})
                            </span>
                        </div>
                    </div>

                    <div class="score-info">
                        <span class="label-title">คะแนนรวมสุทธิ:</span>
                        <div class="score-num">
                            {{ number_format($evaluation->evaluation_score, 0) }}
                            <span class="score-max">/ 100 คะแนน</span>
                        </div>
                    </div>
                </div>

                <div class="comment-box" style="margin-top: 16px;">
                    <strong class="comment-title">ข้อเสนอแนะเพิ่มเติม:</strong>
                    <p class="comment-text" style="margin-top: 6px; color: #334155;">
                        {{ $evaluation->evaluation_feedback ?? 'ไม่มีข้อเสนอแนะเพิ่มเติม' }}
                    </p>
                </div>
            </div>
            @else
            <p class="empty-evaluation" style="color: #64748b; padding: 12px 0;">ยังไม่มีข้อมูลการประเมินผลในขณะนี้</p>
            @endif
        </section>

    </div>

</div>
@endsection