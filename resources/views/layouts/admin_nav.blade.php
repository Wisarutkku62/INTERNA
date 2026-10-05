<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','INTERNA : หาที่ฝึกงาน งานเด็กจบใหม่')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/companynav.css') }}">
  @stack('styles')
</head>

<body>
  <header>
    <nav class="navbar">
      <a href="{{ route('index')}}" class="logo">
        <span class="logo-text">INTERNA</span>
      </a>
      <div class="nav-container" id="navContainer">
        <ul class="nav-menu">
          <li class="nav-item"><a href="{{ route('admin.dashboard')}}" class="nav-link">dashboard</a></li>
          <!-- <li class="nav-item"><a href="#" class="nav-link">ประเมินผล</a></li>
          <li class="nav-item"><a href="#" class="nav-link">ติดต่อเรา</a></li> -->
        </ul>
        @auth
        <div class="nav-actions">
          <div class="profile-dropdown">
            <input type="checkbox" id="profile-toggle" class="profile-toggle">
            <label for="profile-toggle" class="profile-label">
              <img src="{{ asset('image/profile_m.png') }}" alt="Profile" class="user-avatar">
            </label>
            <div class="dropdown-menu">
              <!-- <a href="{{route('company.overview')}}" class="dropdown-item">ภาพรวม</a>
            <a href="{{route('company.profile')}}" class="dropdown-item">โปรไฟล์</a> -->
              <form action="{{ route('auth.logout')}}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="dropdown-item logout-btn">ออกจากระบบ</button>
              </form>
            </div>
          </div>
        </div>
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
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-col">
          <span class="footer-text">INTERNA</span>
          <p>&copy; {{ date('Y') }} INTERNA. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </main>
</body>

</html>