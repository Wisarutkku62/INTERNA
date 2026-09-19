@extends("layouts.app")

@push('styles') 
<link rel="stylesheet" href="{{ asset('css/train.css') }}?v={{ filemtime(public_path('css/train.css')) }}">
@endpush

@section('content')
<div class="application-page">
    <div class="navbar">
        <h1>ฝึกงาน 2 ตำแหน่ง</h1>    
        <div class="search-container">
            <form class="search-box" action="#" method="GET">
                <input type="text" placeholder="ค้นหาตำแหน่งงาน" name="q">
                <button type="submit" class="search-btn">
                    ค้นหา
                </button>
            </form>
            <div class="filter-dropdown-box">
                <select name="type" class="filter-select">
                    <option value="" disabled selected hidden>ตัวกรอง</option>
                    <option value="fulltime">งานประจำ</option>
                    <option value="parttime">พาร์ทไทม์</option>
                    <option value="internship">ฝึกงาน</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- ส่วนของ Card-box -->
 <div class="content">
    <!--ส่วนของ Box-->
    <div class="box">

     
        <!--บริษัท-->
        <a href="#cat" class="box-item">
            <img src="{{ asset('image/company.png') }}" alt="company">
            <p>บริษัท ทิฟแอนด์โค จำกัด</p>
            <p>กรุงเทพมหานคร - หนองแขม</p>
            <h2>Social Media Assistant</h2>
            <div class="typefulltime">
                <p class="fu2">สัมภาษณ์ออนไลน์</p>
                <p class="fu3">ยินดีต้อนรับเด็กจบใหม่</p>
            </div>
            <p>หมวดหมู่: </p>
            <p>จำนวนรับสมัคร : </p>
            <p>เงินเดือน : </p>
            
        </a>

      <a href="#" class="box-item">
            <img src="{{ asset('image/company02.webp') }}" alt="company">
            <p>Cyber Defense Co, Ltd</p>
            <p>กรุงเทพมหานคร - สวนหลวง</p>
            <h2>Digital Marketing</h2>
            <div class="typefulltime">
                <p class="fu2">สัมภาษณ์ออนไลน์</p>
                <p class="fu3">ยินดีต้อนรับเด็กจบใหม่</p>
            </div>
            <p>หมวดหมู่:การตลาด </p>
            <p>จำนวนรับสมัคร : 1 อัตรา </p>
            <p>เงินเดือน : 18,000 - 25,000 </p>
            
        </a>
        
      <a href="#" class="box-item">
            <img src="{{ asset('image/company02.webp') }}" alt="company">
            <p>Cyber Defense Co, Ltd</p>
            <p>กรุงเทพมหานคร - สวนหลวง</p>
            <h2>Digital Marketing</h2>
            <div class="typefulltime">
                <p class="fu1">งานประจำ</p>
                <!-- <p class="fu2">สัมภาษณ์ออนไลน์</p> -->
                <p class="fu3">ยินดีต้อนรับเด็กจบใหม่</p>
            </div>
            <p>หมวดหมู่:การตลาด </p>
            <p>จำนวนรับสมัคร : 1 อัตรา </p>
            <p>เงินเดือน : 18,000 - 25,000 </p>
            
        </a>
       
    </div>

</div>


@endsection
