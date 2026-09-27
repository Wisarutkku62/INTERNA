@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/application.css') }}">
@endpush
@section('content')
<div class="application-page">
    <div class="navbar">
        <h1>งานทั้งหมด</h1>    
        <div class="search-container">
            <form class="search-box" action="{{ route('intern.intern') }}" method="GET" id='searchForm'>
                <input type="text" placeholder="ค้นหาตำแหน่งงาน" name="keyword" id="keyword">
                <button type="submit" class="search-btn">
                    ค้นหา
                </button>
            </form>
            <div class="filter-dropdown-box">
                <select name="type" class="filter-select" onchange="goPage(this.value)">
                    <option value="" disabled selected hidden>ตัวกรอง</option>

                    <option value="{{ route('Fulltimejob') }}">งานประจำ</option>
                    <option value="{{ route('parttime') }}">พาร์ทไทม์</option>
                    <option value="{{ route('train') }}">ฝึกงาน</option>
                </select>

                <script>
                function goPage(url) {
                    window.location.href = url;
                }
                </script>
                
            </div>
        </div>
        <!-- <script>
            let searchFormJS = document.getElementById('searchForm')
            searchFormJS.addEventListener('submit', (e) => {
                const search_value = document.getElementById('searchbox').value;
                if (search_value == '') {
                    e.preventDefault()
                }
            })
        </script> -->
    </div>

   <div class="job-list">
    @forelse($internship_positions as $position)
        <div class="job-card">
            <div class="job-card-left">
                <div class="job-card-head">
                    <h1 class="job-company">{{ $position->position_name }}</h1>
                    <h3 class="job-title">{{ $position->company->company_name }}</h3>
                </div>

                <div class="job-card-body">
                    <div class="job-info-row">
                        <div class="info-label">หมวดหมู่ :</div>
                        <div class="info-value">{{ $position->position_category }}</div>
                    </div>
                    <div class="job-info-row">
                        <div class="info-label">เบี้ยเลี้ยง :</div>
                        <div class="info-value">{{ number_format($position->position_allowance) }}</div>
                    </div>
                    <div class="job-info-row">
                        <div class="info-label">จำนวนรับสมัคร :</div>
                        <div class="info-value">{{ $position->position_capacity }} อัตรา</div>
                    </div>
                </div>

                <div class="job-card-footer">
                    @if ($position->position_interview_type == 'Online')
                        <div class="interview">สัมภาษณ์งานออนไลน์ (Online)</div>
                    @elseif ($position->position_interview_type == 'Onsite')
                        <div class="interview">สัมภาษณ์งานออนไซต์ (Onsite)</div>
                    @endif 

                    @if ($position->position_worktype == 'Online')
                        <div class="worktype">Work From Home</div>
                    @elseif ($position->position_worktype == 'Onsite')
                        <div class="worktype">Onsite</div>
                    @elseif ($position->position_worktype == 'Hybrid')
                        <div class="worktype">Hybrid</div>
                    @endif 
                </div>
            </div>
            <div class="job-card-right">
                <div class="job-card-media">
                    <img src="{{ asset('img/Picturelogin.png') }}" alt="picture">
                    <form action="{{route('intern.detail', $position->id)}}" method="GET">
                        <button type='submit' class="detail-btn">ดูรายละเอียดงาน</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>ไม่พบข้อมูล</p>
    @endforelse
</div>
</div>
@endsection