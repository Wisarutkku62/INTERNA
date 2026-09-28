@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interviewcom.css') }}">
@endpush

@section('content')
<div class="interview-card">
    <div class="content-header">
        <a href="#" class="back-link">&larr;</a>
        <h2 class="page-title">สร้างนัดสัมภาษณ์งาน</h2>
    </div>
    <form class="appointment-form">
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
                        <h2 class="applicant-name">มูฮัมหมัด อัดดาก</h2>
                        <span class="badge-status">นักศึกษาฝึกงาน</span>
                    </div>
                    <p class="applicant-contact">โทรศัพท์ : 0872222222</p>
                    <p class="applicant-contact">อีเมล : muhammad@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">ตำแหน่งงาน</label>
            <p class="job-title-text">Software Engineer</p>
        </div>

        <div class="form-group">
            <label class="form-label">วันที่สัมภาษณ์</label>
            <div class="select-group">
                <select name="day" class="form-select">
                    <option value="24" selected>27</option>
                </select>
                <select name="month" class="form-select">
                    <option value="กันยายน" selected>กันยายน</option>
                </select>
                <select name="year" class="form-select">
                    <option value="2569" selected>2569</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">เวลาเริ่มสัมภาษณ์</label>
            <div class="select-group time-group">
                <select name="hour" class="form-select">
                    <option value="">ชั่วโมง</option>
                </select>
                <span class="colon">:</span>
                <select name="minute" class="form-select">
                    <option value="">นาที</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">รูปแบบการสัมภาษณ์</label>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="interview_type" value="onsite" checked>
                    <span>นัดพบ</span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="interview_type" value="online">
                    <span>สัมภาษณ์ออนไลน์</span>
                </label>
            </div>
            <input type="text" name="location_detail" class="form-input full-width mt-2" 
                   placeholder="ที่อยู่สถานที่สัมภาษณ์งาน">
        </div>

        <div class="form-group">
            <label class="form-label">เนื้อหาเพิ่มเติมในอีเมล</label>
            <textarea name="email_content" class="form-textarea full-width" rows="4" 
                      placeholder="เช่น รายละเอียดที่ผู้สมัครควรทราบ เพื่อทำการเตรียมตัวในวันสัมภาษณ์"></textarea>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-secondary">ยกเลิก</button>
            <button type="button" class="btn btn-primary">สร้างนัดสัมภาษณ์งาน</button>
        </div>
    </form>
</div>
</body>
</html>
@endsection