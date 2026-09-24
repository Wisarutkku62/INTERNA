@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/appointment.css') }}?v={{ filemtime(public_path('css/appointment.css')) }}">
@endpush

@section('content')
    <div class="apm-page">

        <div class="hea">
            <a href="{{ route('index') }}" class="back-btnad">
                <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icont">
                <span>กลับสู่หน้าหลัก</span>
            </a>
        </div>



        <div class="apm-heading">
            <h1 class="apm-title">จัดการการนัดหมายสัมภาษณ์</h1>
            <h3 class="apm-subtitle">ติดตามสถานะ ยืนยันรอบสัมภาษณ์และส่งคำขอเลื่อนนัดหมายกับบริษัท</h3>
        </div>



        <div class="apm-section apm-schedule">
            <h1 class="apm-section-title">ดูกำหนดการนัดหมายกับบริษัท</h1>
            <div class="apm-table">
                <div class="apm-table-header">
                    <span>วันที่</span>
                    <span>เวลา</span>
                    <span>บริษัท</span>
                    <span>เรื่อง</span>
                    <span>สถานที่</span>
                </div>
                <div class="apm-table-row">
                    <span>$</span>
                    <span>$</span>
                    <span>$</span>
                    <span>$</span>
                    <span>$</span>
                </div>
            </div>
        </div>

        <div class="apm-section apm-reschedule">
            <h1 class="apm-section-title">ยืนยันหรือขอเลื่อนการนัดหมาย</h1>
            <div class="apm-table">
                <div class="apm-table-header">
                    <span>นัดหมายล่าสุด</span>
                    <span>บริษัท</span>
                    <span>สถานะ</span>
                    <span>จัดการ</span>
                </div>
                <div class="apm-table-row">
                    <span>$</span>
                    <span>$</span>
                    <span>$</span>
                    <span>$</span>
                </div>
            </div>

            <form action="{{ route('appointment') }}" method="POST" class="action-form">
    @csrf
    <button type="submit" class="success">ยืนยัน</button>
</form>

<form action="{{ route('appointment') }}" method="POST" class="action-form">
    @csrf
    <button type="submit" class="reschedule">ขอเลื่อนนัด</button>
</form>

        </div>
@endsection