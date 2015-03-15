# Sbay PHP Framework version 0.0.2 (beta)
Mini PHP Framework by DriveSoftCenter.Net

# Requirements
System

    PHP 5.4 + 
    MySQL , PDO MySQL
    Mod rewrite (.htaccess)

# Note
-- array() to []

# Structure

    apps 			
        components 		| namespace Application\Components;
        config 			| เก็บไฟล์เกี่ยวกับการตั้งค่าให้กับ Web Application
            autoload.php		| โหลดไฟล์อัตโนมัติ
            main.php		| ตั้งค่า Web Application เช่น ชื่อเว็บ, ตั้งค่าฐานข้อมูล และอื่น ๆ
        controllers 			| namespace Application\Controllers;
            HomeController.php	| namespace Application\Controllers\HomeController; | Controller หน้าแรก 
        libraries			| namespace Application\Libraries;
        models 			| namespace Application\Models;
        plugins			| namespace Application\Plugins;
        views			| เก็บไฟล์เกี่ยวกับ แสดงข้อมูลทั้งหมด หรือ ไฟล์ View ทั้งหมดของ Web Application
            home			| เก็บไฟล์ View ของ HomeControlelr
                error.php		| ไฟล์หน้าแสดง Error
                index.php		| ไฟล์หน้าแรกของ HomeController
            main.php		| ไฟล์ Layout หลัก
            index.php		| ไฟล์หน้าแรก (กรณี ไม่ได้สร้าง HomeController)
    include
        framework
            System			| เก็บไฟล์เกี่ยวกับ Sbay Framework System ทั้งหมด
        Autoload.php		| namespace Sbay\Autoload.php;		| ไฟล์จัดการ Autoload ไฟล์ของระบบทั้งหมด
        Main.php		| namespace Sbay\Main.php;		| ไฟล์จัดการ Class หลักของระบบ	
        Sbay.php		| namespace Sbay\Sbay;			| ไฟล์ควบคุม Sbay System ทั้งหมด
    public	
        assets			| เก็บไฟล์เกี่ยวกับ CSS, JavaScript, Fonts ทั้งหมด
            css			| เก็บไฟล์ CSS ทั้งหมด
            fonts			| เก็บไฟล์ Fonts ทั้งหมด
            js			| เก็บไฟล์ JavaScript ทั้งหมด
        images			| เก็บไฟล์ Images ทั้งหมด	
    themes			| เก็บไฟล์เกี่ยวกับ Themes ทั้งหมด
    .htaccess			| ไฟล์เกี่ยวกับจัดการ URL
    index.php			| ไฟล์ Run Web Application

# Install
    1. Download File : Sbay Framework 
    2. Create Folder "sbay_framework" at Web Server
    3. Run Browser to http://localhost/sbay_framework
