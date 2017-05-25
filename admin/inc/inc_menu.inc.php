<?php
$admin_menu_header = [
    'setting' => [
        'type' => "ss",
        'name' => "ตั้งค่า"
    ],
    'student' =>[
        'type' => 'dd',
        'name' => 'นักศึกษา',
    ],
    'teacher' =>[
    'type' => 'dd',
    'name' => 'อาจารย์',
]

];

$admin_menu = [
    'parse' => [
        "ตั้งค่า",
        "Setting",
        "setting.php",
        "?p=parse",
        "setting"
        ],
    'add_student' => [
        "[+] เพิ่มข้อมูลนักศึกษา",
        "Insert student data",
        "add_std_multi.php",
        "?p=add_student",
        "student"
    ],
    'add_techer' => [
        "[+] เพิ่มข้อมูลอาจารย์",
        "Insert teacher data",
        "add_tec_multi.php",
        "?p=add_techer",
        "teacher"
    ],
    'edit_student' => [
        "[E] แก้ไขภาพนักศึกษา",
        "Edit student data",
        "mange_std_photo.php",
        "?p=edit_student",
        "student"
    ],
    'edit_teacher' => [
        "[E] แก้ไขภาพอาจารย์",
        "Edit teacher data",
        "mange_tech_photo.php",
        "?p=edit_teacher",
        "teacher"
    ],
    'del_std' => [
        "[-] ลบข้อมูลนักศึกษา",
        "Edit teacher data",
        "mange_broken.php",
        "?p=del_std",
        "student"
    ],
    'del_tec' => [
        "[-] ลบข้อมูลอาจารย์",
        "Edit teacher data",
        "mange_tec_broken.php",
        "?p=del_tec",
        "teacher"
    ]
];

?>