@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/application.css') }}">
@endpush
@section('content')
<div class="application-page">
    <div class="navbar">
        <h1>งานทั้งหมด</h1>    
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
    <div class="job-list">
        <div class="job-card">
            <div class="job-card-head">
    <h1 class="job-company">Lazy Code Company</h1>
    <h3 class="job-title">DevOps Engineer</h3>
            </div>
            <div class="job-card-body">
        <div class="job-info-row">
          <div class="info-label">
           สถานที่ปฏิบัติงาน
          </div>
          <div class="info-value">
             AIS พัทยา
          </div>
        </div>

        <div class="job-info-row">
          <div class="info-label">
             เงินเดือน
          </div>
          <div class="info-value">25,000 - 30,000 บาท</div>
        </div>

        <div class="job-info-row">
          <div class="info-label">
             อัตรา
          </div>
          <div class="info-value"> 3 อัตรา</div>
        </div>
      </div>
      <div class="job-card-footer">
        <div class="interview">
          สัมภาษณ์งานออนไลน์
        </div>
        <button class="detail-btn">ดูรายละเอียดงาน</button>
      </div>
        </div>
    </div>
</div>
@endsection