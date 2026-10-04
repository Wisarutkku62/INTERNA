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
    <form action="{{route('company.announcement.update',$internshippositions_edit->id)}}" method="POST" id="form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="position_name">ชื่อตำแหน่งงาน</label>
            <input type="text" id="position_name" name="position_name" placeholder="เช่น Backend Developer" value="{{ $internshippositions_edit->position_name ?? '' }}" >
            <span class="position_name-validated validated" id="position_name-validated">

            </span>
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
                <span class="position_category-validated validated" id="position_category-validated">
                    
                </span>
            </div>
            <div class="form-group col">
                <label for="position_capacity">จำนวนรับ (คน)</label>
                <input type="number" id="position_capacity" name="position_capacity" min="1" placeholder="เช่น 2" value="{{ $internshippositions_edit->position_capacity ?? '' }}">
                <span class="position_capacity-validated validated" id="position_capacity-validated">

                </span>
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
                <span class="position_worktype-validated validated" id="position_worktype-validated">

                </span>
            </div>
            <div class="form-group col">
                <label for="position_interview_type">รูปแบบสัมภาษณ์</label>
                <select id="position_interview_type" name="position_interview_type">
                    <option value="On-site" {{ ( $internshippositions_edit->position_interview_type ?? '') == 'On-site' ? 'selected' : '' }}>On-site</option>
                    <option value="Online" {{ ( $internshippositions_edit->position_interview_type ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                </select>
                <span class="position_interview_type-validated validated" id="position_interview_type-validated">

                </span>
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
                <span class="position_start_day-validated validated" id="position_start_day-validated">

                </span>
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
                <span class="position_end_day-validated validated" id="position_end_day-validated">
                    
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_time">เวลาเริ่มทำงาน</label>
                <input type="time" id="position_start_time" name="position_start_time" value="{{ $internshippositions_edit->position_start_time ?? '' }}">
                <span class="position_start_time-validated validated" id="position_start_time-validated">
                    
                </span>
            </div>
            <div class="form-group col">
                <label for="position_end_time">เวลาเลิกทำงาน</label>
                <input type="time" id="position_end_time" name="position_end_time" value="{{ $internshippositions_edit->position_end_time ?? '' }}">
                <span class="position_end_time-validated validated" id="position_end_time-validated">
                    
                </span>
            </div>
        </div>
        <div class="form-group">
            <label for="position_allowance">อัตราเงินเดือน </label>
            <input type="text" id="position_allowance" name="position_allowance" placeholder="เช่น 4-5 บาท/เดือน" value="{{ $internshippositions_edit->position_allowance ?? '' }}">
            <span class="position_allowance-validated validated" id="position_allowance-validated">
                    
            </span>
        </div>
        <div class="form-group">
            <label for="position_qualification">คุณสมบัติผู้สมัคร</label>
            <textarea id="position_qualification" name="position_qualification" rows="3" placeholder="ระบุคุณสมบัติเบื้องต้น...">{{ $internshippositions_edit->position_qualification ?? '' }}</textarea>
            <span class="position_qualification-validated validated" id="position_qualification-validated">
                    
            </span>
        </div>
        <div class="form-group">
            <label for="position_description">รายละเอียดงาน</label>
            <textarea id="position_description" name="position_description" rows="4" placeholder="ระบุรายละเอียดหน้าที่รับผิดชอบ...">{{ $internshippositions_edit->position_description ?? '' }}</textarea>
            <span class="position_description-validated validated" id="position_description-validated">
                    
            </span>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-submit">บันทึกประกาศ</button>
        </div>
    </form>
</div>

<script>
    let announcementForm = document.getElementById('form');

announcementForm.addEventListener('submit', (e) => {
    let hasError = false;

    const name = document.getElementById('position_name');
    const description = document.getElementById('position_description');
    const qualification = document.getElementById('position_qualification');
    const category = document.getElementById('position_category');
    const capacity = document.getElementById('position_capacity');
    const allowance = document.getElementById('position_allowance');
    const startDate = document.getElementById('position_start_date');
    const endDate = document.getElementById('position_end_date');
    const startTime = document.getElementById('position_start_time');
    const endTime = document.getElementById('position_end_time');
    const worktype = document.getElementById('position_worktype');
    const interview = document.getElementById('position_interview_type');

    if (name.value.trim() === "") {
        document.querySelector('.position_name-validated').innerHTML = 'กรุณากรอกชื่อตำแหน่ง';
        name.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_name-validated').innerHTML = '';
        name.classList.remove('input-error');
    }

    if (description.value.trim() === "") {
        document.querySelector('.position_description-validated').innerHTML = 'กรุณากรอกรายละเอียดตำแหน่ง';
        description.classList.add('input-error');
        hasError = true;
    } else { 
        document.querySelector('.position_description-validated').innerHTML = '';
        description.classList.remove('input-error');
    }

    if (qualification.value.trim() === "") {
        document.querySelector('.position_qualification-validated').innerHTML = 'กรุณากรอกคุณสมบัติของผู้สมัคร';
        qualification.classList.add('input-error');
        hasError = true;
    } else { 
        document.querySelector('.position_qualification-validated').innerHTML = '';
        qualification.classList.remove('input-error');
    }

    if (category.value.trim() === "") {
        document.querySelector('.position_category-validated').innerHTML = 'กรุณาเลือกหมวดหมู่ตำแหน่ง';
        category.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_category-validated').innerHTML = '';
        category.classList.remove('input-error');
    }

    if (capacity.value.trim() === "") {
        document.querySelector('.position_capacity-validated').innerHTML = 'กรุณากรอกอัตราที่รับสมัคร';
        capacity.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_capacity-validated').innerHTML = '';
        capacity.classList.remove('input-error');
    }

    if (allowance.value.trim() === "") {
        document.querySelector('.position_allowance-validated').innerHTML = 'กรุณากรอกเบี้ยเลี้ยง';
        allowance.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_allowance-validated').innerHTML = '';
        allowance.classList.remove('input-error');
    }

    if (startDate.value.trim() === "") {
        document.querySelector('.position_start_day-validated').innerHTML = 'กรุณาเลือกวันเริ่มงาน';
        startDate.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_start_day-validated').innerHTML = '';
        startDate.classList.remove('input-error');
    }

    if (endDate.value.trim() === "") {
        document.querySelector('.position_end_day-validated').innerHTML = 'กรุณาเลือกวันจบงาน';
        endDate.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_end_day-validated').innerHTML = '';
        endDate.classList.remove('input-error');
    }

    if (startTime.value.trim() === "") {
        document.querySelector('.position_start_time-validated').innerHTML = 'กรุณาเลือกเวลาเริ่มงาน';
        startTime.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_start_time-validated').innerHTML = '';
        startTime.classList.remove('input-error');
    }

    if (endTime.value.trim() === "") {
        document.querySelector('.position_end_time-validated').innerHTML = 'กรุณาเลือกเวลาเลิกงาน';
        endTime.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_end_time-validated').innerHTML = '';
        endTime.classList.remove('input-error');
    }

    if (worktype.value.trim() === "") {
        document.querySelector('.position_worktype-validated').innerHTML = 'กรุณาเลือกประเภทการทำงาน';
        worktype.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_worktype-validated').innerHTML = '';
        worktype.classList.remove('input-error');
    }

    if (interview.value.trim() === "") {
        document.querySelector('.position_interview_type-validated').innerHTML = 'กรุณาเลือกประเภทการสัมภาษณ์งาน';
        interview.classList.add('input-error');
        hasError = true;
    } else {
        document.querySelector('.position_interview_type-validated').innerHTML = '';
        interview.classList.remove('input-error');
    }

    if (hasError) {
        e.preventDefault();
    }
});
</script>
@endsection