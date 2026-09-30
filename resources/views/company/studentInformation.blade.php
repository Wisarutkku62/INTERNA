@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/studentInformation.css') }}?v={{ filemtime(public_path('css/studentInformation.css')) }}">
@endpush

@section('content')
<div class="profile-page-wrapper">


    <div class="top-bar">
        <!-- <a href="{{ url()->previous() }}" class="btn-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>ย้อนกลับ</span>
        </a> -->

        <a href="{{ url()->previous() }}" class="btn-back">&larr; ย้อนกลับ</a>
    </div>

    <div class="profile-container">


        <div class="profile-header">
            <h1 id="title">ข้อมูลส่วนตัว</h1>
            <div class="picprofile">
                <img id="avatar-preview" src="{{ $user->profile_img ?? '/img/profile.png' }}" alt="Profile Picture" class="profiles">
            </div>
        </div>


        <div class="profile-grid">

            <div class="profile-field half">
                <span class="field-label">ชื่อ</span>
                <p class="field-text">{{ $user->fname ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">นามสกุล</span>
                <p class="field-text">{{ $user->lname ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">เพศ</span>
                <p class="field-text">{{ $user->gender ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">วันเกิด</span>
                <p class="field-text">
                    @if(!empty($user->birth_day) || !empty($user->birth_month) || !empty($user->birth_year))
                    {{ $user->birth_day }} / {{ $user->birth_month }} / {{ $user->birth_year }}
                    @else
                    -
                    @endif
                </p>
            </div>

            <div class="profile-field half">
                <span class="field-label">สัญชาติ</span>
                <p class="field-text">{{ $user->nationality ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">ศาสนา</span>
                <p class="field-text">{{ $user->religion ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">ระดับการศึกษา</span>
                <p class="field-text">{{ $user->education ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">โทรศัพท์</span>
                <p class="field-text">{{ $user->phone ?? '-' }}</p>
            </div>

            <div class="profile-field full">
                <span class="field-label">อีเมล</span>
                <p class="field-text">{{ $user->email ?? '-' }}</p>
            </div>

            <div class="profile-field full">
                <span class="field-label">ที่อยู่</span>
                <p class="field-text">{{ $user->address ?? '-' }}</p>
            </div>

            <div class="profile-field full bio-field">
                <span class="field-label">ข้อมูลส่วนตัวเพิ่มเติม</span>
                <p class="field-text bio-text">{{ $user->bio ?? '-' }}</p>
            </div>

        </div>

    </div>



    @if($interview)
    <div class="interview-card">
        <div class="profile-header">
            <h1 id="title">ข้อมูลนัดสัมภาษณ์</h1>
        </div>

        <h2 class="candidate-name">
            {{ $application->student->student_fname ?? '' }} {{ $application->student->student_lname ?? '' }}
        </h2>

        <div class="interview-details">
            <div class="interview-row">
                <span class="detail-label">ตำแหน่ง:</span>
                <span class="detail-value bold">{{ $application->internshipPosition->position_title ?? '-' }}</span>
            </div>

            <div class="interview-row">
                <span class="detail-label">วันที่:</span>
                <span class="detail-value bold">{{ $interview->interview_date }}</span>
            </div>

            <div class="interview-row">
                <span class="detail-label">เวลา:</span>
                <span class="detail-value bold">{{ $interview->interview_start_time }}</span>
            </div>

            <div class="interview-row">
                <span class="detail-label">รูปแบบสัมภาษณ์:</span>
                <span class="detail-value bold">{{ $interview->interview_mode == 'onsite' ? 'On-site' : 'Online' }}</span>
            </div>

            <div class="interview-row">
                <span class="detail-label">สถานที่/รายละเอียด:</span>
                <span class="detail-value bold">{{ $interview->interview_location ?? '-' }}</span>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection