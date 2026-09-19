@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ filemtime(public_path('css/profile.css')) }}">
@endpush

@section('content')
<div class="profile-page-wrapper">
    <div class="profile-container">

        <div class="profile-left">
            <h1 id="title">ข้อมูลส่วนตัว</h1>
            <div class="picprofile">
                <img id="avatar-preview" src="{{ $user->profile_img ?? '/img/profile.png' }}" alt="Profile Picture" class="profiles">
            </div>
        </div>

        <div class="profile-right">
            <div class="profile-field half">
                <label for="fname">ชื่อ</label>
                <div class="field-value">{{ $user->fname ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="lname">นามสกุล</label>
                <div class="field-value">{{ $user->lname ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label>เพศ</label>
                <div class="field-value">{{ $user->gender ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label>วันเกิด</label>
                <div class="birthday-inputs">
                    <div class="field-value">{{ $user->birth_day ?? 'วัน' }}</div>
                    <div class="field-value">{{ $user->birth_month ?? 'เดือน' }}</div>
                    <div class="field-value">{{ $user->birth_year ?? 'ปี' }}</div>
                </div>
            </div>

            <div class="profile-field half">
                <label for="nationality">สัญชาติ</label>
                <div class="field-value">{{ $user->nationality ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="religion">ศาสนา</label>
                <div class="field-value">{{ $user->religion ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="education">ระดับการศึกษา</label>
                <div class="field-value">{{ $user->education ?? '' }}</div>
            </div>

            <div class="profile-field half">
                <label for="phone">โทรศัพท์</label>
                <div class="field-value">{{ $user->phone ?? '' }}</div>
            </div>

            <div class="profile-field">
                <label for="email">อีเมล</label>
                <div class="field-value">{{ $user->email ?? '' }}</div>
            </div>

            <div class="profile-field">
                <label for="address">ที่อยู่</label>
                <div class="field-value">{{ $user->address ?? '' }}</div>
            </div>

            <div class="profile-field bio-field">
                <label for="bio">ข้อมูลส่วนตัวเพิ่มเติม</label>
                <div class="field-value">{{ $user->bio ?? '' }}</div>
            </div>

            <a href="{{ route('newprofile') }}" class="Edit_profile">แก้ไขข้อมูล</a>
        </div>

    </div>
</div>
@endsection