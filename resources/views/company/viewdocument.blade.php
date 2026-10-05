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
                <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Avatar" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                @endif
            </div>
            <div class="applicant-details">
                <h2>
                    {{ $student->first_name ?? $student->name ?? 'ไม่ระบุชื่อ' }}
                    {{ $student->last_name ?? '' }}
                </h2>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success" style="padding: 10px; margin-bottom: 15px; background-color: #d4edda; color: #155724; border-radius: 5px;">
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
                    <th style="width: 25%;">ชื่อเอกสาร</th>
                    <th style="width: 15%;">รหัสเอกสาร</th>
                    <th style="width: 15%;">วันที่ยื่น</th>
                    <th style="width: 15%;">สถานะ</th>
                    <th style="width: 15%;">การจัดการ</th>
                    <th style="width: 15%;">อนุมัติเอกสาร</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $appDoc)
                <tr>
                    <td>
                        <div class="name-doc">
                            {{ $appDoc->document->document_name ?? $appDoc->document_name ?? 'เอกสารไม่มีชื่อ' }}
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
                        $status = $appDoc->appdoc_status ?? $appDoc->status;
                        @endphp

                        @if($status == 'approved' || $status == 'อนุมัติแล้ว')
                        <span class="badge approved">อนุมัติแล้ว</span>
                        @elseif($status == 'rejected' || $status == 'ต้องแก้ไข')
                        <span class="badge rejected">ต้องแก้ไข</span>
                        @else
                        <span class="badge pending">รอตรวจสอบ</span>
                        @endif
                    </td>
                    <td>
                        @php
                        $filePath = $appDoc->document->file_path ?? $appDoc->file_path ?? null;
                        @endphp

                        @if($filePath)
                        <a href="{{ asset('storage/' . $filePath) }}" target="_blank" style="text-decoration: none;">
                            <button type="button" class="btn-action">ตรวจสอบเอกสาร</button>
                        </a>
                        @else
                        <button type="button" class="btn-action" disabled style="opacity: 0.5;">ไม่มีไฟล์</button>
                        @endif
                    </td>
                    <td class="group">
                        <form action="{{ route('document.updateStatus', $appDoc->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="btn-accept">อนุมัติ</button>
                        </form>

                        <form action="{{ route('document.updateStatus', $appDoc->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn-reject">ไม่อนุมัติ</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px;">
                        ยังไม่มีรายการเอกสารที่ยื่นมา
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection