@extends("layouts.app")

@push('styles') 
<link rel="stylesheet" href="{{ asset('css/trainee.css') }}?v={{ filemtime(public_path('css/trainee.css')) }}">
@endpush

@section('content')
<div class="application-page">
    <div class="navbar">
        <h1>นักศึกษาฝึกงาน 2 ตำแหน่ง</h1>    
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

     
        <!--m-->
        <a href="#cat" class="box-item">
            <img src="{{ asset('image/profile_m.png') }}" alt="search">
            <p>กำลังมองหางาน</p>
            <h2>Dev</h2>
            <p>เงินเดือนที่คาดหวัง<p>15,000 - 25,000</p></p>
            <p>ระดับการศึกษา</p>
            <p>สาขาวิชา</p>
            <p>จังหวัดที่สนใจ</p>
            
        </a>

        <!--f-->
        <a href="#cat" class="box-item">
            <img src="{{ asset('image/profile_f.png') }}" alt="search">
            <p>กำลังมองหางาน</p>
            <h2>Dev</h2>
            <p>เงินเดือนที่คาดหวัง<p>15,000 - 25,000</p></p>
            <p>ระดับการศึกษา</p>
            <p>สาขาวิชา</p>
            <p>จังหวัดที่สนใจ</p>
            
        </a>
       
    </div>

</div>


@endsection
