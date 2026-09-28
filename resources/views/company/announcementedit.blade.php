@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/announcementedit.css') }}">
@endpush

@section('content')
<div class="form-card">
    <div class="form-header">
        <a href="{{route('company.announcement.all')}}" class="back-btn" title="ย้อนกลับ">&larr;</a>
        <h2>แก้ไขประกาศงาน</h2>
    </div>
    <form action="{{route('company.announcement.create')}}" method="POST">
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
                <label for="capacity">จำนวนรับ (คน)</label>
                <input type="number" id="capacity" name="capacity" min="1" placeholder="เช่น 2" required>
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
        <div class="form-row">
            <div class="form-group col">
                <label for="start_day">วันเริ่มทำงาน</label>
                <select id="start_day" name="start_day" required>
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="จันทร์">จันทร์</option>
                    <option value="อังคาร">อังคาร</option>
                    <option value="พุธ">พุธ</option>
                    <option value="พฤหัสบดี">พฤหัสบดี</option>
                    <option value="ศุกร์">ศุกร์</option>
                    <option value="เสาร์">เสาร์</option>
                    <option value="อาทิตย์">อาทิตย์</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="end_day">วันสิ้นสุดทำงาน</label>
                <select id="end_day" name="end_day" required>
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="จันทร์">จันทร์</option>
                    <option value="อังคาร">อังคาร</option>
                    <option value="พุธ">พุธ</option>
                    <option value="พฤหัสบดี">พฤหัสบดี</option>
                    <option value="ศุกร์">ศุกร์</option>
                    <option value="เสาร์">เสาร์</option>
                    <option value="อาทิตย์">อาทิตย์</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="work_start_time">เวลาเริ่มทำงาน</label>
                <input type="time" id="work_start_time" name="work_start_time" value="08:30" required>
            </div>
            <div class="form-group col">
                <label for="work_end_time">เวลาเลิกทำงาน</label>
                <input type="time" id="work_end_time" name="work_end_time" value="17:30" required>
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
            <button type="submit" class="btn btn-submit">บันทึกประกาศ</button>
        </div>
    </form>
</div>
@endsection