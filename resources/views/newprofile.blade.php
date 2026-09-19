@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/newprofile.css') }}?v={{ filemtime(public_path('css/newprofile.css')) }}">
@endpush

@section('content')
    <h1 class="profile-title">ข้อมูลส่วนตัว</h1>

    <form name="profileForm" action="" method="post" class="profile" onsubmit="handleFormSubmit(event)">
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
            <input type="text" name="fname" placeholder="ชื่อ" class="input-field">
        </div>

        <div class="form-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="lname" placeholder="นามสกุล" class="input-field">
        </div>

        <div class="form-group full-width">
            <label>เพศ</label>
            <div class="gender-group">
                <label class="radio-item"><input type="radio" name="gender" value="male" class="Radio"> ชาย</label>
                <label class="radio-item"><input type="radio" name="gender" value="female" class="Radio"> หญิง</label>
                <label class="radio-item"><input type="radio" name="gender" value="LGBTQIA+" class="Radio"> LGBTQIA+</label>
            </div>
        </div>

        <div class="form-group full-width">
            <label>วันเกิด</label>
            <div class="birthday-group">
                <select name="day" class="Birthday">
                    <option value="">วันที่</option>
                    @for ($day = 1; $day <= 31; $day++)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endfor
                </select>
                <select name="month" class="Birthday">
                    <option value="">เดือน</option>
                    @php
                        $months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'];
                    @endphp
                    @foreach ($months as $key => $month)
                        <option value="{{ $key }}">{{ $month }}</option>
                    @endforeach
                </select>
                <select name="year" class="Birthday">
                    <option value="">พ.ศ.</option>
                    @for ($year = date('Y') + 543; $year >= 2500; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="nationality">สัญชาติ</label>
            <input type="text" name="nationality" placeholder="สัญชาติ" class="input-field">
        </div>

        <div class="form-group">
            <label for="religion">ศาสนา</label>
            <input type="text" name="religion" placeholder="ศาสนา" class="input-field">
        </div>

        <div class="form-group">
            <label for="education">ระดับการศึกษา</label>
            <select name="education" id="education" class="input-field">
                <option value="" disabled selected>ระดับการศึกษา</option>
                <option value="high_school">มัธยมศึกษาปีที่ 6</option>
                <option value="bachelor">ปริญญาตรี</option>
                <option value="master">ปริญญาโท</option>
                <option value="doctorate">ปริญญาเอก</option>
                <option value="diploma">ปวส.</option>
                <option value="diploma">ปวช.</option>
                <option value="diploma">อนุปริญญา</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">โทรศัพท์</label>
            <input type="tel" name="phone" placeholder="โทรศัพท์" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="email">อีเมล</label>
            <input type="email" name="email" placeholder="อีเมล" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="address">ที่อยู่</label>
            <input type="text" name="address" placeholder="ที่อยู่" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="bio">ข้อมูลส่วนตัวเพิ่มเติม</label>
            <textarea name="bio" placeholder="ข้อมูลส่วนตัว" class="input-field" rows="4"></textarea>
        </div>
        <form id="profileForm" action="{{ route('profile') }}" method="POST">
            @csrf
            <button type="submit" class="btn-submit">บันทึกข้อมูล</button>
        </form>
    </form>

    <div id="toast" class="toast ">บันทึกข้อมูลเรียบร้อยแล้ว!</div>

    <script>
        function showToast(message = "บันทึกข้อมูลเรียบร้อยแล้ว!") {
            const toast = document.getElementById('toast');
            toast.innerText = message;
            toast.classList.add('show');
            setTimeout(() => { toast.classList.remove('show'); }, 3000);
        }

        function handleFormSubmit(event) {
            event.preventDefault();
            showToast("บันทึกข้อมูลเรียบร้อยแล้ว!");
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