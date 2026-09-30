@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/announcementedit.css') }}">
@endpush

@section('content')
<div class="form-card">
    <div class="form-header">
        <a href="{{route('company.overview')}}" class="back-btn" title="ย้อนกลับ">&larr;</a>
        <h2>แก้ไขประกาศงาน</h2>
    </div>
    <form action="{{route('company.announcement.update',$internshippositions_edit->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="position_name">ชื่อตำแหน่งงาน</label>
            <input type="text" id="position_name" name="position_name" placeholder="เช่น Backend Developer" value="{{ $internshippositions_edit->position_name ?? '' }}" >
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_category">แผนก/ฝ่าย </label>
                <select id="position_category" name="position_category" required>
                    <option value="Technology & IT" {{ ( $internshippositions_edit->position_category ?? '') == 'Technology & IT' ? 'selected' : '' }}>Technology & IT</option>
                    <option value="Design & Creative" {{ ( $internshippositions_edit->position_category ?? '') == 'Design & Creative' ? 'selected' : '' }}>Design & Creative</option>
                    <option value="Marketing" {{ ( $internshippositions_edit->position_category ?? '') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="HR & Admin" {{ ( $internshippositions_edit->position_category ?? '') == 'HR & Admin' ? 'selected' : '' }}>HR & Admin</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="position_capacity">จำนวนรับ (คน)</label>
                <input type="number" id="position_capacity" name="position_capacity" min="1" placeholder="เช่น 2" value="{{ $internshippositions_edit->position_capacity ?? '' }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_worktype">รูปแบบการทำงาน</label>
                <select id="position_worktype" name="position_worktype">
                    <option value="Hybrid" {{ ( $internshippositions_edit->position_worktype ?? '') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    <option value="On-site" {{ ( $internshippositions_edit->position_worktype ?? '') == 'On-site' ? 'selected' : '' }}>On-site</option>
                    <option value="Online" {{ ( $internshippositions_edit->position_worktype ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="position_interview_type">รูปแบบสัมภาษณ์</label>
                <select id="position_interview_type" name="position_interview_type">
                    <option value="On-site" {{ ( $internshippositions_edit->position_interview_type ?? '') == 'On-site' ? 'selected' : '' }}>On-site</option>
                    <option value="Online" {{ ( $internshippositions_edit->position_interview_type ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                </select>
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_date">วันเริ่มทำงาน</label>
                <select id="position_start_date" name="position_start_date" required>
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="Monday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Monday' ? 'selected' : '' }}>จันทร์</option>
                    <option value="Tuesday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Tuesday' ? 'selected' : '' }}>อังคาร</option>
                    <option value="Wednesday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Wednesday' ? 'selected' : '' }}>พุธ</option>
                    <option value="Thursday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Thursday' ? 'selected' : '' }}>พฤหัสบดี</option>
                    <option value="Friday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Friday' ? 'selected' : '' }}>ศุกร์</option>
                    <option value="Saturday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Saturday' ? 'selected' : '' }}>เสาร์</option>
                    <option value="Sunday" {{ ( $internshippositions_edit->position_start_date ?? '') == 'Sunday' ? 'selected' : '' }}>อาทิตย์</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="position_end_date">วันสิ้นสุดทำงาน</label>
                <select id="position_end_date" name="position_end_date" required>
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="Monday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Monday' ? 'selected' : '' }}>จันทร์</option>
                    <option value="Tuesday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Tuesday' ? 'selected' : '' }}>อังคาร</option>
                    <option value="Wednesday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Wednesday' ? 'selected' : '' }}>พุธ</option>
                    <option value="Thursday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Thursday' ? 'selected' : '' }}>พฤหัสบดี</option>
                    <option value="Friday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Friday' ? 'selected' : '' }}>ศุกร์</option>
                    <option value="Saturday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Saturday' ? 'selected' : '' }}>เสาร์</option>
                    <option value="Sunday" {{ ( $internshippositions_edit->position_end_date ?? '') == 'Sunday' ? 'selected' : '' }}>อาทิตย์</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_time">เวลาเริ่มทำงาน</label>
                <input type="time" id="position_start_time" name="position_start_time" value="{{ $internshippositions_edit->position_start_time ?? '' }}">
            </div>
            <div class="form-group col">
                <label for="position_end_time">เวลาเลิกทำงาน</label>
                <input type="time" id="position_end_time" name="position_end_time" value="17:30" value="{{ $internshippositions_edit->position_end_time ?? '' }}">
            </div>
        </div>
        <div class="form-group">
            <label for="position_allowance">อัตราเงินเดือน </label>
            <input type="text" id="position_allowance" name="position_allowance" placeholder="เช่น 4-5 บาท/เดือน" value="{{ $internshippositions_edit->position_allowance ?? '' }}">
        </div>
        <div class="form-group">
            <label for="position_qualification">คุณสมบัติผู้สมัคร</label>
            <textarea id="position_qualification" name="position_qualification" rows="3" placeholder="ระบุคุณสมบัติเบื้องต้น...">"{{ $internshippositions_edit->position_qualification ?? '' }}"</textarea>
        </div>
        <div class="form-group">
            <label for="position_description">รายละเอียดงาน</label>
            <textarea id="position_description" name="position_description" rows="4" placeholder="ระบุรายละเอียดหน้าที่รับผิดชอบ...">{{ $internshippositions_edit->position_description ?? '' }}"</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-submit">บันทึกประกาศ</button>
        </div>
    </form>
</div>
@endsection