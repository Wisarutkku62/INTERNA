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
                <h2 class="candidate-name">ปัญญวิชญ์ บุญเสงี่ยม</h2>
                
                <div class="info-row">
                    <span class="info-label">ตำแหน่ง :</span>
                    <span class="info-value-bold">ภูสำเภา คาเฟ่</span>
                    <span class="badge-type">ฝึกงาน</span>
                </div>

                <div class="info-row">
                    <span class="info-label">วันที่ :</span>
                    <span class="info-value">28 ก.ย. 2569</span>
                </div>

                <div class="info-row">
                    <span class="info-label">เวลา :</span>
                    <span class="info-value">23:30 น.</span>
                </div>

                <div class="info-row">
                    <span class="info-label">รูปแบบสัมภาษณ์ :</span>
                    <span class="info-value">Online</span>
                </div>

                <div class="info-row">
                    <span class="info-label">รายละเอียด :</span>
                    <span class="info-value">เกย์ตูดโด่ง ปากมาสด้า</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card-box">
        <form class="evaluation-form">
            <h3 class="form-title">แบบฟอร์มการประเมินผู้สมัคร</h3>

            <div class="form-group">
                <label class="form-label">สถานะผู้สมัคร</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="attendance_status" value="attended">
                        <span>ผ่านสัมภาษณ์</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="attendance_status" value="absent">
                        <span>ไม่ผ่านสัมภาษณ์</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">ผลประเมินผู้สมัคร</label>
                <textarea name="evaluation_comment" class="form-textarea" rows="5" placeholder="สรุปการสัมภาษณ์ เกี่ยวกับผู้สมัคร"></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">ลงชื่อผู้ประเมิน</label>
                <input type="text" name="evaluator_name" class="form-input" placeholder="ระบุชื่อผู้ประเมิน">
            </div>
            <div class="form-actions">
                <button type="button" class="btn-submit">บันทึกผลการประเมิน</button>
            </div>
        </form>
    </div>
</div>
@endsection