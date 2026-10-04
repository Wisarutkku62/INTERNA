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

        <div class="welcome-title">ยินดีต้อนรับ</div>
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
            <h2 class="card-title card-title-left">ความคิดเห็นและคะแนนประเมินผล</h2>

            @if(isset($evaluation) && $evaluation)
            <div class="evaluation-result-box">
                <div class="score-summary">
                    <div class="type-info">
                        <span class="type-value">ประเภทการประเมิน:</span>
                        <div class="comment-text">{{ $evaluation->evaluation_type }}</div>
                    </div>
                    <div class="score-info">
                        <span class="label-title">คะแนนรวม:</span>
                        <div class="score-num">
                            {{ number_format($evaluation->evaluation_score, 0) }}
                            <span class="score-max">/ 100 คะแนน</span>
                        </div>
                    </div>
                </div>

                <div class="comment-box">
                    <strong class="comment-title">ข้อเสนอแนะเพิ่มเติม:</strong>
                    <p class="comment-text">
                        {{ $evaluation->evaluation_feedback ?? 'ไม่มีข้อเสนอแนะเพิ่มเติม' }}
                    </p>
                </div>
            </div>
            @else
            <p class="empty-evaluation">ยังไม่มีข้อมูลการประเมินผลในขณะนี้</p>
            @endif
        </section>

    </div>

</div>
@endsection