@extends('layouts.app')
@use('Carbon\Carbon')

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

@php
    $currentStudent = $student ?? $user?->student ?? null;
@endphp

<form name="profileForm" action="{{ route('profile.save') }}" method="POST" class="profile" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <a href="{{ url()->previous() }}" style="text-decoration: none;">← ย้อนกลับ</a>
    
    <div class="avatar-section full-width">
        <div class="avatar-wrapper">
            <img id="avatar-preview" src="{{ $currentStudent?->student_profile ? asset('storage/' . $currentStudent->student_profile) : asset('img/profile.png') }}" alt="Profile Picture">
        </div>
        <div class="file-upload">
            <label for="profile_picture" class="btn-upload">เลือกรูปโปรไฟล์</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)" class="PictureProfile">
        </div>
    </div>

    <div class="form-group">
        <label for="fname">ชื่อ</label>
        <input type="text" name="fname" value="{{ $currentStudent?->student_fname ?? '' }}" placeholder="ชื่อ" class="input-field">
    </div>

    <div class="form-group">
        <label for="lname">นามสกุล</label>
        <input type="text" name="lname" value="{{ $currentStudent?->student_lname ?? '' }}" placeholder="นามสกุล" class="input-field">
    </div>

    <div class="form-group full-width">
        <label>เพศ</label>
        <div class="gender-group">
            <label class="radio-item"><input type="radio" name="gender" value="ชาย" class="Radio" {{ ($currentStudent?->student_gender ?? '') == 'ชาย' ? 'checked' : '' }}> ชาย</label>
            <label class="radio-item"><input type="radio" name="gender" value="หญิง" class="Radio" {{ ($currentStudent?->student_gender ?? '') == 'หญิง' ? 'checked' : '' }}> หญิง</label>
            <label class="radio-item"><input type="radio" name="gender" value="LGBTQIA+" class="Radio" {{ ($currentStudent?->student_gender ?? '') == 'LGBTQIA+' ? 'checked' : '' }}> LGBTQIA+</label>
        </div>
    </div>

    <div class="form-group full-width">
        <label>วันเกิด</label>
        <div class="birthday-group">
            <select name="day" class="Birthday">
                <option value="">วันที่</option>
                @for ($day = 1; $day <= 31; $day++)
                    <option value="{{ $day }}" {{ ($currentStudent?->student_birthday ? Carbon::parse($currentStudent->student_birthday)->format('d') : '') == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endfor
            </select>
            <select name="month" class="Birthday">
                <option value="">เดือน</option>
                @php
                $months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'];
                @endphp
                @foreach ($months as $key => $month)
                <option value="{{ $key }}" {{ ($currentStudent?->student_birthday ? Carbon::parse($currentStudent->student_birthday)->format('n') : null) == $key ? 'selected' : '' }}>{{ $month }}</option>
                @endforeach
            </select>
            <select name="year" class="Birthday">
                <option value="">ค.ศ.</option>
                @for ($year = date('Y'); $year >= 1950; $year--)
                <option value="{{ $year }}" {{ ($currentStudent?->student_birthday ? Carbon::parse($currentStudent->student_birthday)->format('Y') : '') == $year ? 'selected' : '' }}>
                    {{ $year }}
                </option>
                @endfor
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="nationality">สัญชาติ</label>
        <input type="text" name="nationality" value="{{ $currentStudent?->student_nationality ?? '' }}" placeholder="สัญชาติ" class="input-field">
    </div>

    <div class="form-group">
        <label for="religion">ศาสนา</label>
        <input type="text" name="religion" value="{{ $currentStudent?->student_religion ?? '' }}" placeholder="ศาสนา" class="input-field">
    </div>

    <div class="form-group">
        <label for="education">ระดับการศึกษา</label>
        <select name="education" id="education" class="input-field">
            <option value="" disabled>ระดับการศึกษา</option>
            <option value="ต่ำกว่ามัธยมศึกษาปีที่ 6" {{ ($currentStudent?->student_degree ?? '') == 'ต่ำกว่ามัธยมศึกษาปีที่ 6' ? 'selected' : '' }}>ต่ำกว่ามัธยมศึกษาปีที่ 6</option>
            <option value="มัธยมศึกษาปีที่ 6" {{ ($currentStudent?->student_degree ?? '') == 'มัธยมศึกษาปีที่ 6' ? 'selected' : '' }}>มัธยมศึกษาปีที่ 6</option>
            <option value="ปวช." {{ ($currentStudent?->student_degree ?? '') == 'ปวช.' ? 'selected' : '' }}>ปวช.</option>
            <option value="ปวส." {{ ($currentStudent?->student_degree ?? '') == 'ปวส.' ? 'selected' : '' }}>ปวส.</option>
            <option value="อนุปริญญา" {{ ($currentStudent?->student_degree ?? '') == 'อนุปริญญา' ? 'selected' : '' }}>อนุปริญญา</option>
            <option value="ปริญญาตรี" {{ ($currentStudent?->student_degree ?? '') == 'ปริญญาตรี' ? 'selected' : '' }}>ปริญญาตรี</option>
            <option value="ปริญญาโท" {{ ($currentStudent?->student_degree ?? '') == 'ปริญญาโท' ? 'selected' : '' }}>ปริญญาโท</option>
            <option value="ปริญญาเอก" {{ ($currentStudent?->student_degree ?? '') == 'ปริญญาเอก' ? 'selected' : '' }}>ปริญญาเอก</option>
        </select>
    </div>

    <div class="form-group">
        <label for="phone">โทรศัพท์</label>
        <input type="tel" name="phone" value="{{ $currentStudent?->student_phone ?? '' }}" placeholder="โทรศัพท์" class="input-field">
    </div>

    <div class="form-group full-width">
        <label for="email">อีเมล</label>
        <div class="input-field">{{ $currentStudent?->student_email ?? $user?->email ?? '' }}</div>
    </div>

    <div class="form-group full-width">
        <label for="address">ที่อยู่</label>
        <input type="text" name="address" value="{{ $currentStudent?->student_address ?? '' }}" placeholder="ที่อยู่" class="input-field">
    </div>

    <div class="form-group full-width">
        <label for="bio">ข้อมูลส่วนตัวเพิ่มเติม</label>
        <textarea name="bio" placeholder="ข้อมูลส่วนตัว" class="input-field" rows="4">{{ $currentStudent?->student_bio ?? '' }}</textarea>
    </div>

    <input type="hidden" name="student_id" value="{{ $currentStudent?->id ?? '' }}">
    <button type="submit" class="btn-submit">บันทึกข้อมูล</button>
</form>

<div id="toast" class="toast">บันทึกข้อมูลเรียบร้อยแล้ว!</div>

<script>
    function showToast(message = "บันทึกข้อมูลเรียบร้อยแล้ว!") {
        const toast = document.getElementById('toast');
        toast.innerText = message;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('avatar-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection