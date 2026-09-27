@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/document.css') }}?v={{ filemtime(public_path('css/document.css')) }}">
@endpush

@section('content')
<div class="doc-page-wrapper">

    <div class="headbtm">
        <a href="{{ route('index') }} " class="back-bta">
            <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icons" >
            <span>งานทั้งหมด</span>
        </a>
    </div>

    <div class="doc-container">
        <div class="page-header">
            <h2 class="page-title">จัดการเอกสารฝึกงาน</h2>
            <p class="page-subtitle">อัปโหลด ตรวจสอบสถานะ และแก้ไขเอกสารสำหรับการฝึกงาน</p>
        </div>

        <div class="doc-card" id="upload-section">
            <h3 class="card-title"> อัปโหลดเอกสารฝึกงาน</h3>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="upload-form-grid">
                    <div class="form-group">
                        <label class="form-label" for="file">เลือกไฟล์เอกสาร (PDF, DOCX) <span style="color:red;">*</span></label>
                        <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx" required>
                    </div>

                </div>

                <div style="text-align: right; margin-top: 10px;">
                    <button type="submit" class="btn-submit">ส่งเอกสาร</button>
                </div>
            </form>
        </div>

        <div class="doc-card" id="status-section">
            <h3 class="card-title"> ตรวจสอบสถานะเอกสาร</h3>

            <div class="table-responsive">
                <table class="doc-table">
                    <thead>
                        <tr>
                            <th>ประเภทเอกสาร</th>
                            <th>ไฟล์แนบ</th>
                            <th>วันที่อัปโหลด</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุ / แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents ?? [] as $doc)
                        <tr>
                            <td><b>{{ $doc->doc_type }}</b></td>
                            <td>
                                <a href="{{ asset($doc->file_path) }}" target="_blank" style="color: #0037ff; text-decoration: none;">
                                    ดูไฟล์แนบ
                                </a>
                            </td>
                            <td>{{ $doc->created_at ? $doc->created_at->format('d/m/Y') : '-' }}</td>
                            <td>
                                @if($doc->status == 'approved')
                                    <span class="badge badge-success">ผ่านการตรวจสอบ</span>
                                @elseif($doc->status == 'rejected')
                                    <span class="badge badge-rejected">ถูกตีกลับ</span>
                                @else
                                    <span class="badge badge-pending">รอตรวจสอบ</span>
                                @endif
                            </td>
                            <td>
                                @if($doc->status == 'rejected')
                                    <div class="reject-reason">
                                        <b>เหตุผล:</b> {{ $doc->remark ?? 'กรุณาแก้ไขเอกสารใหม่' }}
                                    </div>
                                    <div style="margin-top: 6px;">
                                        <a href="#" class="btn-reupload">ส่งเอกสารใหม่</a>
                                    </div>
                                @else
                                    <span style="color: #64748b; font-size: 13px;">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: #94a3b8; padding: 30px;">
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