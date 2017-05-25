<?php
// Import api
include_once dirname(__FILE__)."/admin/inc/inc_dbcon.inc.php";
include_once dirname(__FILE__)."/api.php";

?>

<?php
//Get student photos
$std_image = new ImageApi();
?>

<table>
    <tr>
        <td>Show student photos</td>
    </tr>

    <tr>
        <td><?php echo $std_image->get_student_img(580610689);  ?></td>
    </tr>
</table>


<?php
$students = new StudentApi("student");
$student = $students->find_data_by_sid(600610627);
// Show internal
echo "<pre>";
var_dump($student);
echo "</pre>";
// Use

if ($student){
    echo "มีอะ มันชื่อ ".$student[0]['firstname_th'];
}else{
    echo "ขอโทษด้วย ไม่พบรายชื่อนักศึกษานี้";
}

echo "<p>เดี๋ยวพี่จะแสดงรายชื่อนักศึกษาทั้งหมดให้</p>";
$list_student = $students->get_students_list();
foreach ($list_student as $student){
    echo $student['sid']."  ".$student['firstname_th']."<br>";
}
?>




