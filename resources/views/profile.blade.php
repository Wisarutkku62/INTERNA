@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-page-wrapper">
    <div class="profile-container">

        <div class="profile-left">
            <h1 id="title">ข้อมูลส่วนตัว</h1>
            <div class="picprofile">
                <img id="avatar-preview" src="{{ $user->student->student_img ?? '/img/profile.png' }}" alt="Profile Picture" class="profiles">
            </div>
        </div>

        <div class="profile-right">
            <div class="profile-field half">
                <label for="fname">ชื่อ</label>
                <div class="field-value">{{ $user->student->student_fname ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="lname">นามสกุล</label>
                <div class="field-value">{{ $user->student->student_lname ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label>เพศ</label>
                <div class="field-value">{{ $user->student->student_gender ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label>วันเกิด</label>
                <div class="birthday-inputs">
                    @php
                        $birthday = $user->student->student_birthday ?? null;
                        $day = $birthday ? \Carbon\Carbon::parse($birthday)->format('j') : 'วัน';
                        $month = $birthday ? \Carbon\Carbon::parse($birthday)->format('n') : 'เดือน';
                        $year = $birthday ? (\Carbon\Carbon::parse($birthday)->format('Y') + 543) : 'ปี';
                        
                        $months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'];
                    @endphp
                    <div class="field-value">{{ $day }}</div>
                    <div class="field-value">{{ is_numeric($month) ? ($months[$month] ?? $month) : $month }}</div>
                    <div class="field-value">{{ $year }}</div>
                </div>
            </div>

            <div class="profile-field half">
                <label for="nationality">สัญชาติ</label>
                <div class="field-value">{{ $user->student->student_nationality ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="religion">ศาสนา</label>
                <div class="field-value">{{ $user->student->student_religion ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="education">ระดับการศึกษา</label>
                <div class="field-value">{{ $user->student->student_degree ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="phone">โทรศัพท์</label>
                <div class="field-value">{{ $user->student->student_phone ?? '' }}</div>
            </div>

            <div class="profile-field">
                <label for="email">อีเมล</label>
                <div class="field-value">{{ $user->student->student_email ?? $user->email }}</div>
            </div>

            <div class="profile-field">
                <label for="address">ที่อยู่</label>
                <div class="field-value">{{ $user->student->student_address ?? '' }}</div>
            </div>

            <div class="profile-field bio-field">
                <label for="bio">ข้อมูลส่วนตัวเพิ่มเติม</label>
                <div class="field-value">{{ $user->student->student_bio ?? '' }}</div>
            </div>

            <a href="{{ route('newprofile') }}" class="Edit_profile">แก้ไขข้อมูล</a>
        </div>

    </div>
</div>
@endsection