@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/announcement.css') }}">
@endpush

@section('content')
<div class="form-card">
    <div class="form-header">
        <a href="#" class="back-btn" title="ย้อนกลับ">&larr;</a>
        <h2>สร้างประกาศงานใหม่</h2>
    </div>
    <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อตำแหน่งงาน</label>
            <input type="text" id="title" name="title" placeholder="เช่น Backend Developer" required>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="department">แผนก/ฝ่าย </label>
                <select id="department" name="department" required>
                    <option value="Technology & IT">Technology & IT</option>
                    <option value="Design & Creative">Design & Creative</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR & Admin">HR & Admin</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="job_type">ประเภทงาน </label>
                <select id="job_type" name="job_type" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="work_type">รูปแบบการทำงาน</label>
                <select id="work_type" name="work_type">
                    <option value="Hybrid">Hybrid</option>
                    <option value="On-site">On-site</option>
                    <option value="Remote">Remote</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="location">สถานที่ทำงาน</label>
                <input type="text" id="location" name="location" value="น้ำพอง">
            </div>
        </div>
        <div class="form-group">
            <label for="salary">อัตราเงินเดือน </label>
            <input type="text" id="salary" name="salary" placeholder="เช่น 4-5 บาท/เดือน" required>
        </div>
        <div class="form-group">
            <label for="qualifications">คุณสมบัติผู้สมัคร</label>
            <textarea id="qualifications" name="qualifications" rows="3" placeholder="ระบุคุณสมบัติเบื้องต้น..."></textarea>
        </div>
        <div class="form-group">
            <label for="description">รายละเอียดงาน</label>
            <textarea id="description" name="description" rows="4" placeholder="ระบุรายละเอียดหน้าที่รับผิดชอบ..."></textarea>
        </div>
        <div class="form-actions">
            <button type="button" class="btn btn-cancel">ยกเลิก</button>
            <button type="submit" class="btn btn-submit">บันทึกประกาศ</button>
        </div>
    </form>
</div>
@endsection