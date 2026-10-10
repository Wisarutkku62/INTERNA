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
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('company.announcement.create')}}" method="POST" id='form'>
        @csrf
        <div class="form-group">
            <label for="position_name">ชื่อตำแหน่งงาน <span >*</span></label>
            <input type="text" id="position_name" name="position_name" placeholder="เช่น Backend Developer">
            <span class="position_name-validated validated" id="position_name-validated"></span>
        </div>
        <div class="form-row">

            <div class="form-group col">
                <label for="position_category">หมวดหมู่ <span>*</span></label>
                <select id="position_category" name="position_category">
                    <option value="" disabled selected>เลือกหมวดหมู่</option>
                    <option value="Technology & IT">Technology & IT</option>
                    <option value="Design & Creative">Design & Creative</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR & Admin">HR & Admin</option>
                </select>
                <span class="position_category-validated validated" id="position_category-validated">

                </span>
            </div>
            <div class="form-group col">
                <label for="position_capacity">จำนวนรับ (คน) <span >*</span></label>
                <input type="number" id="position_capacity" name="position_capacity" min="1" max="100" placeholder="เช่น 2">
                <span class="position_capacity-validated validated" id="position_capacity-validated">

                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_worktype">รูปแบบการทำงาน <span >*</span></label>
                <select id="position_worktype" name="position_worktype">
                    <option value="" disabled selected>เลือกรูปแบบการทำงาน</option>
                    <option value="Hybrid">Hybrid</option>
                    <option value="Onsite">Onsite</option>
                    <option value="Online">Online</option>
                </select>
                <span class="position_worktype-validated validated" id="position_worktype-validated"></span>
            </div>
            <div class="form-group col">
                <label for="position_interview_type">รูปแบบสัมภาษณ์ <span >*</span></label>
                <select id="position_interview_type" name="position_interview_type">
                    <option value="" disabled selected>เลือกรูปแบบสัมภาษณ์</option>
                    <option value="On-site">On-site</option>
                    <option value="Online">Online</option>
                </select>
                <span class="position_interview_type-validated validated" id="position_interview_type-validated"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_date">วันเริ่มทำงาน <span>*</span></label>
                <select id="position_start_date" name="position_start_date" >
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="Monday">จันทร์</option>
                    <option value="Tuesday">อังคาร</option>
                    <option value="Wednesday">พุธ</option>
                    <option value="Thursday">พฤหัสบดี</option>
                    <option value="Friday">ศุกร์</option>
                    <option value="Saturday">เสาร์</option>
                    <option value="Sunday">อาทิตย์</option>
                </select>
                <span class="position_start_day-validated validated" id="position_start_day-validated"></span>
            </div>
            <div class="form-group col">
                <label for="position_end_date">วันสิ้นสุดทำงาน <span >*</span></label>
                <select id="position_end_date" name="position_end_date">
                    <option value="" disabled selected>เลือกวัน...</option>
                    <option value="Monday">จันทร์</option>
                    <option value="Tuesday">อังคาร</option>
                    <option value="Wednesday">พุธ</option>
                    <option value="Thursday">พฤหัสบดี</option>
                    <option value="Friday">ศุกร์</option>
                    <option value="Saturday">เสาร์</option>
                    <option value="Sunday">อาทิตย์</option>
                </select>
                <span class="position_end_day-validated validated" id="position_end_day-validated"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_time">เวลาเริ่มทำงาน <span >*</span></label>
                <input type="time" id="position_start_time" name="position_start_time">
                <span class="position_start_time-validated validated" id="position_start_time-validated">

                </span>
            </div>
            <div class="form-group col">
                <label for="position_end_time">เวลาเลิกทำงาน <span>*</span></label>
                <input type="time" id="position_end_time" name="position_end_time">
                <span class="position_end_time-validated validated" id="position_end_time-validated">

                </span>
            </div>
        </div>
        <div class="form-group">
            <label for="position_allowance">อัตราเงินเดือน <span >*</span></label>
            <input type="text" id="position_allowance" name="position_allowance" min="0" placeholder="เช่น 9000">
            <span class="position_allowance-validated validated" id="position_allowance-validated">

            </span>
        </div>
        <div class="form-group">
            <label for="position_qualification">คุณสมบัติผู้สมัคร <span >*</span></label>
            <textarea id="position_qualification" name="position_qualification" rows="3" placeholder="ระบุคุณสมบัติเบื้องต้น..."></textarea>
            <span class="position_qualification-validated validated" id="position_qualification-validated"></span>
        </div>
        <div class="form-group">
            <label for="position_description">รายละเอียดงาน <span >*</span></label>
            <textarea id="position_description" name="position_description" rows="4" placeholder="ระบุรายละเอียดหน้าที่รับผิดชอบ..."></textarea>
            <span class="position_description-validated validated" id="position_description-validated"></span>
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