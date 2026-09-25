@extends('layouts.company_nav')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/alljob.css') }}">
@endpush
@section('content')

    <div class="main-card">
        <div class="form-header">
            <a href="#" class="back-btn" title="ย้อนกลับ">&larr;</a>
            <h2>งานทั้งหมดที่ประกาศไป</h2>
            <a href="#" class="btn-create">+ สร้างประกาศงานใหม่</a>
        </div>

        <div class="job-list">
            <div class="job-item">
                <div class="job-info">
                    <h3>Backend Developer</h3>
                    <p class="job-details">Technology & IT • Full-time • Hybrid • น้ำพอง</p>
                    <p class="salary">45 - 60 บาท/เดือน</p>
                </div>
                <div class="job-actions">
                    <button type="button" class="btn-action btn-edit">แก้ไข</button>
                    <button type="button" class="btn-action btn-delete">ลบ</button>
                </div>
            </div>
            <div class="job-item">
                <div class="job-info">
                    <h3>Backend Developer</h3>
                    <p class="job-details">Technology & IT • Full-time • Hybrid • น้ำพอง</p>
                    <p class="salary">45 - 60 บาท/เดือน</p>
                </div>
                <div class="job-actions">
                    <button type="button" class="btn-action btn-edit">แก้ไข</button>
                    <button type="button" class="btn-action btn-delete">ลบ</button>
                </div>
            </div>
            <div class="job-item">
                <div class="job-info">
                    <h3>Backend Developer</h3>
                    <p class="job-details">Technology & IT • Full-time • Hybrid • น้ำพอง</p>
                    <p class="salary">45 - 60 บาท/เดือน</p>
                </div>
                <div class="job-actions">
                    <button type="button" class="btn-action btn-edit">แก้ไข</button>
                    <button type="button" class="btn-action btn-delete">ลบ</button>
                </div>
            </div>
            <div class="job-item">
                <div class="job-info">
                    <h3>Backend Developer</h3>
                    <p class="job-details">Technology & IT • Full-time • Hybrid • น้ำพอง</p>
                    <p class="salary">45 - 60 บาท/เดือน</p>
                </div>
                <div class="job-actions">
                    <button type="button" class="btn-action btn-edit">แก้ไข</button>
                    <button type="button" class="btn-action btn-delete">ลบ</button>
                </div>
            </div>
            <div class="job-item">
                <div class="job-info">
                    <h3>Backend Developer</h3>
                    <p class="job-details">Technology & IT • Full-time • Hybrid • น้ำพอง</p>
                    <p class="salary">45 - 60 บาท/เดือน</p>
                </div>
                <div class="job-actions">
                    <button type="button" class="btn-action btn-edit">แก้ไข</button>
                    <button type="button" class="btn-action btn-delete">ลบ</button>
                </div>
            </div>
        </div>
    </div>
@endsection