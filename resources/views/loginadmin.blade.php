@extends('layouts.auth')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/loginadmin.css') }}?v={{ filemtime(public_path('css/loginadmin.css')) }}">
@endpush

@section('content')
    <div class="login-page">
        <div class="picture"></div>
        <div class="Login">
            <div class="Login-card">
                <div class="Login_left">

                    <div class="head">
                        <a href="{{ route('home')}}" class="back-btn">
                            <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icon">
                            <span>กลับสู่หน้าหลัก</span>
                        </a>
                    </div>

                    <h2 class="Login-title">เข้าสู่ระบบแอดมิน</h2>
                    <h3>ยินดีต้อนรับสู่ระบบแอดมิน</h3>
                </div>

                <div class="form">
                    <form action="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>

                        <button type="submit">เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection