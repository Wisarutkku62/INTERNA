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

    <form action="{{ route('evaluation.save') }}" method="POST">
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
            <label class="label-rate">1. ความรับผิดชอบตรงต่อเวลา</label>
            <div rating="options">
                @for($i = 1; $i <= 5; $i++)
                    <label>
                    <input type="radio" name="scores[punctuality]" value="{{ $i }}" class="score-radio" required>
                    <span class="rating-btn">{{ $i }}</span>
                    </label>
                    @endfor
            </div>
        </div>

        <div class="rating">
            <label class="label-rate">2. ความรับผิดชอบและวินัยในการทำงาน</label>
            <div rating="options">
                @for($i = 1; $i <= 5; $i++)
                    <label>
                    <input type="radio" name="scores[discipline]" value="{{ $i }}" class="score-radio" required>
                    <span class="rating-btn">{{ $i }}</span>
                    </label>
                    @endfor
            </div>
        </div>

        <div class="rating">
            <label class="label-rate">3. การปรับตัวและเรียนรู้</label>
            <div rating="options">
                @for($i = 1; $i <= 5; $i++)
                    <label>
                    <input type="radio" name="scores[adaptability]" value="{{ $i }}" class="score-radio" required>
                    <span class="rating-btn">{{ $i }}</span>
                    </label>
                    @endfor
            </div>
        </div>

        <div class="rating">
            <label class="label-rate">4. การสื่อสารและการทำงานร่วมกับผู้อื่น</label>
            <div rating="options">
                @for($i = 1; $i <= 5; $i++)
                    <label>
                    <input type="radio" name="scores[communication]" value="{{ $i }}" class="score-radio" required>
                    <span class="rating-btn">{{ $i }}</span>
                    </label>
                    @endfor
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
                    <span class="score-number" id="totalScore">0</span>
                    <span class="score-max">/ 100 คะแนน</span>
                </div>
            </div>
            <div class="summary-right">
                <span class="summary-label">ผลการประเมิน</span>
                <div id="statusBadge" class="status-badge-pending">
                    <span id="statusText">รอการประเมิน</span>
                </div>
            </div>
        </div>
    </form>
    <div class="form-actions">
        <button type="submit" class="btn-1">บันทึกผลการประเมิน</button>
        <button type="button" class="btn-2" onclick="history.back()">ยกเลิก</button>
    </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('input[type="radio"]');
        const totalScoreEl = document.querySelector('.score-number');
        const statusBadge = document.querySelector('.summary-right div');

        function calculateScore() {
            const checkedRadios = document.querySelectorAll('input[type="radio"]:checked');
            let rawTotal = 0;

            checkedRadios.forEach(function(radio) {
                rawTotal += parseInt(radio.value, 10);
            });

            const finalScore = rawTotal * 5;

            if (totalScoreEl) {
                totalScoreEl.textContent = finalScore;
            }

            if (checkedRadios.length === 4 && statusBadge) {
                if (finalScore >= 50) {
                    statusBadge.className = 'status-badge-pass';
                    statusBadge.innerHTML = '<span class="css-check"></span> ผ่านการประเมิน';
                } else {
                    statusBadge.className = 'status-badge-fail';
                    statusBadge.innerHTML = 'ไม่ผ่านการประเมิน';
                }
            }
        }

        radios.forEach(function(radio) {
            radio.addEventListener('change', calculateScore);
        });
    });
</script>