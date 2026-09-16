@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/loginmain.css') }}?v={{ filemtime(public_path('css/loginmain.css')) }}">
@endpush

@section('content')
<div class="login-page">
    <div class="picture"></div>
    <div class="Login">
        <div class="Login_left">

            <div class="Back_to_Menu"><a href="#">
                <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icon"> กลับสู่หน้าหลัก
            </a></div>
            <h2 class="Login-title">เข้าสู่ระบบแอดมิน</h2>
            <h3>ยินดีต้อนรับสู่ระบบแอดมิน</h3>
        </div>

        <div class="form">
            <form action="">
                <input type="text" placeholder="Username" required>
                <input type="password" placeholder="Password" required>
                <button type="submit">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>
</div>
@endsection