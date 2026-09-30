<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // 1. users (5 rows: ID 1-2 = Student, ID 3-5 = Company)[cite: 3]
        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'student1@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'email' => 'student2@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'email' => 'company1@example.com',
                'password' => Hash::make('password'),
                'role' => 'company',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'email' => 'company2@example.com',
                'password' => Hash::make('password'),
                'role' => 'company',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'email' => 'company3@example.com',
                'password' => Hash::make('password'),
                'role' => 'company',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 6,
                'email' => 'admin1@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => $now, 'updated_at' => $now
            ]
        ]);

        // 2. students (5 rows: เชื่อมกับ user_id 1 และ 2)[cite: 4]
        DB::table('students')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'student_fname' => 'สมชาย',
                'student_lname' => 'ใจดี',
                'student_profile' => 'profiles/students/student1.jpg',
                'student_gender' => 'ชาย',
                'student_birthday' => '2003-05-15',
                'student_religion' => 'พุทธ',
                'student_nationality' => 'ไทย',
                'student_degree' => 'วิทยาการคอมพิวเตอร์',
                'student_bio' => 'สนใจงาน Web Development และ Database Design',
                'student_email' => 'somchai@example.com',
                'student_phone' => '0812345678',
                'student_address' => '123/45 ถ.มิตรภาพ อ.เมือง จ.ขอนแก่น',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'student_fname' => 'วิภาดา',
                'student_lname' => 'รักเรียน',
                'student_profile' => 'profiles/students/student2.jpg',
                'student_gender' => 'หญิง',
                'student_birthday' => '2003-08-20',
                'student_religion' => 'พุทธ',
                'student_nationality' => 'ไทย',
                'student_degree' => 'เทคโนโลยีสารสนเทศ',
                'student_bio' => 'ชอบงาน UI/UX และ Front-end Development',
                'student_email' => 'wiphada@example.com',
                'student_phone' => '0898765432',
                'student_address' => '99/9 ถ.มะลิวัลย์ อ.เมือง จ.ขอนแก่น',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'user_id' => 1, // ทดสอบกรณีโปรไฟล์การฝึกงานครั้งที่สอง/ประวัติตาม ID
                'student_fname' => 'ณัฐพล',
                'student_lname' => 'เก่งกาจ',
                'student_profile' => 'profiles/students/student3.jpg',
                'student_gender' => 'ชาย',
                'student_birthday' => '2002-11-10',
                'student_religion' => 'พุทธ',
                'student_nationality' => 'ไทย',
                'student_degree' => 'วิศวกรรมซอฟต์แวร์',
                'student_bio' => 'ถนัดงาน Backend API และ Laravel',
                'student_email' => 'nattapol@example.com',
                'student_phone' => '0821112233',
                'student_address' => '45/1 ถ.ศรีจันทร์ อ.เมือง จ.ขอนแก่น',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'student_fname' => 'กานดา',
                'student_lname' => 'แจ่มใส',
                'student_profile' => 'profiles/students/student4.jpg',
                'student_gender' => 'หญิง',
                'student_birthday' => '2003-01-30',
                'student_religion' => 'พุทธ',
                'student_nationality' => 'ไทย',
                'student_degree' => 'เทคโนโลยีสารสนเทศ',
                'student_bio' => 'สนใจงาน Data Analytics และ Business Analyst',
                'student_email' => 'kanda@example.com',
                'student_phone' => '0834445566',
                'student_address' => '88 ถ.รื่นรมย์ อ.เมือง จ.ขอนแก่น',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'student_fname' => 'อนันต์',
                'student_lname' => 'สว่างวงศ์',
                'student_profile' => 'profiles/students/student5.jpg',
                'student_gender' => 'ชาย',
                'student_birthday' => '2002-09-05',
                'student_religion' => 'พุทธ',
                'student_nationality' => 'ไทย',
                'student_degree' => 'วิทยาการคอมพิวเตอร์',
                'student_bio' => 'สนใจงาน Cyber Security และ DevOps',
                'student_email' => 'anan@example.com',
                'student_phone' => '0857778899',
                'student_address' => '12 ถ.กสิกรทุ่งสร้าง อ.เมือง จ.ขอนแก่น',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);

        // 3. companies (5 rows: เชื่อมกับ user_id 3, 4, 5)[cite: 6]
        DB::table('companies')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'company_name' => 'บริษัท ไอที โซลูชั่นส์ จำกัด',
                'company_description' => 'บริการพัฒนาระบบเว็บและแอปพลิเคชันครบวงจร',
                'company_logo' => 'logos/company1.png',
                'company_address' => '100 อาคารซอฟต์แวร์ปาร์ค ถ.มิตรภาพ ขอนแก่น',
                'company_website' => 'https://itsolutions.co.th',
                'contact_name' => 'คุณกิตติศักดิ์ มีสุข',
                'contact_position' => 'HR Manager',
                'contact_phone' => '0431234567',
                'contact_email' => 'hr@itsolutions.co.th',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'company_name' => 'บริษัท ดิจิทัล นวัตกรรม จำกัด',
                'company_description' => 'ผู้นำด้านการพัฒนาโซลูชัน AI และ Cloud Computing',
                'company_logo' => 'logos/company2.png',
                'company_address' => '55 อาคารขอนแก่นไอทีสเปซ ถ.ศรีจันทร์ ขอนแก่น',
                'company_website' => 'https://digitalinnovation.co.th',
                'contact_name' => 'คุณศิริพร วงศ์สว่าง',
                'contact_position' => 'Talent Acquisition',
                'contact_phone' => '0439876543',
                'contact_email' => 'careers@digitalinnovation.co.th',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'user_id' => 5,
                'company_name' => 'บริษัท คลาวด์ เทคโนโลยี จำกัด',
                'company_description' => 'ที่ปรึกษาและวางระบบ infrastructure สำหรับองค์กร',
                'company_logo' => 'logos/company3.png',
                'company_address' => '88 ถ.กสิกรทุ่งสร้าง ขอนแก่น',
                'company_website' => 'https://cloudtech.co.th',
                'contact_name' => 'คุณธนกฤต สายชล',
                'contact_position' => 'Senior HR',
                'contact_phone' => '0435556667',
                'contact_email' => 'recruitment@cloudtech.co.th',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'user_id' => 3,
                'company_name' => 'บริษัท เว็บสตูดิโอ จำกัด',
                'company_description' => 'เอเจนซีรับออกแบบ UI/UX และพัฒนาเว็บไซต์',
                'company_logo' => 'logos/company4.png',
                'company_address' => '12 ถ.หน้าเมือง ขอนแก่น',
                'company_website' => 'https://webstudio.co.th',
                'contact_name' => 'คุณปรียาพร ดีเลิศ',
                'contact_position' => 'Managing Director',
                'contact_phone' => '0432221110',
                'contact_email' => 'contact@webstudio.co.th',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'user_id' => 4,
                'company_name' => 'บริษัท สมาร์ทแล็บ เทค จำกัด',
                'company_description' => 'วิจัยและพัฒนาอุปกรณ์ IoT และ Automation',
                'company_logo' => 'logos/company5.png',
                'company_address' => '33 ถ.ประชาสโมสร ขอนแก่น',
                'company_website' => 'https://smartlabtech.co.th',
                'contact_name' => 'คุณสิทธิชัย นำเจริญ',
                'contact_position' => 'Technical Lead',
                'contact_phone' => '0434443332',
                'contact_email' => 'jobs@smartlabtech.co.th',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);

        // 4. internship_positions (5 rows: เชื่อมกับ company_id 1-5)[cite: 7]
        DB::table('internship_positions')->insert([
        [
            'id' => 1,
            'company_id' => 1,
            'position_name' => 'Web Developer Intern (Laravel)',
            'position_description' => 'พัฒนาและปรับปรุงระบบ Web Application ด้วย Laravel',
            'position_qualification'  => "- กำลังศึกษาในสาขาที่เกี่ยวข้องกับการออกแบบ หรือไอที\n- สามารถใช้งาน Figma หรือ Adobe XD ได้ดี\n- มี Portfolio แสดงผลงานการออกแบบ UI/UX อย่างน้อย 2-3 งาน\n- เข้าใจหลักการของ Responsive Design",
            'position_category' => 'Software Development',
            'position_capacity' => 2,
            'position_allowance' => 300.00,
            'position_start_date' => '2026-11-01',
            'position_end_date' => '2027-03-31',
            'position_start_time' => '08:30',
            'position_end_time' => '17:30',
            'position_worktype' => 'Onsite',
            'position_interview_type' => 'Online',
            'created_at' => $now,
            'updated_at' => $now
        ],
        [
            'id' => 2,
            'company_id' => 1,
            'position_name' => 'Front-end Developer Intern (React/Vue)',
            'position_description' => 'ออกแบบและพัฒนา UI สวยงามตามแบบ Design System',
            'position_qualification'  => "- กำลังศึกษาชั้นปีที่ 3 หรือ 4 สาขาวิชาวิทยาการคอมพิวเตอร์ หรือสาขาที่เกี่ยวข้อง\n- มีความรู้พื้นฐาน PHP, HTML, CSS, JavaScript และ MySQL\n- เคยผ่านการใช้งาน Git Version Control มาก่อน\n- สามารถทำงานร่วมกันเป็นทีมและพร้อมเรียนรู้สิ่งใหม่ๆ",
            'position_category' => 'Frontend Development',
            'position_capacity' => 2,
            'position_allowance' => 300.00,
            'position_start_date' => 'Monday',
            'position_end_date' => 'Friday',
            'position_start_time' => '09:00',
            'position_end_time' => '18:00',
            'position_worktype' => 'Hybrid',
            'position_interview_type' => 'Online',
            'created_at' => $now,
            'updated_at' => $now
        ],
        [
            'id' => 3,
            'company_id' => 2,
            'position_name' => 'Backend API Developer Intern',
            'position_description' => 'ออกแบบและเขียน RESTful API สื่อสารกับระบบบริการอื่น',
            'position_qualification'  => "- กำลังศึกษาชั้นปีที่ 3 หรือ 4 สาขาวิชาวิทยาการคอมพิวเตอร์ หรือสาขาที่เกี่ยวข้อง\n- มีความรู้พื้นฐาน PHP, HTML, CSS, JavaScript และ MySQL\n- เคยผ่านการใช้งาน Git Version Control มาก่อน\n- สามารถทำงานร่วมกันเป็นทีมและพร้อมเรียนรู้สิ่งใหม่ๆ",
            'position_category' => 'Backend Development',
            'position_capacity' => 1,
            'position_allowance' => 350.00,
            'position_start_date' => 'Monday',
            'position_end_date' => 'Friday',
            'position_start_time' => '08:30',
            'position_end_time' => '17:30',
            'position_worktype' => 'Onsite',
            'position_interview_type' => 'Onsite',
            'created_at' => $now,
            'updated_at' => $now
        ],
        [
            'id' => 4,
            'company_id' => 3,
            'position_name' => 'System Admin / DevOps Intern',
            'position_description' => 'ดูแลเซิร์ฟเวอร์ และช่วยการ Deploy บน Docker/Cloud',
            'position_qualification'  => "- กำลังศึกษาชั้นปีที่ 3 หรือ 4 สาขาวิชาวิทยาการคอมพิวเตอร์ หรือสาขาที่เกี่ยวข้อง\n- มีความรู้พื้นฐาน PHP, HTML, CSS, JavaScript และ MySQL\n- เคยผ่านการใช้งาน Git Version Control มาก่อน\n- สามารถทำงานร่วมกันเป็นทีมและพร้อมเรียนรู้สิ่งใหม่ๆ",
            'position_category' => 'Infrastructure',
            'position_capacity' => 1,
            'position_allowance' => 300.00,
            'position_start_date' => 'Monday',
            'position_end_date' => 'Friday',
            'position_start_time' => '09:00',
            'position_end_time' => '18:00',
            'position_worktype' => 'Onsite',
            'position_interview_type' => 'Online',
            'created_at' => $now,
            'updated_at' => $now
        ],
        [
            'id' => 5,
            'company_id' => 4,
            'position_name' => 'UI/UX Designer Intern',
            'position_description' => 'ออกแบบ Wireframe/Prototype หน้าจอเว็บและแอปพลิเคชันด้วย Figma',
            'position_qualification'  => "- กำลังศึกษาชั้นปีที่ 3 หรือ 4 สาขาวิชาวิทยาการคอมพิวเตอร์ หรือสาขาที่เกี่ยวข้อง\n- มีความรู้พื้นฐาน PHP, HTML, CSS, JavaScript และ MySQL\n- เคยผ่านการใช้งาน Git Version Control มาก่อน\n- สามารถทำงานร่วมกันเป็นทีมและพร้อมเรียนรู้สิ่งใหม่ๆ",
            'position_category' => 'Design',
            'position_capacity' => 2,
            'position_allowance' => 250.00,
            'position_start_date' => 'Monday',
            'position_end_date' => 'Friday',
            'position_start_time' => '09:00',
            'position_end_time' => '18:00',
            'position_worktype' => 'Remote',
            'position_interview_type' => 'Online',
            'created_at' => $now,
            'updated_at' => $now
        ],
    ]);

        // 5. documents (5 rows: เชื่อมกับ student_id 1-5)[cite: 5]
        DB::table('documents')->insert([
            [
                'id' => 1,
                'student_id' => 1,
                'document_type' => 'Resume',
                'document_file_path' => 'documents/resumes/somchai_resume.pdf',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'student_id' => 1,
                'document_type' => 'Transcript',
                'document_file_path' => 'documents/transcripts/somchai_transcript.pdf',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'student_id' => 2,
                'document_type' => 'Resume',
                'document_file_path' => 'documents/resumes/wiphada_resume.pdf',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'student_id' => 3,
                'document_type' => 'Resume',
                'document_file_path' => 'documents/resumes/nattapol_resume.pdf',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'student_id' => 4,
                'document_type' => 'Portfolio',
                'document_file_path' => 'documents/portfolios/kanda_portfolio.pdf',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);

        // 6. applications (5 rows: เชื่อมกับ internship_position_id 1-5 และ student_id 1-5)[cite: 8]
        DB::table('applications')->insert([
            [
                'id' => 1,
                'internship_position_id' => 1,
                'student_id' => 1,
                'application_status' => 'interview_scheduled',
                'reject_stage' => null,
                'reject_reason' => null,
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'internship_position_id' => 2,
                'student_id' => 2,
                'application_status' => 'resume_approved',
                'reject_stage' => null,
                'reject_reason' => null,
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'internship_position_id' => 3,
                'student_id' => 3,
                'application_status' => 'interview_passed',
                'reject_stage' => null,
                'reject_reason' => null,
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'internship_position_id' => 4,
                'student_id' => 4,
                'application_status' => 'rejected',
                'reject_stage' => 'resume',
                'reject_reason' => 'คุณสมบัติยังไม่ตรงตามข้อกำหนดของตำแหน่งงาน',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'internship_position_id' => 5,
                'student_id' => 5,
                'application_status' => 'pending',
                'reject_stage' => null,
                'reject_reason' => null,
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);

        // 7. applications_documents (5 rows: เชื่อม application_id กับ document_id)[cite: 10]
        DB::table('applications_documents')->insert([
            [
                'id' => 1,
                'application_id' => 1,
                'document_id' => 1,
                'appdoc_status' => 'active',
                'appdoc_remark' => 'เรซูเม่หลัก',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'application_id' => 1,
                'document_id' => 2,
                'appdoc_status' => 'active',
                'appdoc_remark' => 'ใบแสดงผลการเรียน',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'application_id' => 2,
                'document_id' => 3,
                'appdoc_status' => 'active',
                'appdoc_remark' => 'เรซูเม่ฉบับอัปเดต',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'application_id' => 3,
                'document_id' => 4,
                'appdoc_status' => 'active',
                'appdoc_remark' => 'เรซูเม่แนบการสมัคร',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'application_id' => 4,
                'document_id' => 5,
                'appdoc_status' => 'active',
                'appdoc_remark' => 'ผลงานสะสม',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);

        // 8. interviews (5 rows: เชื่อมกับ application_id 1-5)[cite: 2]
        DB::table('interviews')->insert([
            [
                'id' => 1,
                'application_id' => 1,
                'interview_date' => '2026-10-05',
                'interview_start_time' => '10:00:00',
                'interview_end_time' => '11:00:00',
                'interview_mode' => 'online',
                'interview_location' => 'https://meet.google.com/abc-defg-hij',
                'email_details' => 'กรุณาเตรียมตัวล่วงหน้า 5 นาที และเตรียมผลงานมานำเสนอ',
                'interview_result' => 'pending',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'application_id' => 2,
                'interview_date' => '2026-10-06',
                'interview_start_time' => '14:00:00',
                'interview_end_time' => '15:00:00',
                'interview_mode' => 'online',
                'interview_location' => 'https://zoom.us/j/123456789',
                'email_details' => 'สัมภาษณ์รอบแรกโดยฝ่าย HR และ Team Lead',
                'interview_result' => 'pending',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'application_id' => 3,
                'interview_date' => '2026-09-20',
                'interview_start_time' => '09:30:00',
                'interview_end_time' => '10:30:00',
                'interview_mode' => 'onsite',
                'interview_location' => 'ห้องประชุม B ชั้น 2 อาคารดิจิทัล นวัตกรรม',
                'email_details' => 'สัมภาษณ์ ณ บริษัท กรุณาแต่งกายชุดนักศึกษาสุภาพ',
                'interview_result' => 'passed',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'application_id' => 4,
                'interview_date' => '2026-09-18',
                'interview_start_time' => '13:00:00',
                'interview_end_time' => '14:00:00',
                'interview_mode' => 'online',
                'interview_location' => 'https://teams.microsoft.com/l/meetup-join/xyz',
                'email_details' => 'การนัดหมายถูกยกเลิกเนื่องจากไม่ผ่านการคัดเลือกเรซูเม่',
                'interview_result' => 'cancelled',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'application_id' => 5,
                'interview_date' => '2026-10-10',
                'interview_start_time' => '15:30:00',
                'interview_end_time' => '16:30:00',
                'interview_mode' => 'online',
                'interview_location' => 'https://meet.google.com/qwe-rtyu-iop',
                'email_details' => 'รอยืนยันวันสัมภาษณ์จากนักศึกษา',
                'interview_result' => 'pending',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);

        // 9. evaluations (5 rows: เชื่อมกับ application_id 1-5)[cite: 9]
        DB::table('evaluations')->insert([
            [
                'id' => 1,
                'application_id' => 3, // เชื่อมกับสมัครฝึกงานที่ผ่านแล้ว
                'evaluation_type' => 'midterm',
                'evaluation_score' => 88.50,
                'evaluation_feedback' => 'นักศึกษาเรียนรู้เร็ว มีความตั้งใจทำงานเป็นอย่างดี',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 2,
                'application_id' => 3,
                'evaluation_type' => 'final',
                'evaluation_score' => 92.00,
                'evaluation_feedback' => 'ส่งงานได้ตรงเวลาเสมอ สามารถแก้ปัญหาเฉพาะหน้าได้ดีมาก',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 3,
                'application_id' => 1,
                'evaluation_type' => 'interview_assessment',
                'evaluation_score' => 85.00,
                'evaluation_feedback' => 'พื้นฐานการเขียนโค้ดดี มีทัศนคติเชิงบวก',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 4,
                'application_id' => 2,
                'evaluation_type' => 'interview_assessment',
                'evaluation_score' => 80.00,
                'evaluation_feedback' => 'มี Portfolio ผลงานสวยงาม เหมาะสมกับตำแหน่ง Front-end',
                'created_at' => $now, 'updated_at' => $now
            ],
            [
                'id' => 5,
                'application_id' => 5,
                'evaluation_type' => 'initial_screening',
                'evaluation_score' => 75.00,
                'evaluation_feedback' => 'ประวัติส่วนตัวครบถ้วน รอนัดสัมภาษณ์เพิ่มเติม',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);
    }
}