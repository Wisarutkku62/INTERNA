@extends("layouts.auth")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}?v={{ filemtime(public_path('css/register.css')) }}">
@endpush

@section('title','Register')

@section('content')
    <div class="login-page">
        <div class="left-section">
            <img src="{{ asset('image/imagelogin_register1.png') }}" alt="Admin Login Image">
        </div>

        <div class="right-section">

            <div class="login-container">

                <a href="{{ url('/') }}" class="back"" class="back">
                    <span>‹</span>
                    กลับสู่หน้าหลัก
                </a>

                <div class="header">

                    <h1>ลงทะเบียน</h1>

                    <p>
                        สำหรับนักศึกษา ผู้หางาน และบริษัทประกาศงาน
                    </p>

                </div>


                <form action="{{ route('auth.register') }}" method='POST' id="RegForm">
                    @csrf
                    <div class="form-group">

                        <label for="email">
                            อีเมล
                        </label>

                        <div class="input-box">

                            <span class="icon">
                                
                            </span>

                            <input
                                type="text"
                                id="email"
                                name="email"
                                placeholder="อีเมล"
                                class=""
                            >
                        </div>
                        <span class="email-validated" id="email-validated">

                        </span>
                    </div>


                    <div class="form-group">

                        <label for="password">
                            รหัสผ่าน
                        </label>

                        <div class="input-box">

                            <span class="icon">
                                
                            </span>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="รหัสผ่าน"
                                class=""
                            >

                            <span class="show-password">
                            
                            </span>
                        </div>

                        <span class="password-validated" id="password-validated">

                        </span>
                    </div>

                    <div class="form-group">

                        <label for="password_confirmation">
                            ยืนยันรหัสผ่าน
                        </label>

                        <div class="input-box">

                            <span class="icon">
                                
                            </span>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="รหัสผ่าน"
                                class=""
                            >

                            <span class="show-password">
                            
                            </span>
                        </div>

                    <span class="password_confirmation-validated" id="password_confirmation-validated">

                    </span>
                    </div>

                    <div class="buttonsubmit">
                        <button type="submit">
                            ลงทะเบียน
                        </button>
                    </div>
                

                </form>
                <script>
                    let RegFormJs = document.getElementById('RegForm')
                    RegFormJs.addEventListener('submit', (e) => {
                        let EmailNotFill = false;
                        let PasswordNotFill = false;
                        let PasswordConfirmationNotFill = false;
                        let PasswordNotEight = false;
                        const email_value = document.getElementById('email').value;
                        const password_value = document.getElementById('password').value;
                        const password_confirmation_value = document.getElementById('password_confirmation').value;
                    
                    if(email_value=="") {
                        document.querySelector(".email-validated").innerHTML='กรุณากรอกอีเมล'
                        EmailNotFill = true;
                        document.getElementById('email').classList.add('input-error')
                    } else if (!email_value == "") {
                        document.querySelector(".email-validated").innerHTML=''
                        EmailNotFill = false;
                        document.getElementById('email').classList.remove('input-error')
                    }

                    if(password_value=="") {
                        document.querySelector(".password-validated").innerHTML='กรุณากรอกรหัสผ่าน'
                        PasswordNotFill = true;
                        document.getElementById('password').classList.add('input-error')
                    }else if (!password_value == "") {
                        document.querySelector(".password-validated").innerHTML=''
                        PasswordNotFill = false;
                        document.getElementById('password').classList.remove('input-error')
                    }

                    if(password_confirmation_value=="") {
                        document.querySelector(".password_confirmation-validated").innerHTML='กรุณากรอกยืนยันรหัสผ่าน'
                        PasswordConfirmationNotFill = true;
                        document.getElementById('password_confirmation').classList.add('input-error')
                    }else if (!password_confirmation_value == "") {
                        document.querySelector(".password_confirmation-validated").innerHTML=''
                        PasswordConfirmationNotFill = false;
                        document.getElementById('password_confirmation').classList.remove('input-error')
                    }

                    if (PasswordNotFill == false) {
                        if(password_value.length < 8 ) {
                            document.querySelector('.password-validated').innerHTML = 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว'
                            PasswordNotEight = true;
                            document.getElementById('password').classList.add('input-error')
                            document.getElementById('password_confirmation').classList.add('input-error')
                        } else if (password_value.length >= 8) {
                            document.querySelector('.password-validated').innerHTML = ''
                            PasswordNotEight = false;
                            document.getElementById('password').classList.remove('input-error')
                            document.getElementById('password_confirmation').classList.remove('input-error')
                        }
                    }
                    
                    if (PasswordConfirmationNotFill == false) {
                        if (!PasswordNotEight) {
                            if (password_value !== password_confirmation_value) {
                            document.querySelector('.password_confirmation-validated').innerHTML = 'รหัสผ่านไม่ตรงกัน'
                            document.querySelector('.password-validated').innerHTML = 'รหัสผ่านไม่ตรงกัน'
                            PasswordConfirmationNotFill = true;
                            document.getElementById('password').classList.add('input-error')
                            document.getElementById('password_confirmation').classList.add('input-error')
                        } else if (password_value === password_confirmation_value) {
                            document.querySelector('.password_confirmation-validated').innerHTML = ''
                            document.querySelector('.password-validated').innerHTML = ''
                            PasswordConfirmationNotFill = false;
                            document.getElementById('password').classList.remove('input-error')
                            document.getElementById('password_confirmation').classList.remove('input-error')
                        }
                        } else if (PasswordNotEight) {
                            document.querySelector('.password_confirmation-validated').innerHTML = 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว'
                            document.getElementById('password_confirmation').classList.add('input-error')
                        }

                    }


                    if (EmailNotFill || PasswordNotFill || PasswordConfirmationNotFill || PasswordNotEight) {
                        e.preventDefault()
                    }
                    });
                    
                </script>

                <div class="admin-info">
                    หรือมีบัญชีอยู่แล้ว? <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
                </div>

            </div>

        </div>

    </div>

@endsection
