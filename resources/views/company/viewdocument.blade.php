@extends("layouts.app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/viewdocument.css') }}">
@endpush

@section('content')
   <div class="page-container">

    <div class="card applicant-card">
        <div class="applicant-profile">
            <div class="applicant-avatar"></div>
            <div class="applicant-details">
                <h2>นายกมลณัฐ สุวรรณสุข</h2>
            </div>
        </div>
    </div>

    <div class="card table-card">
        <div class="table-header-title">
            <h3>รายการเอกสารที่ยื่นมา (5 รายการ)</h3>
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
                <tr>
                    <td>
                        <div class="name-doc">ประวัติส่วนตัว</div>
                    </td>
                    <td>DOC-101</td>
                    <td>28 ก.ย. 2569</td>
                    <td><span class="badge pending">รอตรวจสอบ</span></td>
                    <td><button class="btn-action">ตรวจสอบเอกสาร</button></td>
                    <td class="group"><button class="btn-accept">อนุมัติ</button>
                    <button class="btn-reject">ไม่อนุมัติ</button></td>
                    
                </tr>
                <tr>
                    <td>
                        <div class="name-doc">ประวัติอาชญากรรม</div>
                    </td>
                    <td>DOC-102</td>
                    <td>27 ก.ย. 2569</td>
                    <td><span class="badge approved">อนุมัติแล้ว</span></td>
                    <td><button class="btn-action">ตรวจสอบเอกสาร</button></td>
                    <td class="group"><button class="btn-accept">อนุมัติ</button>
                    <button class="btn-reject">ไม่อนุมัติ</button></td>
                </tr>
                <tr>
                    <td>
                        <div class="name-doc">แผนการฝึกงานและเค้าโครงโครงงาน</div>
                    </td>
                    <td>DOC-103</td>
                    <td>25 ก.ย. 2569</td>
                    <td><span class="badge rejected">ต้องแก้ไข</span></td>
                    <td><button class="btn-action">ตรวจสอบเอกสาร</button></td>
                    <td class="group"><button class="btn-accept">อนุมัติ</button>
                    <button class="btn-reject">ไม่อนุมัติ</button></td>
                </tr>
                <tr>
                    <td>
                        <div class="name-doc">หนังสือยินยอมเข้าร่วมการฝึกงาน</div>
                    </td>
                    <td>DOC-104</td>
                    <td>25 ก.ย. 2569</td>
                    <td><span class="badge rejected">ต้องแก้ไข</span></td>
                    <td><button class="btn-action">ตรวจสอบเอกสาร</button></td>
                    <td class="group"><button class="btn-accept">อนุมัติ</button>
                    <button class="btn-reject">ไม่อนุมัติ</button></td>
                </tr>
                <tr>
                    <td>
                        <div class="name-doc">ใบรับรองผลการเรียน (Transcript)</div>
                    </td>
                    <td>DOC-105</td>
                    <td>25 ก.ย. 2569</td>
                    <td><span class="badge rejected">ต้องแก้ไข</span></td>
                    <td><button class="btn-action">ตรวจสอบเอกสาร</button></td>
                    <td class="group"><button class="btn-accept">อนุมัติ</button>
                    <button class="btn-reject">ไม่อนุมัติ</button></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection