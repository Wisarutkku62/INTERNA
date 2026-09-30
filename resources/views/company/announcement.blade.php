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
    <form action="{{route('company.announcement.create')}}" method="POST" id='form'>
        @csrf
        <div class="form-group">
            <label for="position_name">ชื่อตำแหน่งงาน</label>
            <input type="text" id="position_name" name="position_name" placeholder="เช่น Backend Developer" required>
            <span class="position_name-validated" id="position_name-validated">

            </span>
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
                <span class="position_category-validated" id="position_category-validated">
                    
                </span>
            </div>
            <div class="form-group col">
                <label for="position_capacity">จำนวนรับ (คน)</label>
                <input type="number" id="position_capacity" name="position_capacity" min="1" placeholder="เช่น 2" required>
                <span class="position_capacity-validated" id="position_capacity-validated">

                </span>
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
                <span class="position_worktype" id="position_worktype">

                </span>
            </div>
            <div class="form-group col">
                <label for="position_interview_type">รูปแบบสัมภาษณ์</label>
                <select id="position_interview_type" name="position_interview_type">
                    <option value="On-site">On-site</option>
                    <option value="Online">Online</option>
                </select>
                <span class="position_interview_type" id="position_interview_type">

                </span>
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
                <span class="position_start_day-validated" id="position_start_day-validated">

                </span>
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
                <span class="position_end_day-validated" id="position_end_day-validated">
                    
                </span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="position_start_time">เวลาเริ่มทำงาน</label>
                <input type="time" id="position_start_time" name="position_start_time" value="08:30" required>
                <span class="position_start_time-validated" id="position_start_time-validated">
                    
                </span>
            </div>
            <div class="form-group col">
                <label for="position_end_time">เวลาเลิกทำงาน</label>
                <input type="time" id="position_end_time" name="position_end_time" value="17:30" required>
                <span class="position_end_time-validated" id="position_end_time-validated">
                    
                </span>
            </div>
        </div>
        <div class="form-group">
            <label for="position_allowance">อัตราเงินเดือน </label>
            <input type="text" id="position_allowance" name="position_allowance" placeholder="เช่น 4-5 บาท/เดือน" required>
            <span class="position_allowance-validated" id="position_allowance-validated">
                    
                </span>
        </div>
        <div class="form-group">
            <label for="position_qualification">คุณสมบัติผู้สมัคร</label>
            <textarea id="position_qualification" name="position_qualification" rows="3" placeholder="ระบุคุณสมบัติเบื้องต้น..."></textarea>
            <span class="position_qualification-validated" id="position_qualification-validated">
                    
                </span>
        </div>
        <div class="form-group">
            <label for="position_description">รายละเอียดงาน</label>
            <textarea id="position_description" name="position_description" rows="4" placeholder="ระบุรายละเอียดหน้าที่รับผิดชอบ..."></textarea>
            <span class="position_description-validated" id="position_description-validated">
                    
                </span>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-submit">บันทึกประกาศ</button>
        </div>
    </form>
</div>
<script>
    let announcementForm = document.getElementById('form')
    announcementForm.addEventListener('submit', (e) => {
        let nameNotFill = false
        let descriptionNotFill = false
        let qualificationNotFill = false
        let categoryNotFill = false
        let capacityNotFill = false
        let allowanceNotFill = false
        let start_dayNotFill = false
        let end_dayNotFill = false
        let start_timeNotFill = false
        let end_timeNotFill = false
        let worktypeNotFill = false
        let interviewtypeNotFill = false
        const name_value = document.getElementById('position_name').value;
        const description_value = document.getElementById('position_description').value;
        const qualification_value = document.getElementById('position_qualification').value;
        const category_value = document.getElementById('position_category').value;
        const capacity_value = document.getElementById('position_capacity').value;
        const allowance_value = document.getElementById('position_allowance').value;
        const start_day_value = document.getElementById('position_start_date').value;
        const end_day_value = document.getElementById('position_end_date').value;
        const start_time_value = document.getElementById('position_start_time').value;
        const end_time_value = document.getElementById('position_end_time').value;
        const worktype_value = document.getElementById('position_worktype').value;
        const interview_value = document.getElementById('position_interview_type').value;

    if(name_value == "") {
        document.querySelector('.position_name-validated').innerHTML='กรุณากรอกชื่อตำแหน่ง'
        nameNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (name_value != ""){
        document.querySelector('.position_name-validated').innerHTML=''
        nameNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(description_value == "") {
        document.querySelector('.position_description-validated').innerHTML='กรุณากรอกรายละเอียดตำแหน่ง'
        descriptionNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (name_value != ""){
        document.querySelector('.position_description-validated').innerHTML=''
        descriptionNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(qualification_value == "") {
        document.querySelector('.position_qualification-validated').innerHTML='กรุณากรอกคุณสมบัติของผู้สมัคร'
        qualificationNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (name_value != ""){
        document.querySelector('.position_qualification-validated').innerHTML=''
        qualificationNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(category_value == "") {
        document.querySelector('.position_category-validated').innerHTML='กรุณาเลือกหมวดหมู่ตำแหน่ง'
        categoryNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (category_value != ""){
        document.querySelector('.position_category-validated').innerHTML=''
        categoryNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(capacity_value == "") {
        document.querySelector('.position_capacity-validated').innerHTML='กรุณากรอกอัตราที่รับสมัคร'
        capacityNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (capacity_value != ""){
        document.querySelector('.position_capacity-validated').innerHTML=''
        capacityNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(allowance_value == "") {
        document.querySelector('.position_allowance-validated').innerHTML='กรุณากรอกเบี้ยเลี้ยง'
        allowanceNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (allowance_value != ""){
        document.querySelector('.position_allowance-validated').innerHTML=''
        allowanceNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(start_day_value == "") {
        document.querySelector('.position_start_date-validated').innerHTML='กรุณาเลือกวันเริ่มงาน'
        start_dayNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (start_day_value != ""){
        document.querySelector('.position_start_date-validated').innerHTML=''
        start_dayNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(end_day_value == "") {
        document.querySelector('.position_end_date-validated').innerHTML='กรุณาเลือกวันจบงาน'
        end_dayNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (end_day_value != ""){
        document.querySelector('.position_end_date-validated').innerHTML=''
        end_dayNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(name_value == "") {
        document.querySelector('.position_name-validated').innerHTML='กรุณากรอกชื่อตำแหน่ง'
        nameNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (name_value != ""){
        document.querySelector('.position_name-validated').innerHTML=''
        nameNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }

    if(name_value == "") {
        document.querySelector('.position_name-validated').innerHTML='กรุณากรอกชื่อตำแหน่ง'
        nameNotFill = true;
        // document.getElementById('') ใส่classList.add
    } else if (name_value != ""){
        document.querySelector('.position_name-validated').innerHTML=''
        nameNotFill = false;
        // document.getElementById('') ใส่classList.remove
    }
        })

</script>
@endsection