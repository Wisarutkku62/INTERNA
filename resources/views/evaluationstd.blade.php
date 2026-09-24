@extends("layouts.app")

@push('styles')
    <link rel="stylesheet"
        href="{{ asset('css/evaluationstd.css') }}?v={{ filemtime(public_path('css/evaluationstd.css')) }}">
@endpush

@section('content')
    <div class="evl-page">

        <div class="evl-heading">
            <h1 class="evl-title">เช็คผลประเมิน</h1>
        </div>

        <div class="evl-section">
            <h2 class="evl-section-title">ตรวจสอบสถานะการทำงาน</h2>
            <div class="evl-status-card">
                <div class="evl-status-top">
                    <span class="evl-status-label"></span>
                    <span class="evl-status-company"></span>
                </div>
                <div class="evl-progress-bar">
                    <div class="evl-progress-fill"></div>
                </div>
                <span class="evl-progress-percent"></span>
            </div>
        </div>

        <div class="evl-section">
            <h2 class="evl-section-title">ความคืบหน้าการอนุมัติ</h2>
            <div class="evl-stepper">

                <div class="evl-step evl-step-">
                    <span class="evl-step-dot"></span>
                    <span class="evl-step-label"></span>
                </div>

            </div>
        </div>

        <div class="evl-section">
            <h2 class="evl-section-title">คะแนนประเมินผลจากบริษัท</h2>
            <div class="evl-score-list">

                <div class="evl-score-row">
                    <span class="evl-score-topic"></span>
                    <div class="evl-score-bar">
                        <div class="evl-score-fill"></div>
                    </div>
                    <span class="evl-score-value"></span>
                </div>

                <div class="evl-empty">ยังไม่มีคะแนนประเมิน</div>

            </div>
        </div>

        <div class="evl-section">
            <h2 class="evl-section-title">ความคิดเห็นและผลประเมิน</h2>
            <div class="evl-comment-card">
                <p class="evl-comment-text"></p>
                <div class="evl-comment-footer">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

    </div>
@endsection