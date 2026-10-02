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
          <img src="image/825311094_1618556573137068_8190920475437778785_n.jpg" alt="วิศรุต เครือลุน">
        </div>
        <h3 class="member-name">วิศรุต เครือลุน</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:wisarut.kh@kkumail.com">wisarut.kh@kkumail.com</a>
            </div>  
            </div>
        </div>

      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="image/827410041_955721220366585_8862601696179321680_n.jpg" alt="เบญญาภา โสรัตน์">
        </div>
        <h3 class="member-name">เบญญาภา โสรัตน์</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
           <a href="mailto:benyapa.so@kkumail.com">benyapa.so@kkumail.com</a>
            </div>  
            </div>
        </div>


     <div class="member-card">
        <div class="avatar-wrapper">
          <img src="image/827830617_2186456641932942_3075603669577387699_n.jpg" alt="กมลณัฐ สุวรรณสุข">
        </div>
        <h3 class="member-name">กมลณัฐ สุวรรณสุข</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:kamonnat.s@kkumail.com">kamonnat.s@kkumail.com</a>
            </div>  
            </div>
        </div>

      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="image/831452083_1078381785080529_2988572545557006186_n.jpg" alt="ธนกฤต ใจสุข">
        </div>
        <h3 class="member-name">ธนกฤต ใจสุข</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:thanakrit.jais@kkumail.com">thanakrit.jais@kkumail.com</a>
            </div>  
            </div>
        </div>
        

      <div class="member-card">
        <div class="avatar-wrapper">
          <img src="image/831768176_1117479117422680_6226606992105093954_n.jpg" alt="กรวิชญ์ วงษาเนาว์">
        </div>
        <h3 class="member-name">กรวิชญ์ วงษาเนาว์</h3>
        <p class="member-role">General Coordinator</p>
        <div class="contact-info">
          <div class="contact-item">
            <a href="mailto:khorrawich.w@kkumail.com">khorrawich.w@kkumail.com</a>
          </div>  
        </div>
      </div>

    </div>
  </div>
@endsection