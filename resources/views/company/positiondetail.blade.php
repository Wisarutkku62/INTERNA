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
                    <h1 class="job-title">{{ $positions->position_name }}</h1>
                    <p class="company-name">{{ $positions->company?->company_name }}</p>

                    <div class="tags">
                        @if ($positions->position_interview_type == 'Onsite')
                            <span class="tag-blue">สัมภาษณ์งานออนไซต์</span>
                        @elseif ($positions->position_interview_type == 'Online')
                            <span class="tag-blue">สัมภาษณ์งานออนไลน์</span>
                        @endif

                        @if ($positions->position_worktype)
                            <span class="tag-green">{{ $positions->position_worktype }}</span>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="section-title">รายละเอียดงาน</div>
                    <div class="section-body">
                        {!! nl2br(e($positions->position_description ?? 'ไม่มีข้อมูลรายละเอียดงาน')) !!}
                    </div>

                    <div class="section-title">คุณสมบัติผู้สมัคร</div>
                    <div class="section-body">
                        {!! nl2br(e($positions->position_qualification ?? 'ไม่มีข้อมูลคุณสมบัติผู้สมัคร')) !!}
                    </div>
                    <div class="section-title">รายละเอียดบริษัท</div>
                    <div class="section-body">
                        <p><strong>ชื่อบริษัท:</strong> {{ $positions->company->company_name ?? '-' }}</p>
                        <p><strong>รายละเอียด:</strong>
                            {!! nl2br(e($positions->company->company_description ?? 'ไม่มีข้อมูล')) !!}</p>
                        <p><strong>ที่อยู่:</strong> {{ $positions->company->company_address ?? '-' }}</p>
                        <p><strong>เว็บไซต์:</strong> {{ $positions->company->company_website ?? '-' }}</p>
                        <p><strong>ผู้ติดต่อ:</strong> {{ $positions->company->contact_name ?? '-' }}</p>
                        <p><strong>ตำแหน่งผู้ติดต่อ:</strong> {{ $positions->company->contact_position ?? '-' }}</p>
                        <p><strong>เบอร์โทรศัพท์:</strong> {{ $positions->company->contact_phone ?? '-' }}</p>
                        <p><strong>อีเมล:</strong> {{ $positions->company->contact_email ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="card sticky-sidebar">
                    <h3 class="sidebar-title">สรุปข้อมูลงาน</h3>

                    <div class="info-row">
                        <span class="info-label">หมวดหมู่ :</span>
                        <span class="info-value">{{ $positions->position_category }}</span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">เบี้ยเลี้ยง :</span>
                        <span class="info-value text-blue">{{ number_format($positions->position_allowance ?? 0) }}
                            บาท/วัน</span>
                    </div>

                    @auth
                        @if(Auth::user()->role === 'student')
                        <form action="{{ route('intern.apply', $positions->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-primary btn-block">สมัครงาน</button>
                        </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection