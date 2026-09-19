@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/evaluation.css') }}">
@endpush
@section('content')
<div class="evaluation-page">
    <div class="card-header">
            <h1 class="card-title">แบบประเมินผลการฝึกงาน</h1>
            <p class="card-subtitle">กรุณากรอกคะแนนประเมินและข้อเสนอแนะสำหรับนักศึกษาฝึกงาน</p>
        </div>
    <form action="#" method="POST">
    @csrf
    <div class="info-box">
                <div class="info-item">
                    <span class="info-label">ชื่อ-นามสกุล นักศึกษา</span>
                    <span class="info-value">นายกมลณัฐ สุวรรณสุข</span>
                </div>
                <div class="info-item">
                    <span class="info-label">ตำแหน่ง / แผนก</span>
                    <span class="info-value">Backend Developer</span>
                </div>
            </div>
            <div class="section-title">
                เกณฑ์การประเมิน (คะแนน 1 - 5)
            </div>
    <div class="rating">
        <label class="label-rate">1.ความรับผิดชอบตรงต่อเวลา</label>
        <div rating="options">
        <label>
            <input type="radio" name="scores[responsibility]" value="1">
            <span class="rating-btn">1</span>
        </label>
        <label>
            <input type="radio" name="scores[responsibility]" value="2">
            <span class="rating-btn">2</span>
        </label>
        <label>
            <input type="radio" name="scores[responsibility]" value="3">
            <span class="rating-btn">3</span>
        </label>
        <label>
            <input type="radio" name="scores[responsibility]" value="4">
            <span class="rating-btn">4</span>
        </label>
        <label>
            <input type="radio" name="scores[responsibility]" value="5">
            <span class="rating-btn">5</span>
        </label>
        </div>
    </div>
    <div class="rating">
        <label class="label-rate">2.ความรับผิดชอบและวินัยในการทำงาน</label>
        <div rating="options">
        <label>
            <input type="radio" name="scores[discipline]" value="1">
            <span class="rating-btn">1</span>
        </label>
        <label>
            <input type="radio" name="scores[discipline]" value="2">
            <span class="rating-btn">2</span>
        </label>
        <label>
            <input type="radio" name="scores[discipline]" value="3">
            <span class="rating-btn">3</span>
        </label>
        <label>
            <input type="radio" name="scores[discipline]" value="4">
            <span class="rating-btn">4</span>
        </label>
        <label>
            <input type="radio" name="scores[discipline]" value="5">
            <span class="rating-btn">5</span>
        </label>
        </div>
    </div>
    <div class="rating">
        <label class="label-rate">3.การปรับตัวและเรียนรู้</label>
        <div rating="options">
        <label>
            <input type="radio" name="scores[adaptability]" value="1">
            <span class="rating-btn">1</span>
        </label>
        <label>
            <input type="radio" name="scores[adaptability]" value="2">
            <span class="rating-btn">2</span>
        </label>
        <label>
            <input type="radio" name="scores[adaptability]" value="3">
            <span class="rating-btn">3</span>
        </label>
        <label>
            <input type="radio" name="scores[adaptability]" value="4">
            <span class="rating-btn">4</span>
        </label>
        <label>
            <input type="radio" name="scores[adaptability]" value="5">
            <span class="rating-btn">5</span>
        </label>
        </div>
    </div>
    <div class="rating">
        <label class="label-rate">4.การสื่อสารและการทำงานร่วมกีบผู้อื่น</label>
        <div rating="options">
        <label>
            <input type="radio" name="scores[communication]" value="1">
            <span class="rating-btn">1</span>
        </label>
        <label>
            <input type="radio" name="scores[communication]" value="2">
            <span class="rating-btn">2</span>
        </label>
        <label>
            <input type="radio" name="scores[communication]" value="3">
            <span class="rating-btn">3</span>
        </label>
        <label>
            <input type="radio" name="scores[communication]" value="4">
            <span class="rating-btn">4</span>
        </label>
        <label>
            <input type="radio" name="scores[communication]" value="5">
            <span class="rating-btn">5</span>
        </label>
        </div>
    </div>
    <div class="form-group">
        <label for="comments" class="form-label">ข้อเสนอแนะเพิ่มเติม</label>
        <textarea id="comments" name="comments" class="form-textarea" placeholder="ใส่ข้อเสนอแนะหรือสิ่งที่ต้องการให้นักศึกษาพัฒนา"></textarea>
        </div>
        <div class="summary-card">
                <div class="summary-left">
                    <span class="summary-label">คะแนนรวมสุทธิ</span>
                    <div class="score-box">
                        <span class="score-number">95</span>
                        <span class="score-max">/ 100 คะแนน</span>
                    </div>
                </div>
                <div class="summary-right">
                    <span class="summary-label">ผลการประเมิน</span>
                    <div class="status-badge-pass">
                        <span class="css-check"></span> ผ่านการประเมิน
                    </div>
                </div>
            </div>         
        <div class="form-actions">
            <button type="submit" class="btn-1">บันทึกผลการประเมิน</button>
            <button type="button" class="btn-2">ยกเลิก</button>
        </div>
    </form>
</div>
@endsection
