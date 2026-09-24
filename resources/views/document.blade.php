@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/document.css') }}?v={{ filemtime(public_path('css/document.css')) }}">
@endpush

@section('content')
    <div class="head">
        <a href="{{ url()->previous() }}" class="back-bt">
            <img src="{{ asset('img/lukson.png') }}" alt="กลับ" class="back-icon">
            <span>งานทั้งหมด</span>
        </a>
    </div>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="document-section">
            <div class="section-title">
                <div class="title-left">
                    <div class="blue-bar"></div>
                    <h3>1. เอกสารบังคับตามประกาศรับสมัคร <span class="mark-required">*</span></h3>
                </div>
            </div>

            @foreach($documents as $doc)
                <div class="doc-card">
                    <div class="doc-info">
                        <div class="doc-icon">📄</div>
                        <div class="doc-detail">
                            <h4>
                                {{ $doc->name }}
                                @if($doc->is_required)
                                    <span class="mark-required">*</span>
                                @endif

                                @if($doc->is_uploaded)
                                    <span class="badge-status badge-uploaded">อัปโหลดแล้ว</span>
                                @else
                                    <span class="badge-status badge-pending">ยังไม่ได้อัปโหลด</span>
                                @endif
                            </h4>
                            <p>{{ $doc->description }}</p>
                        </div>
                    </div>

                    @if($doc->is_uploaded)
                        <div class="file-uploaded-info">
                            📎 <strong>ไฟล์ที่อัปโหลดไว้:</strong> {{ $doc->file_name }}
                        </div>
                    @else
                        <div class="upload-box">
                            <label for="doc_{{ $doc->id }}"><strong>เลือกไฟล์เอกสารที่ต้องการอัปโหลด:</strong></label>
                            <input type="file" name="documents[{{ $doc->id }}]" id="doc_{{ $doc->id }}" accept=".pdf,.doc,.docx"
                                @if($doc->is_required) required @endif>
                            <div class="upload-hint">รองรับไฟล์ PDF</div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="document-section">
            <div class="section-title">
                <div class="title-left">
                    <div class="blue-bar"></div>
                    <h3>2. แฟ้มสะสมผลงาน (Portfolio) <span class="mark-required">*</span></h3>
                </div>
            </div>

            @foreach($portfolios as $portfolio)
                <div class="doc-card">
                    <div class="doc-info">
                        <div class="doc-icon">📄</div>
                        <div class="doc-detail">
                            <h4>
                                {{ $portfolio->name }}
                                @if($portfolio->is_required)
                                    <span class="mark-required">*</span>
                                @endif

                                @if($portfolio->is_uploaded)
                                    <span class="badge-status badge-uploaded">อัปโหลดแล้ว</span>
                                @else
                                    <span class="badge-status badge-pending">ยังไม่ได้อัปโหลด</span>
                                @endif
                            </h4>
                            <p>{{ $portfolio->description }}</p>
                        </div>
                    </div>

                    @if($portfolio->is_uploaded)
                        <div class="file-uploaded-info">
                            <strong>ไฟล์ที่อัปโหลดไว้:</strong> {{ $portfolio->file_name }}
                        </div>
                    @else
                        <div class="upload-box">
                            <label for="port_{{ $portfolio->id }}"><strong>เลือกไฟล์เอกสารที่ต้องการอัปโหลด:</strong></label>
                            <input type="file" name="portfolios[{{ $portfolio->id }}]" id="port_{{ $portfolio->id }}" accept=".pdf,.doc,.docx"
                                @if($portfolio->is_required) required @endif>
                            <div class="upload-hint">รองรับไฟล์ PDF</div>
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="next-btn-container">
                <button type="submit" class="btn-next">บันทึกและไปหน้าถัดไป ➔</button>
            </div>
        </div>
    </form>
@endsection