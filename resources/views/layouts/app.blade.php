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
    @stack('styles')
</head>
<body>
    <nav class="navbar">
    <a href="#" class="logo">
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
<<<<<<< HEAD
  </nav>
</nav>
<main>@yield("content")</main>
=======
    </nav>
    <main>
        @yield('content')
    </main>
>>>>>>> f91b86449cc3701821befded6ac3dd7be6734e9a
</body>
</html>
