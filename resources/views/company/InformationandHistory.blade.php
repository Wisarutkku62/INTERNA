@extends("layouts.app")

@push('styles')
<link rel="stylesheet"
    href="{{ asset('css/InformationandHistory.css') }}?v={{ filemtime(public_path('css/InformationandHistory.css')) }}">
@endpush

@section('content')

<div class="page-container">

    <!-- หน้าดูข้อมูลและประวัติการฝึกงาน -->

    <!-- ส่วนของหัวข้อหลัก -->
    <div class="navbar">
        <h1>ข้อมูลและประวัติของการฝึกงาน</h1>
    </div>


    <!-- ตรวจสอบข้อมูลการฝึกงานที่ผ่านมา -->

    <div class="section-block">
        <!-- <h3 class="section-title">ตรวจสอบข้อมูลการฝึกงานที่ผ่านมา</h3> -->

        <div class="box info-box">
            <p>ค้นหาด้วยรหัสนักศึกษาหรือชื่อนักศึกษา</p>
            <!-- ฟอร์มค้นหา -->
            <form onsubmit="return false;">
                <input type="text" placeholder="กรอกรหัสนักศึกษาหรือชื่อนักศึกษา" value="">
                <button type="submit">ตรวจสอบ</button>
            </form>

        </div>

    </div>

    <!-- ดูรายชื่อนักศึกษาที่เคยฝึกงาน -->
    <div class="section-block">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ชื่อนักศึกษา</th>
                        <th>สถานประกอบการ</th>
                        <th class="text-center">ปีการศึกษา</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- คนที่เคยฝึกงาน -->
                    <tr>
                        <td>
                            <div class="student-info">
                                <div class="avatar bg-blue">วค</div>
                                <div>
                                    <strong>นายวิศรุษ เครือลุนนี่</strong>
                                    <span>รหัสนักศึกษา 68338054-2 เกษตรศาสตร์</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>บริษัท เกษตรสู้เพื่อเกษตร
                            </strong>
                            <span>ฝ่ายนักวิเคราะห์เมล็ดพันธุ์ของพืชทางทวีปแอฟริกา</span>
                        </td>
                        <td class="text-center">2570</td>
                        <td class="text-center">
                            <span class="status-badge">กำลังฝึกงาน</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn-view">เพิ่มเติม</a>
                        </td>
                    </tr>
                    <!-- คนที่เคยฝึกงาน -->
                    <tr>
                        <td>
                            <div class="student-info">
                                <div class="avatar bg-blue">วค</div>
                                <div>
                                    <strong>นายวิศรุษ เครือลุนนี่</strong>
                                    <span>รหัสนักศึกษา 68338054-2 เกษตรศาสตร์</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>บริษัท เกษตรสู้เพื่อเกษตร
                            </strong>
                            <span>ฝ่ายนักวิเคราะห์เมล็ดพันธุ์ของพืชทางทวีปแอฟริกา</span>
                        </td>
                        <td class="text-center">2570</td>
                        <td class="text-center">
                            <span class="status-badge">กำลังฝึกงาน</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn-view">เพิ่มเติม</a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

        <!-- ดูประวัติและผลการประเมิน -->
        <!-- <div class="section-block">
            <h3 class="section-title">ประวัติและผลการประเมิน</h3>

        </div> -->



    </div>

    @endsection