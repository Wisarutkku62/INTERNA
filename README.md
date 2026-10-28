# โปรเจกต์รายวิชา SC362004 Web Application Programming

- รายชื่อสมาชิกมีดังนี้
  
|ชื่อ|สาขา|รหัสนักศึกษา|หน้าที่|
|---|---|---|---|
|กมลณัฐ สุวรรณสุข| เทคโนโลยีสารสนเทศ | 683380034-8 | Backend Company + Student + Admin|
|กรวิชญ์ วงษาเนาว์| เทคโนโลยีสารสนเทศ | 683380036-4 | Frontend Student|
|ธนกฤต ใจสุข| เทคโนโลยีสารสนเทศ | 683380042-9 | Frontend Admin + Company|
|วิศรุต เครือลุน| เทคโนโลยีสารสนเทศ | 683380054-2 | Frontend Company + Student and Controller Admin|
|เบญญาภา โสรัตน์| เทคโนโลยีสารสนเทศ | 683380279-8 | Backend Student + Admin |

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
### สิ่งที่ต้องมี
- ติดตั้ง Laravel Herd และเปิดใช้งานแล้ว
- PHP เวอร์ชันที่รองรับโปรเจกต์ (ใน composer.json ระบุ PHP ^8.3)
- Composer
- ไฟล์โปรเจกต์ interna_project

# 1. วางโปรเจกต์ในโฟลเดอร์ Herd
ตัวอย่างตำแหน่งโฟลเดอร์:
```
C:\Users\<ชื่อผู้ใช้>\Herd\interna_project
```

# 2. เปิด Terminal ในโฟลเดอร์โปรเจกต์
เปิดโฟลเดอร์ interna_project แล้วคลิกแถบที่อยู่ของ File Explorer พิมพ์ cmd แล้วกด Enter หรือเปิด Terminal ในโฟลเดอร์นั้น

ตรวจสอบว่าอยู่ในโฟลเดอร์ที่ถูกต้อง:
```
dir
```
ควรเห็นไฟล์ artisan, composer.json และโฟลเดอร์ app, routes, resources

# 3. ติดตั้ง PHP dependencies
รันคำสั่ง:
```
composer install
```
รอให้ติดตั้งเสร็จ หากมีโฟลเดอร์ vendor อยู่แล้วก็ยังสามารถใช้คำสั่งนี้เพื่อตรวจสอบและติดตั้ง dependencies ให้ตรงกับ composer.lock ได้

# 4. ตรวจสอบไฟล์ .env
ถ้ามีไฟล์ .env อยู่แล้ว ให้ตรวจสอบค่าการตั้งค่าโดยไม่เผยแพร่ค่าลับ หากไม่มี ให้สร้างจากไฟล์ตัวอย่าง:
```
copy .env.example .env
```
จากนั้นสร้าง Application Key:
```
php artisan key:generate
```
ตรวจสอบค่าฐานข้อมูลใน .env ให้สอดคล้องกับการตั้งค่าของโปรเจกต์ ตัวอย่างสำหรับ SQLite:
```
DB_CONNECTION=sqlite
```
หากใช้ SQLite ให้ตรวจสอบว่ามีไฟล์ database/database.sqlite อยู่แล้ว โปรเจกต์มีไฟล์ฐานข้อมูลนี้อยู่ในชุดไฟล์ที่ส่งมา แต่หากเป็นฐานข้อมูลใหม่หรือไฟล์ว่าง ต้องเตรียมฐานข้อมูลและ migrate ตามขั้นตอนถัดไป

# 5. เตรียมฐานข้อมูล
หากต้องการสร้าง/อัปเดตตารางตาม migration ให้รัน:
```
php artisan migrate
```
คำเตือน: อย่าใช้ php artisan migrate:fresh กับฐานข้อมูลที่มีข้อมูลสำคัญ เพราะคำสั่งนี้จะลบตารางเดิมแล้วสร้างใหม่

หากต้องการเพิ่มข้อมูลตัวอย่าง ให้ตรวจสอบก่อนว่า seeder มีข้อมูลอะไรบ้าง แล้วจึงรัน:
```
php artisan db:seed
```

# 6. เปิดเว็บไซต์ด้วย Herd
หากโปรเจกต์อยู่ในโฟลเดอร์เว็บไซต์ที่ Herd ดูแลอยู่แล้ว:
1. เปิด Terminal ในโฟลเดอร์ interna_project
2. รันคำสั่ง:
```
herd open
```
4. Herd จะเปิดเว็บไซต์ที่เชื่อมโยงกับโฟลเดอร์นั้นในเบราว์เซอร์
หาก Herd ยังไม่รู้จักโฟลเดอร์โปรเจกต์ ให้รันคำสั่งนี้จาก Terminal ที่เปิดอยู่ในโฟลเดอร์โปรเจกต์:
```
herd link
```
จากนั้นลองเปิดเว็บไซต์อีกครั้ง:
```
herd open
```
ถ้าต้องการใช้ชื่อเว็บไซต์เฉพาะ ให้ตรวจสอบชื่อโดเมนที่ Herd กำหนดให้โปรเจกต์ในแอป Herd หรือด้วยคำสั่ง CLI ที่ติดตั้งอยู่บนเครื่อง


