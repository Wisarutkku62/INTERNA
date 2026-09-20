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

        @foreach($internship_positions as $position)

        <div class="job-card">
            <div class="job-card-head">
                <h1 class="job-company">{{ $position->position_name }} </h1>
                <h3 class="job-title"> {{ $position->company->company_name }} </h3>
            </div>

            <div class="job-card-body">
                <div class="job-info-row">
                    <div class="info-label"> หมวดหมู่ : </div>
                    <div class="info-value"> {{ $position->position_category }} </div>
                </div>

                <div class="job-info-row">
                    <div class="info-label"> เบี้ยเลี้ยง : </div>
                    <div class="info-value">{{ number_format($position->position_allowance) }}</div>
                </div>

                <div class="job-info-row">
                    <div class="info-label"> จำนวนรับสมัคร : </div>
                    <div class="info-value"> {{ $position->position_capacity }} อัตรา</div>
                </div>
            </div>

            <div class="job-card-footer">
                <div class="interview"> 
                    @if ($position->position_interview_type == 'Online')
                        สัมภาษณ์งานออนไลน์ (Online)
                    @elseif ($position->position_interview_type == 'Onsite')
                        สัมภาษณ์งานออนไซต์ (Onsite)
                    @endif 
                </div>
                <div class="worktype"> 
                    @if ($position->position_worktype == 'Online')
                        Work From Home
                    @elseif ($position->position_worktype == 'Onsite')
                        Onsite
                    @elseif ($position->position_worktype == 'Hybrid')
                        Hybrid
                    @endif 
                </div>
            <button class="detail-btn">ดูรายละเอียดงาน</button>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection