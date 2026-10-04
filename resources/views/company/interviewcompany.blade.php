@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interviewcom.css') }}">
@endpush

@section('content')
<div class="interview-card">

    <div class="content-header">
        <a href="{{ route('company.overview') }}" class="back-link">&larr;</a>
        <h2 class="page-title">สร้างนัดสัมภาษณ์งาน</h2>
    </div>

    @if(session('success'))
        <div style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 8px; margin-bottom: 20px;">
             {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 8px; margin-bottom: 20px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="appointment-form" action="{{ route('interviews.store', $applicants->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">ผู้สมัคร</label>
            <div class="applicant-card">
                <div class="applicant-avatar">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="#a0aec0">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="applicant-details">
                    <div class="applicant-name-row">
                        <h2 class="applicant-name">
                            {{ $applicants->student->student_fname ?? '-' }} {{ $applicants->student->student_lname ?? '' }}
                        </h2>
                        <span class="badge-status">นักศึกษาฝึกงาน</span>
                    </div>
                    <p class="applicant-contact">โทรศัพท์ : {{ $applicants?->student?->student_phone ?? '-' }}</p>
                    <p class="applicant-contact">อีเมล : {{ $applicants?->student?->student_email ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">ตำแหน่งงาน</label>
            <p class="job-title-text">
                {{ $applicants?->internshipPosition?->position_name ?? 'ไม่ระบุตำแหน่ง' }}
            </p>
        </div>

        <div class="form-group">
            <label class="form-label">วันที่สัมภาษณ์</label>
            <div class="select-group">
                <select name="day" class="form-select" required>
                    @for($d = 1; $d <= 31; $d++)
                        <option value="{{ sprintf('%02d', $d) }}" {{ date('d') == $d ? 'selected' : '' }}>
                            {{ $d }}
                        </option>
                    @endfor
                </select>
                <select name="month" class="form-select" required>
                    @php
                        $months = [1=>'มกราคม', 2=>'กุมภาพันธ์', 3=>'มีนาคม', 4=>'เมษายน', 5=>'พฤษภาคม', 6=>'มิถุนายน', 7=>'กรกฎาคม', 8=>'สิงหาคม', 9=>'กันยายน', 10=>'ตุลาคม', 11=>'พฤศจิกายน', 12=>'ธันวาคม'];
                    @endphp
                    @foreach($months as $k => $m)
                        <option value="{{ sprintf('%02d', $k) }}" {{ date('n') == $k ? 'selected' : '' }}>
                            {{ $m }}
                        </option>
                    @endforeach
                </select>
                <select name="year" class="form-select" required>
                    <option value="2026" selected>2569</option>
                    <option value="2027">2570</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">เวลาเริ่มสัมภาษณ์</label>
            <div class="select-group time-group">
                <select name="hour" class="form-select" required>
                    <option value="">ชั่วโมง</option>
                    @for($h = 8; $h <= 18; $h++)
                        <option value="{{ sprintf('%02d', $h) }}">{{ sprintf('%02d', $h) }}</option>
                    @endfor
                </select>
                <span class="colon">:</span>
                <select name="minute" class="form-select" required>
                    <option value="">นาที</option>
                    <option value="00">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">รูปแบบการสัมภาษณ์</label>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="interview_mode" value="onsite" checked>
                    <span>สัมภาษณ์ On-site</span>
                </label>
                
                <label class="radio-option">
                    <input type="radio" name="interview_mode" value="online">
                    <span>สัมภาษณ์ Online</span>
                </label>
            </div>
            <input type="text" name="interview_location" class="form-input full-width mt-2" 
                   placeholder="ที่อยู่สถานที่สัมภาษณ์งาน หรือ ลิงก์ห้องประชุมออนไลน์">
        </div>

        <div class="form-group">
            <label class="form-label">เนื้อหาเพิ่มเติมในอีเมล</label>
            <textarea name="email_details" class="form-textarea full-width" rows="4" 
                      placeholder="เช่น รายละเอียดที่ผู้สมัครควรทราบ เพื่อทำการเตรียมตัวในวันสัมภาษณ์"></textarea>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-secondary" onclick="history.back()">ยกเลิก</button>
            <button type="submit" class="btn btn-primary">สร้างนัดสัมภาษณ์งาน</button>
        </div>
    </form>
</div>
@endsection