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
                        <a href="{{ route('index')}}" class="back-btn">
                            <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icon">
                            <span>กลับสู่หน้าหลัก</span>
                        </a>
                    </div>

                    <h2 class="Login-title">เข้าสู่ระบบแอดมิน</h2>
                    <h3>ยินดีต้อนรับสู่ระบบแอดมิน</h3>
                </div>

                <div class="form">
                    <form action="{{ route('auth.loginAdmin') }}" method="POST" id="LoginAdminForm">
                        @csrf
                        <div class="form-group">
                            <label for="email">อีเมล</label>
                            <div class="input-box" id="input-box-email">
                                <input type="text" id="email" name="email" placeholder="อีเมล" class='' value="{{old('email')}}">
                            </div>
                            <span class="email-validated">
                    
                            </span>
                        </div>


                        <div class="form-group">
                            <label for="password">รหัสผ่าน</label>
                            <div class="input-box" id="input-box-password">
                                <input type="password" id="password" name="password" placeholder="รหัสผ่าน">
                            </div>
                            <span class="password-validated">
                    
                            </span>
                        </div>


                        <button type="submit">เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
        @error('email')
            <script>
                document.querySelector(".email-validated").innerHTML='{{$message}}'
                document.querySelector(".password-validated").innerHTML='{{$message}}'
                document.getElementById('input-box-email').classList.add('input-error');
                document.getElementById('input-box-password').classList.add('input-error');
            </script>
        @enderror
        @error('password')
            <script>
                document.querySelector(".email-validated").innerHTML='{{$message}}'
                document.querySelector(".password-validated").innerHTML='{{$message}}'
                document.getElementById('input-box-email').classList.add('input-error');
                document.getElementById('input-box-password').classList.add('input-error');
            </script>
        @enderror
<script>
    let LoginAdminFormJS = document.getElementById('LoginAdminForm');
    
    if (LoginAdminFormJS) {
        LoginAdminFormJS.addEventListener('submit', function(e) {
            let EmailNotFill = false;
            let PasswordNotFill = false;

            const email_value = document.getElementById('email').value.trim();
            const password_value = document.getElementById('password').value.trim();

            // เช็กช่อง Email
            if (email_value === "") {
                document.querySelector(".email-validated").innerHTML = 'กรุณากรอกอีเมล';
                EmailNotFill = true;
                document.getElementById('input-box-email').classList.add('input-error');
            } else {
                document.querySelector(".email-validated").innerHTML = '';
                document.getElementById('input-box-email').classList.remove('input-error');
            }

            // เช็กช่อง Password
            if (password_value === "") {
                document.querySelector(".password-validated").innerHTML = 'กรุณากรอกรหัสผ่าน';
                PasswordNotFill = true;
                document.getElementById('input-box-password').classList.add('input-error');
            } else {
                document.querySelector(".password-validated").innerHTML = '';
                document.getElementById('input-box-password').classList.remove('input-error');
            }

            // ถ้้ายังไม่กรอกช่องใดช่องหนึ่ง ให้หยุดการส่งฟอร์ม
            if (EmailNotFill || PasswordNotFill) {
                e.preventDefault();
            }
        });
    }
</script>
    </div>
@endsection