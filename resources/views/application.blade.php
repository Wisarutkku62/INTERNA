@extends("layouts.app") 

@push('styles')
<link rel="stylesheet" href="{{ asset('css/application.css') }}"> 
@endpush

 @section('content') 
 <div class="application-page">
    <div class="header-section">
        <h1 class="page-title">งานทั้งหมด</h1>
    </div>
    <form action="{{ route('intern.intern') }}" method="GET" class="filter-container">
        <div class="search-main-box"> 
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="ค้นหาชื่อตำแหน่งงาน หรือ ชื่อบริษัท..." class="search-input"> 
        <button type="submit" class="search-btn"> 
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg> ค้นหา </button> 
                </div>
        <div class="filter-bar">
            <div class="filter-item"> 
            <label for="category">หมวดหมู่งาน</label> 
            <select name="category" id="category" class="filter-select" onchange="this.form.submit()">
                    <option value="">หมวดหมู่ทั้งหมด</option>
                    <option value="IT / Software" {{ request('category')=='IT / Software' ? 'selected' : '' }}> IT /
                        Software </option>
                    <option value="Design / Graphic" {{ request('category')=='Design / Graphic' ? 'selected' : '' }}>
                        Design / Graphic </option>
                    <option value="Marketing" {{ request('category')=='Marketing' ? 'selected' : '' }}> Marketing
                    </option>
                    <option value="Business / Admin" {{ request('category')=='Business / Admin' ? 'selected' : '' }}>
                        Business / Admin </option>
                </select> 
                </div>
            <div class="filter-item">
             <label for="worktype">รูปแบบการทำงาน</label> <select name="worktype" id="worktype" class="filter-select" onchange="this.form.submit()">
                    <option value="">รูปแบบทั้งหมด</option>
                    <option value="Online" {{ request('worktype')=='Online' ? 'selected' : '' }}> Work From Home
                    </option>
                    <option value="Onsite" {{ request('worktype')=='Onsite' ? 'selected' : '' }}> Onsite </option>
                    <option value="Hybrid" {{ request('worktype')=='Hybrid' ? 'selected' : '' }}> Hybrid </option>
                </select> </div>
            <div class="filter-item"> <label for="interview_type">การสัมภาษณ์</label> <select name="interview_type"
                    id="interview_type" class="filter-select" onchange="this.form.submit()">
                    <option value="">การสัมภาษณ์ทั้งหมด</option>
                    <option value="Online" {{ request('interview_type')=='Online' ? 'selected' : '' }}> สัมภาษณ์ออนไลน์
                    </option>
                    <option value="Onsite" {{ request('interview_type')=='Onsite' ? 'selected' : '' }}> สัมภาษณ์ออนไซต์
                    </option>
                </select> 
                </div> 
                @if(request()->anyFilled([ 'keyword', 'category', 'worktype', 'interview_type' ])) 
                <a href="{{ route('intern.intern') }}" class="btn-clear-filter"> ล้างตัวกรอง </a> 
                @endif
        </div>
    </form>
    <div class="job-list"> 
    @forelse($internship_positions as $position)  
    <a href="{{ route('intern.detail', $position->id) }}" class="job-card-link">
            <div class="job-card">
                <div class="job-card-left">
                    <div class="job-card-head">
                        <h2 class="job-company"> {{ $position->position_name }} </h2>
                        <h3 class="job-title"> {{ $position->company?->company_name }} </h3>
                    </div>
                    <div class="job-card-body">
                        <div class="job-info-row"> 
                        <span class="info-label">หมวดหมู่ :</span> 
                        <span class="info-value">
                            {{ $position->position_category }} </span> 
                    </div>
                        <div class="job-info-row"> 
                        <span class="info-label">เบี้ยเลี้ยง :</span> 
                        <span class="info-value"> {{ number_format($position->position_allowance) }} บาท/วัน </span>
                        </div>
                        <div class="job-info-row"> 
                        <span class="info-label">จำนวนรับสมัคร :</span> 
                        <span class="info-value"> {{ $position->position_capacity }} อัตรา </span> 
                                </div>
                    </div>
                    <div class="job-card-footer"> 
                    @if($position->position_interview_type == 'Online') 
                    <span class="badge badge-interview"> สัมภาษณ์งานออนไลน์ (Online)</span>
                        @elseif($position->position_interview_type == 'Onsite') 
                        <span class="badge badge-interview">
                            สัมภาษณ์งานออนไซต์ (Onsite) </span> 
                            @endif 
                        @if($position->position_worktype == 'Online')
                        <span class="badge badge-worktype"> Work From Home </span> 
                        @elseif($position->position_worktype
                        == 'Onsite') 
                        <span class="badge badge-worktype"> Onsite </span>
                        @elseif($position->position_worktype == 'Hybrid') 
                        <span class="badge badge-worktype"> Hybrid</span>
                         @endif 
                    </div>
                </div>
                <div class="job-card-right">
                    <div class="job-card-media"> <img src="{{ asset('img/Picturelogin.png') }}" alt="company picture">
                     <span class="detail-btn"> ดูรายละเอียดงาน
                        </span> 
                    </div>
                </div>
            </div>
        </a> @empty 
        <div class="empty-state">
            <p>ไม่พบข้อมูลตำแหน่งงานที่คุณค้นหา</p>
        </div> 
        @endforelse 
    </div>
</div> 
@endsection