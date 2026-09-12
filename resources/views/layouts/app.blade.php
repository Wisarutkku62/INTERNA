<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTERNA : หาที่ฝึกงาน งานเด็กจบใหม่ @yield('title','INTERNA : หาที่ฝึกงาน งานเด็กจบใหม่')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/apps.css') }}">
</head>
<body>
    <nav class="navbar">
    <a href="#" class="logo">
      <svg class="logo-icon" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM8 10a2 2 0 100 4 2 2 0 000-4zm8 0a2 2 0 100 4 2 2 0 000-4zm-4 3c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
      </svg>
      <span class="logo-text">INTERNA</span>
    </a>

    <ul class="nav-menu">
      <li class="nav-item">
        <a href="#" class="nav-link">
          ค้นหาตำแหน่งงาน
          <svg class="arrow-icon" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
        </a>
      </li>
      <li class="nav-item"><a href="#" class="nav-link">ค้นหานักศึกษาฝึกงาน</a></li>
      <li class="nav-item"><a href="#" class="nav-link">ค้นหาผู้หางาน</a></li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          สำหรับบริษัท
        </a>
      </li>
      <li class="nav-item"><a href="#" class="nav-link">ติดต่อเรา</a></li>
    </ul>

    <div class="nav-actions">
      <a href="#" class="btn-login">เข้าสู่ระบบ</a>
      <a href="#" class="btn-regis">ลงทะเบียน</a>
    </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
