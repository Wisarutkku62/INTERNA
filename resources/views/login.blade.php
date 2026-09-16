@extends("layouts.auth")

@push('styles') 
<link rel="stylesheet" href="{{ asset('css/login.css') }}?v={{ filemtime(public_path('css/login.css')) }}">
@endpush

@section('title','Login')

@section('content')
<div class="login-page">
    
    <!-- ฝั่งซ้าย: รูปภาพ -->
    <div class="left-section">
        <img src="{{ asset('image/imagelogin_register1.png') }}" alt="Login Cover">
    </div>

    <!-- ฝั่งขวา: ฟอร์ม -->
    <div class="right-section">
        <div class="login-container">
            
            <a href="{{ url('/') }}" class="back">
                <span>‹</span> กลับสู่หน้าหลัก
            </a>

            <div class="header">
                <h1>เข้าสู่ระบบ</h1>
                <p>สำหรับนักศึกษา ผู้หางาน และบริษัทประกาศงาน</p>
            </div>

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="email" id="email" name="email" placeholder="อีเมล" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="password" id="password" name="password" placeholder="รหัสผ่าน">
                        <span class="show-password"></span>
                    </div>

                    <div class="forgot-password">
                        <a href="{{ url('/forgot-password') }}">ลืมรหัสผ่าน?</a>
                    </div>
                </div>

                <div class="buttonsubmit">
                    <button type="submit">เข้าสู่ระบบ</button>
                </div>
            </form>

            <div class="admin-info">
                ยังไม่มีบัญชี? <a href="{{ url('/register') }}">สมัครสมาชิก</a>
            </div>

        </div>
    </div>

</div>

@endsection
