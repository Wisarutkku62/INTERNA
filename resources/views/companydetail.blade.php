@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/companydetail.css') }}">
@endpush
@section('content')
<div class="container">
    <a href="#" class="back">&larr; ย้อนกลับ</a>

    <div class="job-layout">
        <div class="main-content">
            <div class="card">
                <h1 class="job-title">Network Engineer</h1>
                <p class="company-name">AIS</p>

                <div class="info-row">
                    <span class="info-label">หมวดหมู่ :</span>
                    <span class="info-value">IT</span>
                </div>
                <div class="info-row">
                    <span class="info-label">เบี้ยเลี้ยง :</span>
                    <span class="info-value text-blue">19,000 บาท</span>
                </div>
                <div class="info-row">
                    <span class="info-label">จำนวนรับสมัคร :</span>
                    <span class="info-value">2 อัตรา</span>
                </div>

                <div class="tags">
                    <span class="tag-blue">สัมภาษณ์งานออนไลน์ (Online)</span>
                    <span class="tag-green">Hybrid</span>
                </div>

                <div>
                    <button class="btn-primary">สมัครงานนี้</button>
                </div>
            </div>

            <div class="card">
                <div class="section-title">รายละเอียดงาน</div>
                <div class="section-body">
                    ดูแลและบริหารจัดการระบบเครือข่ายคอมพิวเตอร์ (Network Infrastructure) ขององค์กร...
                </div>

                <div class="section-title">คุณสมบัติผู้สมัคร</div>
                <div class="section-body">
                    <ul>
                        <li>วุฒิการศึกษาระดับปริญญาตรี สาขา IT หรือที่เกี่ยวข้อง</li>
                        <li>มีความเข้าใจพื้นฐานเกี่ยวกับ Routing & Switching</li>
                    </ul>
                </div>
            </div>
        </div>
@endsection