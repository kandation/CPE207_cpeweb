<?php
function get_content($page)
{
    ?>
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?=$GLOBALS['admin_menu'][$page][0];?>
                <small><?=$GLOBALS['admin_menu'][$page][1];?></small>
            </h1>
        </div>
    </div>

    <?php

    $errorNSL =[];
    $errorWN =[];

    if ($page == "parse"){
        include_once dirname(__FILE__)."/../setting.php";
    }elseif($page == "add_student"){
        include_once dirname(__FILE__) . "/../controller/select_add_student.php";
    }elseif($page == "add_techer") {
        include_once dirname(__FILE__)."/../controller/select_add_teacher.php";
    }elseif($page == "edit_student") {
        include_once dirname(__FILE__)."/../mange_std_photo.php";
    }elseif($page == "edit_teacher") {
        include_once dirname(__FILE__)."/../mange_tec_photo.php";
    }elseif($page == "mange_photo") {
        include_once dirname(__FILE__) . "/../view/add_std_multi.php";
    }elseif($page == "del_std") {
        include_once dirname(__FILE__)."/../mange_broken.php";
    }elseif($page == "del_tec") {
        include_once dirname(__FILE__)."/../mange_tec_broken.php";
    }
    include_once dirname(__FILE__) . "/notification.php";

        ?>
        </div>

    <?php
}
?>
