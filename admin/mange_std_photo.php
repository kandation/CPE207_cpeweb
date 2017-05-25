<?php
include_once dirname(__FILE__) . "/inc/inc_dbcon.inc.php";
include_once dirname(__FILE__) . "/../api/imagesProcess.class.php";
include_once dirname(__FILE__) . "/api/addPhoto.class.php";
$imgPower = new ImagesProcess();
$imgPower = $imgPower->get_list_images("student");
$isFixPhotos = false;
$img_root = "../student_img/";

$menu = [
    0 => [
        'title' => 'ดูภาพ',
        'url' => '?p=edit_student'
    ],
    1 => [
        'title' => 'จัดการ',
        'url' => '?p=edit_student&q=rm'
    ],
    2 => [
        'title' => 'เพิ่มทีละหลายภาพ',
        'url' => '?p=edit_student&q=ma'
    ],
];

function drop($sid, $file){
    echo $file;
    if(unlink($file)){
        echo "Yesssssssssssssssssss";
    }
    $sql = "DELETE FROM std_img_list WHERE url='".$sid."'";
    db_connect()->query($sql);
    header("Refresh:0; url='?p=edit_student&q=rm'");
}

function show_img($arr_data){
    global $img_root;
    if (sizeof($arr_data)>0) {
        foreach ($arr_data as $d) {
            echo "<img src=\"".$img_root."\"" . $d['url'] . "  class=\"img-thumbnail\" width=180px>";
        }
    }
}

function clean($data_list, $img_root){
    $listFromDir = array_diff(scandir($img_root), array('..', '.'));
    $listFromDB = [];
    foreach ($data_list as $d) {
        array_push($listFromDB,$d['url']);
    }
    $diffDB4DR = array_diff($listFromDir,$listFromDB);
    $diffDR4DB = array_diff($listFromDB,$listFromDir);
    if($diffDB4DR){
        // In case Images more than database
        foreach ($diffDB4DR as $df){
            unlink($img_root.$df);
        }


    }
    if($diffDR4DB){
        // In case database more than Images
        $isFixPhotos = true;

    }
}

function chkActive($path){
    return ("?".$_SERVER['QUERY_STRING'] == $path)?"active":"";
}
$arr_img = array();


$rootPath = $_SERVER['DOCUMENT_ROOT'];
$thisPath = dirname($_SERVER['PHP_SELF']);
$onlyPath = str_replace($rootPath, '', $thisPath);
foreach ($imgPower as $d) {
    array_push($arr_img,
        ["<img src=\"../student_img/" . $d['url'] . "\"  width=180px>",
            $d['sid'],
            "<a href=\"".$onlyPath."/view/ed_std_profile.php?id=".$d['sid'] . "\">แก้ไข</a>",
            "<a href=\"?p=edit_student&q=rm&id=" . $d['url'] . "\">ลบ</a>"
        ]
    );
}


clean($imgPower, $img_root);

/* Close multi Upload */
//$addPhotoa = new AddPhoto("student",'../student_img/');
//$addPhotoa->show_diabox();

$errorNSL = [];
$errorWN = [];



if(isset($_GET['id']) && isset($_GET['q']) && $_GET['q']=='rm'){
    drop($_GET['id'],$img_root.$_GET['id']);
}


?>
    <style>
        .box{
            width: 160px;
            float: left;
            background-color: antiquewhite;
            margin: 3px;
        }
        .box img{
            width: 160px;
            height: 180px;

        }
    </style>

<div>
    <ul <ul class="nav nav-tabs">
        <?php foreach ($menu as $m){ ?>
        <li role="presentation" class="<?=chkActive($m['url'])?>"><a href="<?=$m['url']; ?>"><?=$m['title']; ?></a>
        <?php }
        ?><?php
            if($isFixPhotos){
        ?><li>เราพบว่า</li>
            <?php }
           ?>
    </ul>

</div>


    <?php

    if(isset($_GET['q']) && $_GET['q']=='ma'){
        include_once dirname(__FILE__)."/view/multi_upload_std.php";
    }else{
    ?>
        <table>
            <?php foreach ($arr_img as $item) { ?>
                <div class="box">
                    <?=$item[0];?>
                    <div><?=$item[1];?>
                    <?php if(isset($_GET['q']) && $_GET['q']=='rm'){?>
                    <span><?=$item[2];?> <?=$item[3];?></span>
                    <?php } ?>
                    </div>
                </div>

            <?php } ?>
        </table>
    <?php }?>

    <?php
        if($isFixPhotos){

        }

    ?>





