@extends("layouts.app")

@push('styles') 
<link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
@endpush

@section('content')
<div class="container">
    <header class="header">
      <h1>ติดต่อทีมงานของเรา</h1>
      <p>หากมีข้อสงสัยหรือต้องการความช่วยเหลือ สามารถติดต่อสมาชิกในทีมได้โดยตรง</p>
    </header>

    <div class="team-grid">
      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="#" alt="test5">
        </div>
        <h3 class="member-name">กรวิชญ์ เฮ็ดดี</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:khorrawich@example.com">khorrawich@example.com</a>
            </div>  
            </div>
        </div>

      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="#" alt="test5">
        </div>
        <h3 class="member-name">กรวิชญ์ เฮ็ดดี</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
           <a href="mailto:khorrawich@example.com">khorrawich@example.com</a>
            </div>  
            </div>
        </div>


     <div class="member-card">
        <div class="avatar-wrapper">
          <img src="#" alt="test5">
        </div>
        <h3 class="member-name">กรวิชญ์ เฮ็ดดี</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:khorrawich@example.com">khorrawich@example.com</a>
            </div>  
            </div>
        </div>

      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="#" alt="test5">
        </div>
        <h3 class="member-name">กรวิชญ์ เฮ็ดดี</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:khorrawich@example.com">khorrawich@example.com</a>
            </div>  
            </div>
        </div>
        

      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="#" alt="test5">
        </div>
        <h3 class="member-name">กรวิชญ์ เฮ็ดดี</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:khorrawich@example.com">khorrawich@example.com</a>
          </div>  
        </div>
      </div>

    </div>
  </div>
@endsection