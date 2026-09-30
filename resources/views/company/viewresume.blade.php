@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/viewresume.css') }}">
@endpush

@section('content')
    <div class="cv-container">
        <div class="heaq">
            <a href="{{ route('index') }}" class="back-btnadqe">
                <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icontas">
                <span>ย้อนกลับ</span>
            </a>
        </div>
        <h1 class="cv-page-title">ข้อมูลส่วนตัว ของ #</h1>



        <div class="cv-grid-wrapper">
            <div class="cv-card cv-left-card">
                <div class="cv-avatar-box">
                    <img id="avatar-preview" src="{{ asset('img/profile.png') }}" alt="Profile Picture"
                        class="cv-avatar-img">
                </div>
            </div>

            <div class="cv-card cv-right-card">
                <div class="cv-field-item cv-field-half">
                    <label for="fname" class="cv-label">ชื่อ</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label for="lname" class="cv-label">นามสกุล</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label class="cv-label">เพศ</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label class="cv-label">วันเกิด</label>
                    <div class="cv-birthday-group">
                        <div class="cv-value">วัน</div>
                        <div class="cv-value">เดือน</div>
                        <div class="cv-value">ปี</div>
                    </div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label for="nationality" class="cv-label">สัญชาติ</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label for="religion" class="cv-label">ศาสนา</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label for="education" class="cv-label">ระดับการศึกษา</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item cv-field-half">
                    <label for="phone" class="cv-label">โทรศัพท์</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item">
                    <label for="email" class="cv-label">อีเมล</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item">
                    <label for="address" class="cv-label">ที่อยู่</label>
                    <div class="cv-value">#</div>
                </div>

                <div class="cv-field-item">
                    <label for="bio" class="cv-label">ข้อมูลส่วนตัวเพิ่มเติม</label>
                    <div class="cv-value">#</div>
                </div>
            </div>
        </div>
    </div>
@endsection