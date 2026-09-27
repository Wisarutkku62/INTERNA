@extends("layouts.app")

@push('styles') 
<link rel="stylesheet" href="{{ asset('css/ManageInternship.css') }}?v={{ filemtime(public_path('css/ManageInternship.css')) }}">
@endpush

@section('content')

<div class="page-container">

    <!-- หน้าจัดการข้อมูล -->
    <!-- ส่วนของหัวข้อหลัก -->
    <div class="navbar">
        <h1>จัดการข้อมูลการฝึกงาน</h1>
    </div>

    <!-- ดูรายละเอียดการฝึกงาน -->
    <div class="section-block">
        <h3 class="section-title">รายละเอียดการฝึกงาน</h3>
        <div class="box">
            <div class="box-item">
                <img src="{{ asset('image/profile_f.png') }}" alt="Profile">
                <p>กำลังมองหางาน</p>
                <h2>Dev</h2>
                <h3>เงินเดือนที่คาดหวัง</h3>
                <p>15,000 - 25,000</p>
            </div>

            <div class="box-item">
                <img src="{{ asset('image/profile_m.png') }}" alt="Profile">
                <p>กำลังมองหางาน</p>
                <h2>Dev</h2>
                <h3>เงินเดือนที่คาดหวัง</h3>
                <p>15,000 - 25,000</p>
            </div>
        </div>
    </div>

    <!-- ตรวจสอบช่วงเวลาการฝึกงาน -->
    <div class="section-block">
        <h3 class="section-title">ตรวจสอบช่วงเวลาการฝึกงาน</h3>
        <div class="box info-box">
            <div class="time-card">
                <div class="time-info">
                    <h4>ระยะเวลาการฝึกงานทั้งหมด</h4>
                    <p>4 พฤศจิกายน 2569 - 28 กุมภาพันธ์ 2570 (รวม 4 เดือน)</p>
                </div>
                <div class="time-status">
                    <span class="badge badge-success">กำลังดำเนินการฝึกงาน</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตามสถานะการฝึกงาน -->
    <div class="section-block">
        <h3 class="section-title">ติดตามสถานะการฝึกงาน</h3>
        <div class="box info-box">
            <div class="status-steps">
                <div class="step step-active">
                    <div class="step-icon"><a href="#">1</a></div>
                    <p>ส่งใบสมัคร</p>
                </div>
                <div class="step step-active">
                    <div class="step-icon">2</div>
                    <p>ผ่านการสัมภาษณ์</p>
                </div>
                <div class="step step-current">
                    <div class="step-icon">3</div>
                    <p>กำลังฝึกงาน</p>
                </div>
                <div class="step">
                    <div class="step-icon">4</div>
                    <p>ประเมินผลสำเร็จ</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection