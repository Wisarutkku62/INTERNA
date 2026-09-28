@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/companydetail.css') }}">
@endpush
@section('content')
<div class="container">
    <a href="{{route('intern.intern')}}" class="back">&larr; ย้อนกลับ</a>

    <div class="job-layout">
        <div class="main-content">
            <div class="card">
                <h1 class="job-title">{{$positions?->position_name}} </h1>
                <p class="company-name">{{$positions?->company?->company_name}}</p>

                <div class="info-row">
                    <span class="info-label">หมวดหมู่ :</span>
                    <span class="info-value">{{$positions?->position_category}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">เบี้ยเลี้ยง :</span>
                    <span class="info-value text-blue">{{$positions?->position_allowance}} บาท</span>
                </div>
                <div class="info-row">
                    <span class="info-label">จำนวนรับสมัคร :</span>
                    <span class="info-value">{{$positions?->position_capacity}} อัตรา</span>
                </div>

                <div class="tags">
                    <span class="tag-blue">
                        @if ($positions?->position_interview_type == 'Onsite')
                        สัมภาษณ์งานออนไซต์
                        @elseif ($positions?->position_interview_type == 'Online')
                        สัมภาษณ์งานออนไลน์
                        @endif
                    </span>
                    <span class="tag-green">{{$positions?->position_worktype}}</span>
                </div>

                <div>
                    <button class="btn-primary">สมัครงานนี้</button>
                </div>
            </div>

            <div class="card">
                <div class="section-title">รายละเอียดงาน</div>
                <div class="section-body">
                    {{$positions?->position_description}}
                </div>

                <div class="section-title">คุณสมบัติผู้สมัคร</div>
                <div class="section-body">
                    <!-- <ul>
                        <li>วุฒิการศึกษาระดับปริญญาตรี สาขา IT หรือที่เกี่ยวข้อง</li>
                        <li>มีความเข้าใจพื้นฐานเกี่ยวกับ Routing & Switching</li>
                    </ul> -->
                    {{$positions?->position_qualification}}
                </div>
            </div>
        </div>
@endsection