@extends("layouts.company_nav")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/managecom.css') }}">
@endpush
@section('content')
<div class="dashboard-wrapper">
    <aside class="card profile-card">
        <div class="logo-section">
            <div class="logo-box">
                <button class="btn-camera" type="button" aria-label="Upload logo">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                </button>
            </div>
            <span class="logo-label">รูปโลโก้บริษัท</span>
        </div>

        <h3 class="welcome-title">ยินดีต้อนรับบริษัทใหม่</h3>
        <a href="#" class="btn-edit">แก้ไขข้อมูลบริษัท</a>
        <p class="text-commend">กรุณากรอกข้อมูลบริษัทให้ครบก่อนยืนยันตัวตน</p>
    </aside>

    <main class="main-content">
        <div class="grid-top">
            <section class="card job-card">
                <h3 class="card-title">ตำแหน่งงานของคุณ</h3>
                
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-num">0</span>
                        <span class="stat-label">ทั้งหมด</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">0</span>
                        <span class="stat-label">เผยแพร่</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">0</span>
                        <span class="stat-label">ไม่เผยแพร่</span>
                    </div>
                </div>

                <div class="button-group">
                    <a href="#" class="btn-action btn-blue">
                    สร้างประกาศงาน
                    </a>
                    <a href="#" class="btn-action btn-gray">ดูงานทั้งหมด</a>
                </div>
            </section>

            <section class="card package-card">
            <div class="card-header">
        <h3 class="card-title">นัดหมายสัมภาษณ์เร็วๆ นี้</h3>
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
    </div>
            </section>
        </div>
        
        <section class="card applicants-card">
            <div class="card-header">
                <h3 class="card-title">ผู้สมัครล่าสุด</h3>
                <a href="#" class="link-more">ดูทั้งหมด</a>
            </div>
        <div class="state">
            <div class="interview-list">
            <div class="interview-item">
                <div class="interview-time">
                    <span class="time-num">12:24</span>
                </div>
            <div class="interview-info">
                <strong>สมชาย ใจดี</strong>
                <p>ตำแหน่ง: UX/UI Designer</p>
            </div>
            <span class="badge-status">สัมภาษณ์ออนไซต์</span>
            </div>
             <div class="interview-item">
                <div class="interview-time">
                    <span class="time-num">12:24</span>
                </div>
            <div class="interview-info">
                <strong>สมชาย ใจดี</strong>
                <p>ตำแหน่ง: UX/UI Designer</p>
            </div>
            <span class="badge-status">สัมภาษณ์ออนไซต์</span>
            </div>
             <div class="interview-item">
                <div class="interview-time">
                    <span class="time-num">12:24</span>
                </div>
            <div class="interview-info">
                <strong>สมชาย ใจดี</strong>
                <p>ตำแหน่ง: UX/UI Designer</p>
            </div>
            <span class="badge-status">สัมภาษณ์ออนไซต์</span>
            </div>
             <div class="interview-item">
                <div class="interview-time">
                    <span class="time-num">12:24</span>
                </div>
            <div class="interview-info">
                <strong>สมชาย ใจดี</strong>
                <p>ตำแหน่ง: UX/UI Designer</p>
            </div>
            <span class="badge-status">สัมภาษณ์ออนไซต์</span>
            </div>
        </div>
        </div>
        </section>
    </main>
</div>
@endsection