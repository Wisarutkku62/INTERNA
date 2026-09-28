@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/positiondetail.css') }}">
@endpush

@section('content')
<div class="container">
    <a href="{{ route('intern.intern') }}" class="back">&larr; ย้อนกลับ</a>

    <div class="job-layout">
        <div class="main-content">
            <div class="card">
                <h1 class="job-title">{{ $positions?->position_name }}</h1>
                <p class="company-name">{{ $positions?->company?->company_name }}</p>

                <div class="tags">
                    @if ($positions?->position_interview_type == 'Onsite')
                        <span class="tag-blue">สัมภาษณ์งานออนไซต์</span>
                    @elseif ($positions?->position_interview_type == 'Online')
                        <span class="tag-blue">สัมภาษณ์งานออนไลน์</span>
                    @endif

                    @if ($positions?->position_worktype)
                        <span class="tag-green">{{ $positions?->position_worktype }}</span>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="section-title">รายละเอียดงาน</div>
                <div class="section-body">
                    {!! nl2br(e($positions?->position_description ?? 'ไม่มีข้อมูลรายละเอียดงาน')) !!}
                </div>

                <div class="section-title">คุณสมบัติผู้สมัคร</div>
                <div class="section-body">
                    {!! nl2br(e($positions?->position_qualification ?? 'ไม่มีข้อมูลคุณสมบัติผู้สมัคร')) !!}
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="card sticky-sidebar">
                <h3 class="sidebar-title">สรุปข้อมูลงาน</h3>

                <div class="info-row">
                    <span class="info-label">หมวดหมู่ :</span>
                    <span class="info-value">{{ $positions?->position_category }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">เบี้ยเลี้ยง :</span>
                    <span class="info-value text-blue">{{ number_format($positions?->position_allowance ?? 0) }} บาท/วัน</span>
                </div>
                <div class="info-row">
                    <span class="info-label">จำนวนรับสมัคร :</span>
                    <span class="info-value">{{ $positions?->position_capacity }} อัตรา</span>
                </div>

                <div class="apply-box">
                    <button type="button" class="btn-primary btn-block">สมัครงานนี้</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection