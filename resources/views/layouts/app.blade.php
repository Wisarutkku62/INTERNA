<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','INTERNA : หาที่ฝึกงาน งานเด็กจบใหม่')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/apps.css') }}">
    @stack('styles')
</head>
<body>
    <header>
      <nav class="navbar">
        <a href="{{ route('index')}}" class="logo">
          <span class="logo-text">INTERNA</span>
        </a>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
    
      <div class="nav-container" id="navContainer">
        <ul class="nav-menu">
          <li class="nav-item dropdown">
            <a href="{{ route('intern.intern')}}" class="nav-link">
              ค้นหาตำแหน่งงาน
              <svg class="arrow-icon" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </a>
          </li>
          <li class="nav-item"><a href="#" class="nav-link">ค้นหานักศึกษาฝึกงาน</a></li>
          <li class="nav-item"><a href="#" class="nav-link">ประเมินผล</a></li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              สำหรับบริษัท
            </a>
          </li>
          <li class="nav-item"><a href="#" class="nav-link">ติดต่อเรา</a></li>
        </ul>

        @auth
        <div class="nav-actions">
          <form action="{{ route('auth.logout')}}" method="POST">
            @csrf
            <button type="submit">Logout</button>
          </form>
        @endauth

        @guest
        <div class="nav-actions">
          <a href="{{ route('login')}}" class="btn-login">เข้าสู่ระบบ</a>
          <a href="{{ route('auth.showRegister')}}" class="btn-regis">ลงทะเบียน</a>
        </div>
        @endguest
      </div>
      </nav>
    </header>
<main>
  @yield("content")
</main>
</body>
</html>
