@extends("layouts.auth")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}?v={{ filemtime(public_path('css/register.css')) }}">
@endpush

@section('title', 'Register')

@section('content')

<div class="login-page">

    <!-- ฝั่งซ้าย: รูปภาพ -->
    <div class="left-section">
        <img src="{{ asset('image/imagelogin_register1.png') }}" alt="Admin Login Image">
    </div>

    <!-- ฝั่งขวา: ฟอร์ม -->
    <div class="right-section">
        <div class="login-container">

            <!-- กลับหน้าหลัก -->
            <a href="{{ url('/') }}" class="back">
                <span>‹</span>
                กลับสู่หน้าหลัก
            </a>

            <!-- Header -->
            <div class="header">
                <h1>ลงทะเบียน</h1>
                <p>
                    สำหรับนักศึกษา ผู้หางาน และบริษัทประกาศงาน
                </p>
            </div>

            <!-- Register Form -->
            <form action="{{ route('auth.register') }}" method="POST" id="RegForm">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        อีเมล
                    </label>

                    <div class="input-box">
                        <span class="icon">
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="อีเมล"
                            value="{{ old('email') }}"
                        >

                        <span class="email-validated" id="email-validated">
                        </span>
                    </div>
                </div>

                <!-- Password -->
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

                <!-- Confirm Password -->
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
                            placeholder="ยืนยันรหัสผ่าน"
                        >

                        <span class="show-password">
                        </span>

                        <span
                            class="password_comfirmation-validated"
                            id="password_comfirmation-validated">
                        </span>
                    </div>
                </div>

                <!-- Submit -->
                <div class="buttonsubmit">
                    <button type="submit">
                        ลงทะเบียน
                    </button>
                </div>

            </form>

            <!-- ไปหน้า Login -->
            <div class="admin-info">
                หรือมีบัญชีอยู่แล้ว?
                <a href="{{ route('login') }}">
                    เข้าสู่ระบบ
                </a>
            </div>

        </div>
    </div>

</div>

<script>
    let RegFormJs = document.getElementById('RegForm');

    RegFormJs.addEventListener('submit', (e) => {

        let notFill = false;

        const email_value = document.getElementById('email').value;
        const password_value = document.getElementById('password').value;
        const password_comfirmation_value =
            document.getElementById('password_confirmation').value;

        if (email_value == "") {
            document.getElementById("email-validated").innerHTML =
                'กรุณากรอกอีเมล';

            notFill = true;
        }

        if (password_value == "") {
            document.getElementById("password-validated").innerHTML =
                'กรุณากรอกรหัสผ่าน';

            notFill = true;
        }

        if (password_comfirmation_value == "") {
            document.getElementById("password_comfirmation-validated").innerHTML =
                'กรุณากรอกยืนยันรหัสผ่าน';

            notFill = true;
        }

        if (notFill) {
            e.preventDefault();
        }
    });
</script>

@endsection