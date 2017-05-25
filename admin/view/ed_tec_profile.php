<?php

include_once dirname(__FILE__)."/../inc/inc_dbcon.inc.php";
$now_db = 'tech_listname';
$header = get_table_header("tech_listname");
function db_getheader_type(){
    $arr = [];
    $sql = "SHOW COLUMNS FROM ".$GLOBALS['db']['name'].".tech_listname;";
    $result = db_connect()->query($sql);
    while($row = $result->fetch_assoc()){
        array_push($arr,$row['Type']);
    }
    return $arr;
}

function checkValidKey($array, $head){
    foreach ($array as $k=>$a){
        //echo $k."=>".$a;
        if(in_array("$k",$head)){
            return true;
        }
    }return false;
}

$errorNTF = [];
$errorWN = [];

function insert_to_table($datas){
    $now_working_in = 'tech_listname';
    $keys = get_table_header("tech_listname");
    $arr = array();
    foreach ($datas as $d){
        array_push($arr, $d);
    }
    $i=0;
    $cols ="";
    $vals ="";
    foreach ($keys as $k){
        $cols .= "`".$k."` ,";
        $vals .= "'".$arr[$i] . "' ,";
        $i++;
    }
    $cols = rtrim($cols,",");
    $vals = rtrim($vals,",");

    $sql = "INSERT INTO tech_listname (".$cols . ") VALUES(".$vals .")";
    return db_connect()->query($sql);
}

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$thisPath = dirname($_SERVER['PHP_SELF']);
$onlyPath = str_replace($rootPath, '', $thisPath);

if(checkValidKey($_POST, $header)){
    $r = 0;
    foreach ($_POST as $key=>$value){
        $sql = "UPDATE ".$now_db." SET ".$key."='".$value."' WHERE sid='".$_POST['sid']."'";
        db_connect()->query($sql);
        if(mysqli_connect_errno()){
            echo "<p>พบผิดพลาดในการอัปเดท</p> ";
            echo mysqli_connect_error();
        }
        $r++;
    }
    if($r == sizeof($header)){
        $kc =0;
        if(isset($_FILES['image'])){
            $img_path = "../../teacher_img/";
            $basename = basename($_FILES['image']['name']);
            //echo $basename;
            $path = pathinfo($basename,PATHINFO_FILENAME);
            //print_r($GLOBALS['img']['support']);
            $infopath = pathinfo($basename,PATHINFO_EXTENSION);
            $encode_basename = md5($_FILES['image']['name']).".".$infopath;
            if (in_array($infopath, $GLOBALS['img']['support'])){
                //echo $_FILES['image']['name'];
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $img_path.$encode_basename)) {
                    $kc++;
                    $sql = "INSERT INTO tec_img_list (sid, url) VALUES ('".$_POST['sid']."' ,'".$encode_basename."')";
                    //echo $sql;
                    if(db_connect()->query($sql)){
                        $sql = "SELECT * FROM tec_img_list WHERE sid='".$_POST['sid']."'";
                        $res = db_connect()->query($sql);
                        echo "<p>ขอโทษจริงๆ เราไม่รู้สาเหตุที่มันแทรกเข้าไม่ได้</p>";

                    }else{
                        echo "<p>เรารู้อยู่แล้วแหละว่ามีไฟล์อยู่แล้ว ไม่เป็นไรเราจัดการเปลี่ยนให้เรียบร้อยละ</p>";
                        $sql = "UPDATE tec_img_list SET url='".$encode_basename."' WHERE sid='".$_POST['sid']."'";
                        $res = db_connect()->query($sql);
                    }

                } else {
                    array_push($errorWN, "<p>มีปัญหาบางประการที่ทำให้เราอัพโหลดภาพไม่ได้</p>");
                }
            }else {
                array_push($errorWN, "<p>ไม่รองรับไฟล์ประเภท ".$infopath."</p>" );
            }
        }else{
            array_push($errorWN, "<p>กรุณาเลือก 1 ภาพ</p>");
        }
        echo "<p>นำเข้าสำเร็จ กำลังย้อนกลับ</p>";
        header("refresh:1;url=../?p=edit_teacher&q=rm");
    }else{
        echo "<p>แอะมีอะไรขาดไปรึเปล่า ไม่เป็นไรลองย้อนกลับไปตรวจดู</p>";
        header("refresh:2;url=". $_SERVER['HTTP_REFERER']."");
    }

}

if(isset($_GET['id'])){
    if(is_numeric($_GET['id'])){
        $lisrname = [];

        $sql = "SELECT * FROM ".$now_db." WHERE sid=".$_GET['id'];
        $res = db_connect()->query($sql);
        $row = $res->fetch_assoc();
        if(sizeof($row) > 0){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Control</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">AdminCP</a>
            </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <ul class="nav navbar-nav side-nav">
                <li><a href="../">กลับหน้าหลัก</a></li>
            </ul>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            แก้ไขรายละเอียด
                            <small>Edit Profile</small>
                        </h1>
                    </div>
                </div>
<form action="ed_tec_profile.php" class="form-horizontal" method="post" enctype="multipart/form-data">
    <?php
            foreach ($row as $key => $value) {
                ?>
                <div class="form-group">
                <?php if ($key == 'sid') { ?>
                    <label class="col-sm-2 control-label"><?= $key; ?></label>
                    <div class="col-sm-10">
                        <?= $value; ?>
                    </div>
                    <input type="text" name="<?= $key; ?>" style="display: none" value="<?= $value; ?>"/>
                    </div>
                <?php } else { ?>
                    <label class="col-sm-2 control-label"><?= $key; ?></label>
                    <div class="col-sm-10">
                        <input type="text" name="<?= $key; ?>" value="<?= $value; ?>"/>
                    </div>
                    </div>
                <?php
                } ?>
                <?php
            }
        }else{
            echo "หาไม่เจออะ";
        }

    }else{
        echo "Plz id is int";
    }
?>
    <div class="form-group">
        <label for="exampleInputEmail1">Image upload</label>
        <input class="form-control" type="file" accept="image/*" name="image" onchange="loadFile(event)" required>
        <img id="output" style="display: none" class="img-thumbnail" width="120px"/>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.style.display = 'block';
            };
        </script>
    </div>
                <div class="form-group">
                    <div class="col-lg-offset-3">
                        <input type="submit" value="แก้ไขข้อมูล" />
                    </div>
                </div>
            </form>

<?php }?>

        </div>

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>


