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

    <div class= "toast">
        <svg class="reg_success_toast_icon1"></svg>
        <div class="reg_success_toast_message">
            <span class= "reg_success_toast_message_header">Success</span>
            <span class= "reg_success_toast_message_text">Register Successfully</span>
        </div>
        <svg class="reg_success_toast_icon2"></svg>
        <div class="progress"></div>
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
            @if(session('success'))
                <p><strong>{{ session('success') }}</strong></p>
            @endif
            <form action="{{ route('auth.login') }}" method="POST" id="LoginForm">
                @csrf
                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="text" id="email" name="email" placeholder="อีเมล" class=''>
                    </div>
                    <span class="email-validated">
                    
                    </span>
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="password" id="password" name="password" placeholder="รหัสผ่าน">
                        <span class="show-password"></span>
                    </div>

                    <span class="password-validated">
                    
                    </span>

                    <div class="forgot-password">
                        <a href="{{ url('/forgot-password') }}">ลืมรหัสผ่าน?</a>
                    </div>
                </div>

                <div class="buttonsubmit">
                    <button type="submit">เข้าสู่ระบบ</button>
                </div>
            </form>

            <script>
                    let LoginFormJs = document.getElementById('LoginForm')
                    LoginFormJs.addEventListener('submit', (e) => {
                        let EmailNotFill = false;
                        let PasswordNotFill = false;
                        const email_value = document.getElementById('email').value;
                        const password_value = document.getElementById('password').value;
                    
                    if(email_value=="") {
                        document.querySelector(".email-validated").innerHTML='กรุณากรอกอีเมล'
                        EmailNotFill = true;
                        document.getElementById('email').classList.add('input-error');
                    } else if (!email_value == "") {
                        document.querySelector(".email-validated").innerHTML=''
                        EmailNotFill = false;
                        document.getElementById('email').classList.remove('input-error');
                    }

                    if(password_value=="") {
                        document.querySelector(".password-validated").innerHTML='กรุณากรอกรหัสผ่าน'
                        PasswordNotFill = true;
                        document.getElementById('password').classList.add('input-error');
                    }else if (!password_value == "") {
                        document.querySelector(".password-validated").innerHTML=''
                        PasswordNotFill = false;
                        document.getElementById('password').classList.remove('input-error');
                    }

                    if (EmailNotFill || PasswordNotFill) {
                        e.preventDefault()
                    }
                    });
                    
                </script>

            <div class="admin-info">
                ยังไม่มีบัญชี? <a href="{{ route('auth.showRegister') }}">สมัครสมาชิก</a>
            </div>

        </div>
    </div>

</div>

@endsection
