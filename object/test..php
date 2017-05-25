<?php
include_once dirname(__FILE__) . "/../admin/inc/inc_dbcon.inc.php";
include_once dirname(__FILE__)."/../api.php";

$students = new StudentApi("teacher");
$student_img = new ImageApi("teacher");
$list_student = $students->get_students_list();

//print_r($list_student);
foreach ($list_student as $student) {
    echo $student['id'];
    echo $student_img->get_teacher_img_url($student['id']);
}
?>
