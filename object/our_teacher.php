<?php
include_once dirname(__FILE__) . "/../admin/inc/inc_dbcon.inc.php";
include_once dirname(__FILE__)."/../api.php";

$students = new StudentApi("teacher");
$student_img = new ImageApi("teacher");
$list_student = $students->get_students_list();

//print_r($list_student);
?>

<section class="colorSection full-width clearfix bg-color-5 teamSection" id="ourTeam">
    <div class="container">
        <div class="sectionTitle text-center alt">
            <h2>
                <span class="shape shape-left bg-color-3"></span>
                <span>Meet Our Teachers</span>
                <span class="shape shape-right bg-color-3"></span>
            </h2>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="owl-carousel teamSlider">
                    <?php foreach ($list_student as $student) {?>
                    <div class="slide">
                        <div class="teamContent">
                            <div class="teamImage">
                                <img src="<?=$student_img->get_teacher_img_url($student['sid'])?>" alt="img" class="img-circle">
                                <div class="maskingContent">
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                            <div class="teamInfo">
                                <h3><a href="profileTeacher.php?id=<?= $student['sid'] ?>"><?=$student['firstname']?></a></h3>
                                <p><?=$student['nickname']?></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="btnArea">
            <a href="teacher.php" class="btn btn-primary">View more</a>
        </div>
    </div>
</section>