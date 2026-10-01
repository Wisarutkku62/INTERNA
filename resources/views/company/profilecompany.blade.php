@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profilecompany.css') }}">
@endpush

@section('content')

    <form name="profileForm" action="{{route('company.edit.profile.save')}}" method="POST" class="profile">
        @csrf
        @method('PUT')
        <div class="avatar-section full-width">
            <div class="avatar-wrapper">
                <img src="{{ isset($company->company_profile) && $company->company_profile ? asset('storage/' . $company->company_profile) : asset('img/profile.png') }}" alt="Profile Picture">
            </div>
            <div class="file-upload">
                <label for="company_profile" class="btn-upload">เลือกรูปโปรไฟล์บริษัท</label>
                <input type="file" id="company_profile" name="company_profile" accept="image/*" class="PictureProfile">
            </div>
        </div>

        <div class="form-group full-width">
            <label for="company_name">ชื่อบริษัท</label>
            <input type="text" id="company_name" name="company_name" value="{{ $user?->company?->company_name ?? '' }}" placeholder="ชื่อบริษัท" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="company_address">ที่อยู่บริษัท</label>
            <input type="text" id="company_address" name="company_address" value="{{ $user?->company?->company_address ?? '' }}" placeholder="ที่อยู่บริษัท" class="input-field">
        </div>

        <div class="form-group">
            <label for="company_website">เว็บไซต์บริษัท</label>
            <input type="url" id="company_website" name="company_website" value="{{ $user?->company?->company_website ?? '' }}" placeholder="https://example.com" class="input-field">
        </div>

        <div class="form-group">
            <label for="contact_name">ชื่อผู้ติดต่อ</label>
            <input type="text" id="contact_name" name="contact_name" value="{{ $user?->company?->contact_name ?? '' }}" placeholder="ชื่อผู้ติดต่อ" class="input-field">
        </div>

        <div class="form-group">
            <label for="contact_position">ตำแหน่งผู้ติดต่อ</label>
            <input type="text" id="contact_position" name="contact_position" value="{{ $user?->company?->contact_position ?? '' }}" placeholder="ตำแหน่งผู้ติดต่อ" class="input-field">
        </div>

        <div class="form-group">
            <label for="contact_phone">โทรศัพท์ผู้ติดต่อ</label>
            <input type="tel" id="contact_phone" name="contact_phone" value="{{ $user?->company?->contact_phone ?? '' }}" placeholder="โทรศัพท์" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="contact_email">อีเมลผู้ติดต่อ</label>
            <input type="email" id="contact_email" name="contact_email" value="{{ $user?->company?->contact_email ?? '' }}" placeholder="อีเมล" class="input-field">
        </div>

        <div class="form-group full-width">
            <label for="company_description">รายละเอียดบริษัท</label>
            <textarea id="company_description" name="company_description" placeholder="รายละเอียดบริษัท" class="input-field" rows="4">{{ $user?->company?->company_description ?? '' }}</textarea>
        </div>

       
    </form>
@endsection