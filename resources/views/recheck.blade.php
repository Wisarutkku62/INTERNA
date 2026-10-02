@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Recheck.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="recheck-container">
    <div class="main-card-wrapper">
        <header class="page-header">
            <h1 class="page-title">ตรวจสอบสถานะผู้สมัครและนักศึกษา</h1>
            <p class="page-subtitle">จัดการและติดตามสถานะผู้สมัคร การสัมภาษณ์ และนักศึกษาฝึกงานทั้งหมด</p>
        </header>

 
        <div class="stats-grid">
            <div class="stat-card card-all">
                <div class="stat-info">
                    <span class="stat-label">ผู้สมัครทั้งหมด</span>
                    <span class="stat-value">120</span>
                </div>
            </div>
            <div class="stat-card card-passed">
                <div class="stat-info">
                    <span class="stat-label">ผ่านการสัมภาษณ์</span>
                    <span class="stat-value">35</span>
                </div>
            </div>
            <div class="stat-card card-failed">
                <div class="stat-info">
                    <span class="stat-label">ไม่ผ่านการสัมภาษณ์</span>
                    <span class="stat-value">15</span>
                </div>
            </div>
            <div class="stat-card card-interning">
                <div class="stat-info">
                    <span class="stat-label">กำลังฝึกงาน</span>
                    <span class="stat-value">40</span>
                </div>
            </div>
        </div>


        <div class="table-card">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ผู้สมัคร / นักศึกษา</th>
                            <th>ตำแหน่งที่สมัคร</th>
                            <th>บริษัท</th>
                            <th>สถานะปัจจุบัน</th>
                            <th>วันที่อัปเดต</th>
                            <th class="text-center">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="avatar">สม</div>
                                    <div>
                                        <div class="user-name">สมชาย สายลุย</div>
                                        <div class="user-email">somchai@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Web Developer</td>
                            <td>วิทยาการคอมพิวเตอร์ (มข.)</td>
                            <td><span class="badge badge-passed">ผ่านการสัมภาษณ์</span></td>
                            <td>20 ก.ย. 2026</td>
                            <td class="text-center">
                                <button class="btn-action btn-view">ดูรายละเอียด</button>
                                <button class="btn-action btn-edit">แก้ไข</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="avatar bg-avatar-red">สม</div>
                                    <div>
                                        <div class="user-name">สมหญิง สุขใจ</div>
                                        <div class="user-email">somying@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>UX/UI Designer</td>
                            <td>เทคโนโลยีสารสนเทศ (มข.)</td>
                            <td><span class="badge badge-failed">ไม่ผ่านการสัมภาษณ์</span></td>
                            <td>18 ก.ย. 2026</td>
                            <td class="text-center">
                                <button class="btn-action btn-view">ดูรายละเอียด</button>
                                <button class="btn-action btn-edit">แก้ไข</button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="avatar bg-avatar-purple">กิต</div>
                                    <div>
                                        <div class="user-name">กิตติศักดิ์ มั่นคง</div>
                                        <div class="user-email">kittisak@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Data Analyst</td>
                            <td>วิศวกรรมคอมพิวเตอร์ (มข.)</td>
                            <td><span class="badge badge-interning">กำลังฝึกงาน</span></td>
                            <td>01 ก.ย. 2026</td>
                            <td class="text-center">
                                <button class="btn-action btn-view">ดูรายละเอียด</button>
                                <button class="btn-action btn-edit">แก้ไข</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="avatar bg-avatar-orange">อนั</div>
                                    <div>
                                        <div class="user-name">อนันต์ รักดี</div>
                                        <div class="user-email">anan@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Backend Developer</td>
                            <td>วิทยาการคอมพิวเตอร์ (มมส.)</td>
                            <td><span class="badge badge-pending">รอการสัมภาษณ์</span></td>
                            <td>24 ก.ย. 2026</td>
                            <td class="text-center">
                                <button class="btn-action btn-view">ดูรายละเอียด</button>
                                <button class="btn-action btn-edit">แก้ไข</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection