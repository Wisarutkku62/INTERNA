@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/newprofile.css') }}?v={{ filemtime(public_path('css/newprofile.css')) }}">
@endpush

@section('content')

@if ($errors->any())
    <div>
        <strong>พบข้อผิดพลาดในการกรอกข้อมูล:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1 class="profile-title">ข้อมูลส่วนตัว</h1>

    <form name="profileForm" action="{{ route('profile.save') }}" method="POST" class="profile" enctype="multipart/form-data">
        @csrf
        <div class="avatar-section full-width">
            <div class="avatar-wrapper">
                <img id="avatar-preview" src="/img/profile.png" alt="Profile Picture">
            </div>
            <div class="file-upload">
                <label for="profile_picture" class="btn-upload">เลือกรูปโปรไฟล์</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                    onchange="previewImage(event)" class="PictureProfile">
            </div>
        </div>

        <div class="form-group">
            <label for="fname">ชื่อ</label>
            <input type="text" name="fname" value="{{ old('fname') }}" placeholder="ชื่อ" class="input-field">
        </div>

        <div class="form-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="lname" value="{{ old('lname') }}" placeholder="นามสกุล" class="input-field">
        </div>

        <div class="form-group full-width">
            <label>เพศ</label>
            <div class="gender-group">
                <label class="radio-item"><input type="radio" name="gender" value="male" class="Radio" {{ old('gender') == 'male' ? 'checked' : '' }}> ชาย</label>
                <label class="radio-item"><input type="radio" name="gender" value="female" class="Radio" {{ old('gender') == 'female' ? 'checked' : '' }}> หญิง</label>
                <label class="radio-item"><input type="radio" name="gender" value="LGBTQIA+" class="Radio" {{ old('gender') == 'LGBTQIA+' ? 'checked' : '' }}> LGBTQIA+</label>
            </div>
        </div>

        <div class="form-group full-width">
            <label>วันเกิด</label>
            <div class="birthday-group">
                <select name="day" class="Birthday">
                    <option value="">วันที่</option>
                    @for ($day = 1; $day <= 31; $day++)
                        <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endfor
                </select>
                <select name="month" class="Birthday">
                    <option value="">เดือน</option>
                    @php
                        $months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'];
                    @endphp
                    @foreach ($months as $key => $month)
                        <option value="{{ $key }}" {{ old('month') == $key ? 'selected' : '' }}>{{ $month }}</option>
                    @endforeach
                </select>
                <select name="year" class="Birthday">
                    <option value="">พ.ศ.</option>
                    @for ($year = date('Y') + 543; $year >= 2500; $year--)
                        <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="nationality">สัญชาติ</label>
            <input type="text" name="nationality" value="{{ old('nationality') }}" placeholder="สัญชาติ" class="input-field">
        </div>

        <div class="form-group">
            <label for="religion">ศาสนา</label>
            <input type="text" name="religion" value="{{ old('religion') }}" placeholder="ศาสนา" class="input-field">
        </div>

        <div class="form-group">
            <label for="education">ระดับการศึกษา</label>
            <select name="education" id="education" class="input-field">
                <option value="" disabled {{ old('education') ? '' : 'selected' }}>ระดับการศึกษา</option>
                <option value="high_school" {{ old('education') == 'high_school' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 6</option>
                <option value="bachelor" {{ old('education') == 'bachelor' ? 'selected' : '' }}>ปริญญาตรี</option>
                <option value="master" {{ old('education') == 'master' ? 'selected' : '' }}>ปริญญาโท</option>
                <option value="doctorate" {{ old('education') == 'doctorate' ? 'selected' : '' }}>ปริญญาเอก</option>
                <option value="diploma" {{ old('education') == 'diploma' ? 'selected' : '' }}>ปวส.</option>
                <option value="diploma" {{ old('education') == 'diploma' ? 'selected' : '' }}>ปวช.</option>
                <option value="diploma" {{ old('education') == 'diploma' ? 'selected' : '' }}>อนุปริญญา</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">โทรศัพท์</label>
            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="โทรศัพท์" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="email">อีเมล</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" placeholder="อีเมล" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="address">ที่อยู่</label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="ที่อยู่" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="bio">ข้อมูลส่วนตัวเพิ่มเติม</label>
            <textarea name="bio" placeholder="ข้อมูลส่วนตัว" class="input-field" rows="4">{{ old('bio') }}</textarea>
        </div>

        <button type="submit" class="btn-submit">บันทึกข้อมูล</button>
    </form>

    <div id="toast" class="toast">บันทึกข้อมูลเรียบร้อยแล้ว!</div>

    <script>
        function showToast(message = "บันทึกข้อมูลเรียบร้อยแล้ว!") {
            const toast = document.getElementById('toast');
            toast.innerText = message;
            toast.classList.add('show');
            setTimeout(() => { toast.classList.remove('show'); }, 3000);
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('avatar-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection