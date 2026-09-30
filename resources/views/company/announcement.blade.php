@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/announcement.css') }}">
@endpush

@section('content')
<div class="form-card">
    <div class="form-header">
        <a href="{{route('company.overview')}}" class="back-btn" title="ย้อนกลับ">&larr;</a>
        <h2>สร้างประกาศงานใหม่</h2>
    </div>
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('company.announcement.create')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="position_name">ชื่อตำแหน่งงาน</label>
            <input type="text" id="position_name" name="position_name" placeholder="เช่น Backend Developer" required>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_category">แผนก/ฝ่าย </label>
                <select id="position_category" name="position_category" required>
                    <option value="Technology & IT">Technology & IT</option>
                    <option value="Design & Creative">Design & Creative</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR & Admin">HR & Admin</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="position_capacity">จำนวนรับ (คน)</label>
                <input type="number" id="position_capacity" name="position_capacity" min="1" placeholder="เช่น 2" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_worktype">รูปแบบการทำงาน</label>
                <select id="position_worktype" name="position_worktype">
                    <option value="Hybrid">Hybrid</option>
                    <option value="On-site">On-site</option>
                    <option value="Online">Online</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="position_interview_type">รูปแบบสัมภาษณ์</label>
                <select id="position_interview_type" name="position_interview_type">
                    <option value="On-site">On-site</option>
                    <option value="Online">Online</option>
                </select>
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_date">วันเริ่มทำงาน</label>
                <select id="position_start_date" name="position_start_date" required>
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="Monday">จันทร์</option>
                    <option value="Tuesday">อังคาร</option>
                    <option value="Wednesday">พุธ</option>
                    <option value="Thursday">พฤหัสบดี</option>
                    <option value="Friday">ศุกร์</option>
                    <option value="Saturday">เสาร์</option>
                    <option value="Sunday">อาทิตย์</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="position_end_date">วันสิ้นสุดทำงาน</label>
                <select id="position_end_date" name="position_end_date" required>
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="Monday">จันทร์</option>
                    <option value="Tuesday">อังคาร</option>
                    <option value="Wednesday">พุธ</option>
                    <option value="Thursday">พฤหัสบดี</option>
                    <option value="Friday">ศุกร์</option>
                    <option value="Saturday">เสาร์</option>
                    <option value="Sunday">อาทิตย์</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_time">เวลาเริ่มทำงาน</label>
                <input type="time" id="position_start_time" name="position_start_time" value="08:30" required>
            </div>
            <div class="form-group col">
                <label for="position_end_time">เวลาเลิกทำงาน</label>
                <input type="time" id="position_end_time" name="position_end_time" value="17:30" required>
            </div>
        </div>
        <div class="form-group">
            <label for="position_allowance">อัตราเงินเดือน </label>
            <input type="text" id="position_allowance" name="position_allowance" placeholder="เช่น 4-5 บาท/เดือน" required>
        </div>
        <div class="form-group">
            <label for="position_qualification">คุณสมบัติผู้สมัคร</label>
            <textarea id="position_qualification" name="position_qualification" rows="3" placeholder="ระบุคุณสมบัติเบื้องต้น..."></textarea>
        </div>
        <div class="form-group">
            <label for="position_description">รายละเอียดงาน</label>
            <textarea id="position_description" name="position_description" rows="4" placeholder="ระบุรายละเอียดหน้าที่รับผิดชอบ..."></textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-submit">บันทึกประกาศ</button>
        </div>
    </form>
</div>
@endsection