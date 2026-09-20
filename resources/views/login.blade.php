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

            <form action="{{ route('auth.login') }}" method="POST" id="LoginForm">
                @csrf
                <div class="form-group">
                    <label for="email">อีเมล</label>
                    <div class="input-box" id="input-box-email">
                        <!-- <span class="icon"></span> -->
                        <input type="text" id="email" name="email" placeholder="อีเมล" class='' value="{{old('email')}}">
                    </div>
                    <span class="email-validated">
                    
                    </span>
                </div>

                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <div class="input-box" id="input-box-password">
                        <!-- <span class="icon"></span> -->
                        <input type="password" id="password" name="password" placeholder="รหัสผ่าน" >
                        <!-- <span class="show-password"></span> -->
                    </div>

                    <span class="password-validated">
                    
                    </span>

                    <div class="forgot-password">
                        <a href="{{ url('/forgot-password') }}">ลืมรหัสผ่าน?</a>
                    </div>
                </div>

                <div class="buttonsubmit">
                    <button type="submit" id="loginBtn ">เข้าสู่ระบบ</button>
                </div>
            </form>

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
            
            @if (session('success'))
                <div class="toast">
                    <div class="toast-content">
                        <span class="check-symbol">&#10003;</span>
                        <div class="toast-message">
                        <span class="text text-1">Success</span>
                        <span class="text text-2">Register Successfully</span>
                        </div>
                    </div>

                    <span class="close-symbol">&times;</span>
                    <div class="progress"></div>
                </div>

                <script>
                    const toast = document.querySelector('.toast');
                    const closeBtn = document.querySelector('.close-symbol');
                    // let toastTimeout;

                    toast.classList.add('active');

                    setTimeout(() =>{
                        toast.classList.remove('active');
                    }, 3000);

                    closeBtn.addEventListener('click', () => {
                    toast.classList.remove('active');
                    // clearTimeout(toastTimeout);
                    });
                    

                    // setTimeout(() => {
                    // window.location.href = '/'; 
                    // }, 2000);

                    // clearTimeout(toastTimeout);
                    // toastTimeout = setTimeout(() => {
                    //     toast.classList.remove('active');
                    // }, 1500);
                </script>
            @endif

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
                            document.getElementById('input-box-email').classList.add('input-error');
                        } else if (!email_value == "") {
                            document.querySelector(".email-validated").innerHTML=''
                            EmailNotFill = false;
                            document.getElementById('input-box-email').classList.remove('input-error');
                        }

                        if(password_value=="") {
                            document.querySelector(".password-validated").innerHTML='กรุณากรอกรหัสผ่าน'
                            PasswordNotFill = true;
                            document.getElementById('input-box-password').classList.add('input-error');
                        }else if (!password_value == "") {
                            document.querySelector(".password-validated").innerHTML=''
                            PasswordNotFill = false;
                            document.getElementById('input-box-password').classList.remove('input-error');
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