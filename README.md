# INTERNA — Internship Management System
ระบบจัดการการฝึกงานที่ช่วยให้นักศึกษาค้นหาตำแหน่งฝึกงาน สมัครงาน และติดตามข้อมูลการสมัคร ขณะเดียวกันบริษัทสามารถประกาศรับนักศึกษาฝึกงานและจัดการผู้สมัครได้

# วัตถุประสงค์
- รวมข้อมูลตำแหน่งฝึกงานไว้ในเว็บไซต์เดียว
- ช่วยให้นักศึกษาสมัครตำแหน่งและจัดการเอกสารที่เกี่ยวข้อง
- ช่วยให้บริษัทจัดการประกาศงาน ผู้สมัคร การสัมภาษณ์ และผลการประเมิน
- แยกสิทธิ์การใช้งานตามบทบาทของผู้ใช้
  
# คุณสมบัติหลัก
### สำหรับนักศึกษา
- สมัครสมาชิกและเข้าสู่ระบบ
- ดูรายการตำแหน่งฝึกงานและรายละเอียดงาน
- สมัครตำแหน่งฝึกงาน
- จัดการข้อมูลโปรไฟล์
- อัปโหลดและจัดการเอกสารที่เกี่ยวข้องกับการสมัคร
- ดูสถานะ/ผลการสมัครและการประเมินจากบริษัท
### สำหรับบริษัท
- เข้าสู่ระบบและจัดการข้อมูลบริษัท
- สร้าง แก้ไข และลบประกาศรับนักศึกษาฝึกงาน
- ดูรายชื่อและข้อมูลผู้สมัคร
- ตรวจสอบเอกสารของผู้สมัคร
- จัดการนัดสัมภาษณ์และบันทึกผลการสัมภาษณ์
- ประเมินผลการฝึกงาน
### สำหรับผู้ดูแลระบบ
- มีส่วนจัดการระบบและหน้าสำหรับผู้ดูแลระบบ

# เทคโนโลยีที่ใช้
- Backend: PHP, Laravel
- Frontend: Blade Templates, CSS 
- Database: SQLite
- Tools: Laravel Herd

# โครงสร้างโปรเจกต์
โครงสร้างด้านล่างแสดงไฟล์และโฟลเดอร์หลักที่ใช้พัฒนา ไม่รวมไฟล์ dependency, cache, log และไฟล์ที่ Laravel สร้างอัตโนมัติจำนวนมาก
```
interna_project/
├── app/
│   ├── Actions/
│   │   └── Fortify/
│   │       ├── CreateNewUser.php          # ขั้นตอนสร้างผู้ใช้ใหม่
│   │       └── ResetUserPassword.php      # ขั้นตอนตั้งรหัสผ่านใหม่
│   ├── Concerns/
│   │   ├── PasswordValidationRules.php    # กฎตรวจสอบรหัสผ่าน
│   │   └── ProfileValidationRules.php     # กฎตรวจสอบข้อมูลโปรไฟล์
│   ├── Console/
│   │   └── Commands/
│   │       └── InstallFeaturesCommand.php # คำสั่งติดตั้งฟีเจอร์ของโปรเจกต์
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php        # ฟังก์ชันฝั่งผู้ดูแลระบบ
│   │   │   ├── AuthController.php         # เข้าสู่ระบบ/สมัครสมาชิก
│   │   │   ├── CompanyController.php      # ฟังก์ชันฝั่งบริษัท
│   │   │   ├── DocumentController.php     # จัดการเอกสาร
│   │   │   ├── EvaluationController.php   # การประเมินผล
│   │   │   ├── InternController.php       # หน้าเว็บและตำแหน่งฝึกงาน
│   │   │   ├── ProfileController.php      # ข้อมูลโปรไฟล์
│   │   │   └── Controller.php             # Controller หลัก
│   │   └── Middleware/
│   │       └── CheckRole.php              # ตรวจสอบสิทธิ์ตามบทบาท
│   ├── Livewire/
│   │   └── Actions/
│   │       └── Logout.php                 # การออกจากระบบ
│   ├── Models/
│   │   ├── Application.php                # ข้อมูลการสมัครฝึกงาน
│   │   ├── ApplicationDocument.php        # ความสัมพันธ์การสมัครกับเอกสาร
│   │   ├── Company.php                    # ข้อมูลบริษัท
│   │   ├── Document.php                   # ข้อมูลเอกสาร
│   │   ├── Evaluation.php                 # ข้อมูลการประเมิน
│   │   ├── InternshipPosition.php         # ตำแหน่งฝึกงาน
│   │   ├── Interview.php                  # ข้อมูลสัมภาษณ์
│   │   ├── Student.php                    # ข้อมูลนักศึกษา
│   │   └── User.php                       # บัญชีผู้ใช้
│   └── Providers/
│       ├── AppServiceProvider.php
│       └── FortifyServiceProvider.php
├── bootstrap/
│   ├── app.php                            # ตั้งค่าเริ่มต้นแอปและ middleware
│   └── providers.php                      # ลงทะเบียน service providers
├── config/                                # การตั้งค่า Laravel
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── filesystems.php
│   ├── fortify.php
│   ├── mail.php
│   └── ...
├── database/
│   ├── factories/
│   │   └── UserFactory.php                # สร้างข้อมูลจำลองสำหรับทดสอบ
│   ├── migrations/                        # โครงสร้างและการเปลี่ยนแปลงตาราง
│   ├── seeders/
│   │   ├── CompanySeeder.php              # ข้อมูลบริษัทตัวอย่าง
│   │   ├── InternshipPositionSeeder.php   # ตำแหน่งฝึกงานตัวอย่าง
│   │   └── DatabaseSeeder.php             # เรียกใช้ seeder
│   └── database.sqlite                    # ฐานข้อมูล SQLite
├── public/
│   ├── css/                               # CSS ของแต่ละหน้า
│   ├── image/                             # รูปภาพประกอบ
│   ├── img/                               # รูปภาพประกอบ
│   ├── documents/                         # หากมีไฟล์ที่เปิดเผยผ่าน public
│   ├── index.php                          # จุดเริ่มต้นของเว็บ
│   └── favicon.ico
├── resources/
│   ├── js/
│   │   ├── app.js                         # JavaScript ฝั่งหน้าเว็บ
│   │   └── passkeys.js                    # สคริปต์ passkeys
│   └── views/
│       ├── admin/                         # หน้าแดชบอร์ดผู้ดูแลระบบ
│       ├── auth/                          # หน้าเข้าสู่ระบบและสมัครสมาชิก
│       ├── company/                       # หน้าสำหรับบริษัท
│       ├── components/                    # Blade components ที่ใช้ซ้ำ
│       ├── layouts/                       # Layout และ navigation
│       ├── pages/                         # หน้าย่อยของระบบ
│       ├── partials/                      # ส่วนประกอบย่อยของหน้า
│       ├── index.blade.php                # หน้าแรก
│       ├── application.blade.php          # หน้าการสมัคร
│       ├── document.blade.php             # หน้าเอกสาร
│       ├── appointment.blade.php           # หน้าการนัดหมาย
│       ├── evaluationstd.blade.php         # หน้าการประเมินของนักศึกษา
│       └── contactus.blade.php             # หน้าติดต่อ
├── routes/
│   ├── web.php                            # เส้นทางหลักของเว็บไซต์
│   ├── settings.php                       # เส้นทางการตั้งค่าบัญชี
│   └── console.php                        # เส้นทางคำสั่ง console
├── storage/
│   ├── app/                               # ไฟล์ที่แอปจัดเก็บ
│   ├── framework/                         # cache, session และ compiled views
│   └── logs/                              # log ของ Laravel
├── tests/
│   ├── Feature/                           # ทดสอบการทำงานระดับฟีเจอร์
│   └── Unit/                              # ทดสอบหน่วยย่อย
├── .env.example                           # ตัวอย่างค่าตั้งค่า environment
├── artisan                                # คำสั่ง CLI ของ Laravel
├── composer.json                          # dependencies และ scripts ของ PHP
├── composer.lock                          # เวอร์ชัน dependencies ที่ล็อกไว้
├── package.json                           # ข้อมูลเครื่องมือ frontend (ไม่จำเป็นต่อการเปิดเว็บปกติ)
├── phpunit.xml                            # ตั้งค่าการทดสอบ
└── vite.config.js                         # ตั้งค่า Vite สำหรับงาน frontend
```
# วิธีติดตั้งและเริ่มใช้งาน

## ใช้ Laravel Herd บน Windows และไม่ใช้คำสั่ง Node.js เพื่อเปิดเว็บไซต์ตามปกติ
-- สิ่งที่ต้องมี
- ติดตั้ง Laravel Herd และเปิดใช้งานแล้ว
- PHP เวอร์ชันที่รองรับโปรเจกต์ (ใน composer.json ระบุ PHP ^8.3)
- Composer
- ไฟล์โปรเจกต์ interna_project


