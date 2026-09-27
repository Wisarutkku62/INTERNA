@extends("layouts.app")

@push('styles')
    <link rel="stylesheet"
        href="{{ asset('css/evaluationstd.css') }}?v={{ filemtime(public_path('css/evaluationstd.css')) }}">
@endpush

@section('content')
    <div class="dashboard-wrapper">

        <div class="profile-card card">
            <div class="logo-section">
                <div class="logo-box">
                    <svg class="building-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
                    </svg>
                    <button class="btn-camera">📷</button>
                </div>
                <div class="logo-label">รูปโปรไฟล์นักศึกษา</div>
            </div>

            <div class="welcome-title">ยินดีต้อนรับ</div>
            <a href="#" class="btn-edit">แก้ไขข้อมูลส่วนตัว</a>
        </div>

        <div class="main-content">

            <div class="grid-top">
                <section class="card">
                    <h2 class="card-title">ตำแหน่งงานที่สมัคร</h2>
                    <ul class="approval-list">
                        <li class="approval-done">
                            <div>
                                <div>ตำแหน่ง:</div>
                                <div>บริษัท:</div>
                            </div>
                        </li>
                    </ul>
                </section>

                <section class="card">
                    <div class="card-header">
                        <h3 class="card-title">นัดหมายสัมภาษณ์</h3>
                        <a href="#" class="link-more">ดูทั้งหมด</a>
                    </div>

                    <div class="interview-list">
                        <div class="interview-item">
                            <div class="interview-time">
                                <span class="time-num">10:30</span>
                                <span class="time-date">วันนี้</span>
                            </div>
                            <div class="interview-info">
                                <strong>สมชาย ใจดี</strong>
                                <p>ตำแหน่ง: UX/UI Designer</p>
                            </div>
                            <span class="badge-status">สัมภาษณ์ออนไลน์</span>
                        </div>
                        <div class="interview-item">
                            <div class="interview-time">
                                <span class="time-num">10:30</span>
                                <span class="time-date">วันนี้</span>
                            </div>
                            <div class="interview-info">
                                <strong>สมชาย ใจดี</strong>
                                <p>ตำแหน่ง: UX/UI Designer</p>
                            </div>
                            <span class="badge-status">สัมภาษณ์ออนไลน์</span>
                        </div>
                        <div class="interview-item">
                            <div class="interview-time">
                                <span class="time-num">10:30</span>
                                <span class="time-date">วันนี้</span>
                            </div>
                            <div class="interview-info">
                                <strong>สมชาย ใจดี</strong>
                                <p>ตำแหน่ง: UX/UI Designer</p>
                            </div>
                            <span class="badge-status">สัมภาษณ์ออนไลน์</span>
                        </div>
                        <div class="interview-item">
                            <div class="interview-time">
                                <span class="time-num">10:30</span>
                                <span class="time-date">วันนี้</span>
                            </div>
                            <div class="interview-info">
                                <strong>สมชาย ใจดี</strong>
                                <p>ตำแหน่ง: UX/UI Designer</p>
                            </div>
                            <span class="badge-status">สัมภาษณ์ออนไลน์</span>
                        </div>
                    </div>
                </section>
            </div>

            <section class="card">
                <h2 class="card-title card-title-left">ความคิดเห็นและคะแนนประเมินผล</h2>
            </section>

        </div>

    </div>
@endsection