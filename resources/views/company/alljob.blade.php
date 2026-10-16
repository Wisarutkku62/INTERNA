@extends('layouts.company_nav')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/alljob.css') }}">
@endpush
@section('content')

<div class="main-card">
    <div class="form-header">
        <a href="{{route('company.overview')}}" class="back-btn" title="ย้อนกลับ">&larr;</a>
        <h2>งานทั้งหมดที่ประกาศไป</h2>
        <a href="{{route('company.announcement')}}" class="btn-create">+ สร้างประกาศงานใหม่</a>
    </div>

    @forelse ($positions as $position)
    <div class="job-list">
        <div class="job-item">
            <div class="job-info">
                <h3>{{$position->position_name}}</h3>
                <p class="job-details">{{$position?->position_category}} • {{$position?->position_worktype}} • {{$position?->company?->company_address}}</p>
                <p class="salary">{{$position?->position_allowance}} บาท/เดือน</p>
            </div>
            <div class="job-actions">
                <form action="{{route('company.announcement.edit', $position->id)}}" method='GET'>
                    @csrf
                    <button type="submit" class="btn-action btn-edit">แก้ไข</button>
                </form>
                <form action="{{route('company.announcement.delete', $position->id)}}" method='POST'>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">ลบ</button>
                </form>

            </div>
        </div>
    </div>
    @empty
    <p class='empty-enroll'>ไม่พบข้อมูล</p>
    @endforelse
</div>
@endsection