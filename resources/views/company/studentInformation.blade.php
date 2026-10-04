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
                <p class="field-text">{{ $applicants_profile?->student?->student_fname ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">นามสกุล</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_lname ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">เพศ</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_gender ?? '-' }}</p>
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
                <p class="field-text">{{ $applicants_profile?->student?->student_nationality ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">ศาสนา</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_religion ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">ระดับการศึกษา</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_degree ?? '-' }}</p>
            </div>

            <div class="profile-field half">
                <span class="field-label">โทรศัพท์</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_phone ?? '-' }}</p>
            </div>

            <div class="profile-field full">
                <span class="field-label">อีเมล</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_email ?? '-' }}</p>
            </div>

            <div class="profile-field full">
                <span class="field-label">ที่อยู่</span>
                <p class="field-text">{{ $applicants_profile?->student?->student_address ?? '-' }}</p>
            </div>

            <div class="profile-field full bio-field">
                <span class="field-label">ข้อมูลส่วนตัวเพิ่มเติม</span>
                <p class="field-text bio-text">{{ $applicants_profile?->student?->student_bio ?? '-' }}</p>
            </div>

        </div>

    </div>


    <div class="interview-card">
        <div class="profile-header">
            <h1 id="title">ข้อมูลตำแหน่งงาน</h1>
        </div>

        <h2 class="candidate-name">
            {{ $applicants_profile?->internshipPosition?->position_name ?? '-' }}
        </h2>

            <div class="interview-row">
                <span class="detail-label">รายละเอียด:</span>
                <span class="detail-value bold">{{ $applicants_profile?->internshipPosition?->position_description ?? '-' }}</span>
            </div>

            <div class="interview-row">
                <span class="detail-label">คุณสมบัติ:</span>
                <span class="detail-value bold">{{ $applicants_profile?->internshipPosition?->position_qualification ?? '-' }}</span>
            </div>

         
        <div class="profile-actions">
            <a href="{{ route('company.viewresume', $applicants_profile->id) }}" class="resume">ดูเอกสาร</a>
            <a href="{{ route('interviews.create',$applicants_profile->id ) }}" class="interview">สร้างนัดสัมภาษณ์</a>
        </div>
        

        </div>
    </div>
</div>
@endsection