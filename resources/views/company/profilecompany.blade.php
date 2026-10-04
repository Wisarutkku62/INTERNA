@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profilecompany.css') }}">
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
            <div class="profile-field">
                <label for="company_name">ชื่อบริษัท</label>
                <div class="field-value">{{ $user->company->company_name ?? '-' }}</div>
            </div>

            <div class="profile-field">
                <label for="company_website">เว็บไซต์บริษัท</label>
                <div class="field-value">
                    @if(!empty($user->company->company_website))
                        <a href="{{ $user->company->company_website }}" target="_blank">{{ $user->company->company_website }}</a>
                    @else
                        -
                    @endif
                </div>
            </div>

            <div class="profile-field bio-field">
                <label for="company_description">รายละเอียดบริษัท</label>
                <div class="field-value">{{ $user->company->company_description ?? '-' }}</div>
            </div>

            <div class="profile-field">
                <label for="company_address">ที่อยู่บริษัท</label>
                <div class="field-value">{{ $user->company->company_address ?? '-' }}</div>
            </div>

            <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
            <h3 style="margin-bottom: 15px; color: #333;">ข้อมูลผู้ติดต่อ</h3>

            <div class="profile-field half">
                <label for="contact_name">ชื่อผู้ติดต่อ</label>
                <div class="field-value">{{ $user->company->contact_name ?? '-' }}</div>
            </div>

            <div class="profile-field half">
                <label for="contact_position">ตำแหน่งผู้ติดต่อ</label>
                <div class="field-value">{{ $user->company->contact_position ?? '-' }}</div>
            </div>

            <div class="profile-field half">
                <label for="contact_phone">เบอร์โทรศัพท์ผู้ติดต่อ</label>
                <div class="field-value">{{ $user->company->contact_phone ?? '-' }}</div>
            </div>

            <div class="profile-field half">
                <label for="contact_email">อีเมลผู้ติดต่อ</label>
                <div class="field-value">{{ $user->company->contact_email ?? $user->email }}</div>
            </div>

        </div>

    </div>
</div>
@endsection