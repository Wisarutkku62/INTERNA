@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush
@section('content')
<div class="employee-page">
    <div class="navbar">
        <h1>รายชื่อผู้หางาน</h1>

        <div class="search-input-group">
            <form class="search-box" action="#" method="GET">
                
                    <input type="text" placeholder="ค้นหา" name="q">
                    <button type="submit" class="button">

                    </button>
            </form>
            
                <div class="filter-group">
                    <label for="filter-type">ประเภทการทำงาน</label>
                    <select id="filter-type" name="type" class="filter-select">
                        <option value="">ลองกรอง</option>
                        <option value="fulltime">งานประจำ </option>
                        <option value="parttime">พาร์ทไทม์ </option>
                        <option value="internship">ฝึกงาน </option>
                    </select>
                </div>
        </div>
    </div>     
</div>
<div class="content">
    <div class="box">
        <div class="pagebox">
            <a href="" class="box-item">
                <p>กำลังมองหางาน</p>
                    
            </a>
        </div>
    
        <a href="#cat" class="box-item">
            <img src="./image/0-cat.png" alt="cat">
            <h2>อาหารแมว</h2>
        </a>
        <a href="#fish" class="box-item">
            <img src="./image/0-fish.png" alt="fish">
            <h2>อาหารปลา</h2>
        </a>
        <!--mouse-->
        <a href="#mouse" class="box-item">
            <img src="./image/0-mouse.png" alt="mouse">
            <h3>อาหารหนูแฮมสเตอร์</h3>
        </a>
        <!--brid-->
        <a href="#brid" class="box-item">
            <img src="./image/0-bird.png" alt="brid">
            <h2>อาหารนก</h2>
        </a>
        <!--rabbit-->
        <a href="#rabbit" class="box-item">
            <img src="./image/0-rabbit.png" alt="rabbit">
            <h2>อาหารกระต่าย</h2>
        </a>
    </div>

</div>
</div>

@endsection