@extends("layouts.app")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush
@section("content")
<div class="banner">
    <div class="left-side">
            <div class="img-box">
                <img src="{{ asset('img/ChatGPT Image 12 ก.ย. 2569 17_05_04.png') }}" alt="pic1">
        </div>
        <div class="img-group">
            <div class="img-box2">
                <img src="{{ asset('img/ChatGPT Image 12 ก.ย. 2569 17_05_04.png') }}" alt="pic2">
            </div>
             <div class="img-box3">
                <img src="{{ asset('img/ChatGPT Image 12 ก.ย. 2569 17_05_04.png') }}" alt="pic3">
            </div>
        </div>
    </div>

<div class="right-side">
    <h1>ค้นหาที่ฝึกงานสำหรับนักศึกษา </h1>
    <p>interna เป็นเว็บแอพรวบรวมที่ฝึกงานสำหรับนักศึกษาที่สนใจฝึกงาน สมัครงานประจำ มาพร้อมกับบริษัทที่น่าสนใจ</p>
    <form action="{{ url('/search') }}" class="search-box">
      <input type="text" name="q" placeholder="Network Engineer , DevOps">
      <button type="submit">ค้นหา</button>
    </form>

    <div class="tags">
      <a href="{{ url('/search?tag=intern') }}">หาที่ฝึกงาน</a>
      <a href="{{ url('/search?tag=fulltime') }}">งานประจำ</a>
      <a href="{{ url('/search?tag=parttime') }}">งานพาร์ทไทม์</a>
      <a href="{{ url('/search?tag=freshgrad') }}">หางานเด็กจบใหม่</a>
      <a href="{{ url('/search?tag=wfh') }}">งาน work from home</a>
        </div>
    </div>
</div>
@endsection