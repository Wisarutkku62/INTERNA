@extends("layouts.app")

@push('styles')
<link rel="stylesheet" href="{{ asset('css/viewdocument.css') }}">
@endpush

@section('content')
<div class="page-container">
    <div class="form-header">
        <a href="{{ route('company.overview') }}" class="back-btn" title="ย้อนกลับ">&larr;</a>
        <h2>ย้อนกลับ</h2>
    </div>

    <div class="card applicant-card">
        <div class="applicant-profile">
            <div class="applicant-avatar">
                @if(isset($student->profile_image))
                <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Avatar">
                @endif
            </div>
            <div class="applicant-details">
                <h2>
                    {{ $student?->student_fname}} {{ $student?->student_lname}}
                </h2>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card table-card">
        <div class="table-header-title">
            <h3>รายการเอกสารที่ยื่นมา ({{ $documents->count() }} รายการ)</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ชื่อเอกสาร</th>
                    <th>รหัสเอกสาร</th>
                    <th>วันที่ยื่น</th>
                    <th>สถานะ</th>
                    <th>การจัดการ</th>
                    <th>อนุมัติเอกสาร</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $appDoc)
                <tr>
                    <td>
                        <div class="name-doc">
                            @if ($appDoc?->document?->document_type === "Resume")
                            เรซูเม่
                            @elseif ($appDoc?->document?->document_type === "Transcript")
                            ระเบียนการศึกษา
                            @else
                            {{ $appDoc?->document?->document_type ?? 'เอกสารทั่วไป' }}
                            @endif
                        </div>
                    </td>
                    <td>
                        {{ $appDoc->document->doc_code ?? $appDoc->doc_code ?? 'DOC-' . (100 + $appDoc->id) }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($appDoc->created_at)->locale('th')->isoFormat('D MMM YYYY') }}
                    </td>
                    <td>
                        @php
                        $status = $appDoc->appdoc_status ?? $appDoc->status ?? 'pending';
                        @endphp

                        @if($status == 'passed' || $status == 'approved' || $status == 'อนุมัติแล้ว')
                        <span class="badge approved">ผ่านการอนุมัติ</span>
                        @elseif($status == 'rejected' || $status == 'ต้องแก้ไข')
                        <span class="badge rejected">ไม่อนุมัติ</span>
                        @else
                        <span class="badge pending">รอตรวจสอบ</span>
                        @endif
                    </td>
                    <td>
                        @php
                        $filePath = $appDoc->document->document_file_path ?? $appDoc->document_file_path ?? $appDoc->file_path ?? null;

                        if ($filePath) {
                            $cleanPath = str_replace(['public/', 'storage/'], '', $filePath);
                        }
                        @endphp

                        @if($filePath)
                        <a href="{{ asset('storage/' . ltrim($cleanPath, '/')) }}" target="_blank" ">
                            <button type="button" class="btn-action">ตรวจสอบเอกสาร</button>
                        </a>
                        @else
                        <button type="button" class="btn-action" disabled >ไม่มีไฟล์</button>
                        @endif
                    </td>
                    <td class="group">
                        @php
                        $status = $appDoc->appdoc_status ?? $appDoc->status ?? 'pending';
                        @endphp

                        @if($status === 'passed')
                        <span class="badge approved">
                            อนุมัติ
                        </span>
                        @elseif($status === 'rejected')
                        <span class="badge rejected" >
                            ไม่อนุมัติ
                        </span>
                        @else
                        <form action="{{ route('document.updateStatus', $appDoc->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="passed">
                            <button type="submit" class="btn-accept">อนุมัติ</button>
                        </form>

                        <form action="{{ route('document.updateStatus', $appDoc->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn-reject">ไม่อนุมัติ</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" >
                        ยังไม่มีรายการเอกสารที่ยื่นมา
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection