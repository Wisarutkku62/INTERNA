@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/manageinterview.css') }}">
@endpush

@section('content')
<div class="manage-interview-container">

    <div class="card-box">
        <div class="candidate-profile-section">
            <div class="avatar-box">
                <div class="avatar-placeholder">
                    <svg width="70" height="70" viewBox="0 0 24 24" fill="#cbd5e1">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            </div>

            <div class="candidate-info">
                <h2 class="candidate-name">{{$applicants?->student?->student_fname}} {{$applicants?->student?->student_lname}}</h2>
                
                <div class="info-row">
                    <span class="info-label">ตำแหน่ง :</span>
                    <span class="info-value-bold">{{$applicants?->internshipPosition?->position_name}}</span>
                    <span class="badge-type">ฝึกงาน</span>
                </div>

                <div class="info-row">
                    <span class="info-label">วันที่ :</span>
                    <span class="info-value">{{$applicants?->interview?->interview_date}}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">เวลา :</span>
                    <span class="info-value">{{$applicants?->interview?->interview_start_time}}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">รูปแบบสัมภาษณ์ :</span>
                    <span class="info-value">{{$applicants?->interview?->interview_mode}}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">รายละเอียด :</span>
                    <span class="info-value">{{$applicants?->interview?->email_details}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card-box">
        <form class="evaluation-form" id="form" action="{{ route('company.interview_evaluation_update', $applicants->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3 class="form-title">แบบฟอร์มการประเมินผู้สมัคร</h3>

            <div class="form-group">
                <label class="form-label">สถานะผู้สมัคร</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="interview_result" value="passed" {{ (old('interview_result', $applicants?->interview?->interview_result) == 'passed') ? 'checked' : '' }}>
                        <span>ผ่านสัมภาษณ์</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="interview_result" value="failed" {{ (old('interview_result', $applicants?->interview?->interview_result) == 'failed') ? 'checked' : '' }}>
                        <span>ไม่ผ่านสัมภาษณ์</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">ผลประเมินผู้สมัคร</label>
                <textarea name="email_details" class="form-textarea" rows="5" placeholder="สรุปการสัมภาษณ์ เกี่ยวกับผู้สมัคร"></textarea>
            </div>

            <div class="form-actions">

                <button type="submit" class="btn-submit">บันทึกผลการประเมิน</button>
            </div>
        </form>
    </div>
</div>
@endsection