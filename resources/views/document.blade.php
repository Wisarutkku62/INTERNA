@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/document.css') }}?v={{ filemtime(public_path('css/document.css')) }}">
@endpush

@section('content')
<div class="doc-page-wrapper">

    <div class="headbtm">
    <a href="{{route('company.overview')}}" class="back-icons" title="ย้อนกลับ">&larr;</a>
        <h2>งานทั้งหมด</h2>
    </div>

    <div class="doc-container">
        <div class="page-header">
            <h2 class="page-title">จัดการเอกสารฝึกงาน</h2>
            <p class="page-subtitle">อัปโหลด ตรวจสอบสถานะ และแก้ไขเอกสารสำหรับการฝึกงาน</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="doc-card" id="upload-section">
            <h3 class="card-title">อัปโหลดเอกสารฝึกงาน</h3>

            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('คุณต้องการส่งไฟล์เอกสารนี้ใช่หรือไม่?');">
                @csrf
                <div class="upload-form-grid">
                    <div class="form-group">
                        <label class="form-label" for="file">เลือกไฟล์เอกสาร (PDF, DOCX) <span">*</span></label>
                        <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx" required>
                    </div>
                </div>

                <div class="upload-form-grid">
                    <div class="form-group">
                        <label class="form-label" for="file">หมวดหมู่ <span>*</span></label>
                        <select name="document_type" id="document_type" class="form-control" required>
                            <option value="" disabled selected>เลือกหมวดหมู่</option>
                            <option value="Resume">เรซูเม่</option>
                            <option value="Transcript">ผลการเรียน</option>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn-submit">ส่งเอกสาร</button>
                </div>
            </form>
        </div>

        <div class="doc-card" id="status-section">
            <h3 class="card-title">ตรวจสอบสถานะเอกสาร</h3>

            <div class="table-responsive">
                <table class="doc-table">
                    <thead>
                        <tr>
                            <th>ประเภทเอกสาร</th>
                            <th>ไฟล์แนบ</th>
                            <th>วันที่อัปโหลด</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุ / แก้ไข</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents ?? [] as $doc)
                        <tr>
                            <td>
                                <b>
                                    @if ($doc->document_type === "Resume")
                                    เรซูเม่
                                    @elseif ($doc->document_type === "Transcript")
                                    ระเบียนการศึกษา
                                    @else
                                    {{ $doc->document_type ?? 'เอกสารทั่วไป' }}
                                    @endif
                                </b>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . ltrim($doc->document_file_path ?? $doc->file_path ?? '', '/')) }}"
                                    target="_blank">
                                    ดูไฟล์แนบ
                                </a>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($doc->created_at)->format('d/m/Y H:i') }}</td>
                            <td>
                                @if(($doc->status ?? '') == 'approved')
                                <span class="badge badge-success">ผ่านการตรวจสอบ</span>
                                @elseif(($doc->status ?? '') == 'rejected')
                                <span class="badge badge-rejected">ถูกยกเลิก</span>
                                @else
                                <span class="badge badge-pending">รอตรวจสอบ</span>
                                @endif
                            </td>
                            <td>
                                @if(($doc->status ?? '') == 'rejected')
                                <div class="reject-reason">
                                    <b>หมายเหตุ:</b> {{ $doc->remark ?? 'กรุณาส่งไฟล์เอกสารใหม่' }}
                                </div>
                                <div >
                                    <a href="#" class="btn-reupload">ส่งเอกสารใหม่</a>
                                </div>
                                @else
                                <span >-</span>
                                @endif
                            </td>
                            <td>
                                {{-- ฟอร์มสำหรับกดลบเอกสาร --}}
                                <form action="{{ route('company.announcement.delete', $doc->id) }}" method="POST" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบเอกสารนี้?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="Btnx">ลบ</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                ยังไม่มีเอกสารในระบบ
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection