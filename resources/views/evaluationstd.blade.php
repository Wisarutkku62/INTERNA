@extends("layouts.app")

@push('styles')
    <link rel="stylesheet"
        href="{{ asset('css/evaluationstd.css') }}?v={{ filemtime(public_path('css/evaluationstd.css')) }}">
@endpush

@php
    $student = [
        'name' => 'สมชาย ใจดี',
        'status_note' => 'กรุณากรอกข้อมูลส่วนตัวให้ครบก่อนยืนยันตัวตน',
    ];

    $workStatus = [
        'label' => 'อยู่ระหว่างฝึกงาน',
        'percent' => 60,
        'company' => 'บริษัท ลูกศร จำกัด',
    ];

    $approvalSteps = [
        ['label' => 'ส่งเอกสารฝึกงาน', 'state' => 'done'],
        ['label' => 'อาจารย์นิเทศตรวจสอบ', 'state' => 'done'],
        ['label' => 'บริษัทประเมินผล', 'state' => 'current'],
        ['label' => 'อนุมัติผลสำเร็จ', 'state' => 'pending'],
    ];

    $scores = [
        ['topic' => 'ความรับผิดชอบต่องาน', 'score' => 85],
        ['topic' => 'ทักษะการทำงาน', 'score' => 90],
        ['topic' => 'การทำงานร่วมกับผู้อื่น', 'score' => 88],
    ];

    $evaluationComment = [
        'company' => 'บริษัท ลูกศร จำกัด',
        'evaluator' => 'คุณสมชาย ใจดี',
        'text' => 'นักศึกษามีความตั้งใจทำงานดี เรียนรู้เร็ว และทำงานร่วมกับทีมได้ราบรื่น',
    ];
@endphp

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

        <div class="welcome-title">ยินดีต้อนรับ, {{ $student['name'] }}</div>
        <a href="#" class="btn-edit">แก้ไขข้อมูลส่วนตัว</a>

        @if ($student['status_note'])
            <div class="text-commend">{{ $student['status_note'] }}</div>
        @endif
    </div>

    <div class="main-content">

        <div class="grid-top">
            <section class="card">
                <h2 class="card-title">ตรวจสอบสถานะการทำงาน</h2>
                <div class="evl-status-card">
                    <div class="evl-status-top">
                        <span>{{ $workStatus['label'] }}</span>
                        <span class="evl-status-company">{{ $workStatus['company'] }}</span>
                    </div>
                    <div class="evl-progress-bar">
                        <div class="evl-progress-fill" style="width: {{ $workStatus['percent'] }}%"></div>
                    </div>
                    <span class="evl-progress-percent">{{ $workStatus['percent'] }}%</span>
                </div>
            </section>

            <section class="card">
                <h2 class="card-title">ความคืบหน้าการอนุมัติ</h2>
                <div class="evl-stepper">
                    @foreach ($approvalSteps as $step)
                        <div class="evl-step evl-step-{{ $step['state'] }}">
                            <span class="evl-step-dot"></span>
                            <span class="evl-step-label">{{ $step['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        <div class="grid-top">
            <section class="card">
                <div class="card-header">
                    <h2 class="card-title">คะแนนประเมินผลจากบริษัท</h2>
                    <a href="#" class="link-more">ดูทั้งหมด</a>
                </div>
                <div class="evl-score-list">
                    @forelse ($scores as $item)
                        <div class="evl-score-row">
                            <span class="evl-score-topic">{{ $item['topic'] }}</span>
                            <div class="evl-score-bar">
                                <div class="evl-score-fill" style="width: {{ $item['score'] }}%"></div>
                            </div>
                            <span class="evl-score-value">{{ $item['score'] }}</span>
                        </div>
                    @empty
                        <div class="evl-empty">ยังไม่มีคะแนนประเมิน</div>
                    @endforelse
                </div>
            </section>

            <section class="card">
                <h2 class="card-title">ความคิดเห็นและผลประเมิน</h2>
                <div class="evl-comment-card">
                    <p class="evl-comment-text">{{ $evaluationComment['text'] }}</p>
                    <div class="evl-comment-footer">
                        <span>{{ $evaluationComment['evaluator'] }}</span>
                        <span>{{ $evaluationComment['company'] }}</span>
                    </div>
                </div>
            </section>
        </div>

    </div>

</div>
@endsection