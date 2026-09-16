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
                            >
                            <span class="email-validated" id="email-validated">

                            </span>
                        </div>

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
                            >

                            <span class="show-password">
                            
                            </span>
                            <span class="password-validated" id="password-validated">

                            </span>

                        </div>

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
                            >

                            <span class="show-password">
                            
                            </span>

                            <span class="password_comfirmation-validated" id="password_comfirmation-validated">

                            </span>

                        </div>

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
                        var notFill = false;
                        const email_value = document.getElementById('email').value;
                        const password_value = document.getElementById('password').value;
                        const password_comfirmation_value = document.getElementById('password_confirmation').value;
                    
                        if(email_value=="") {
                            document.getElementById("email-validated").innerHTML='กรุณากรอกอีเมล'
                            notFill = true;
                    } 
                    if(password_value=="") {
                            document.getElementById("password-validated").innerHTML='กรุณากรอกรหัสผ่าน'
                            notFill = true;
                    }
                    if(password_comfirmation_value=="") {
                            document.getElementById("password_comfirmation-validated").innerHTML='กรุณากรอกยืนยันรหัสผ่าน'
                            notFill = true;
                    }

                    if (notFill) {
                        e.preventDefault()
                    }
                    });
                    
                </script>

                <div class="admin-info">
                    หรือมีบัญชีอยู่แล้ว? <a href="{{ url('/login') }}">เข้าสู่ระบบ</a>
                </div>

            </div>

        </div>

    </div>

@endsection
