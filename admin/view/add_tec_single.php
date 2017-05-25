<?php
include_once dirname(__FILE__)."/../inc/inc_dbcon.inc.php";
$sql = "SELECT * FROM tech_listname ";
$res = db_connect()->query($sql);
$header = get_table_header("tech_listname");

$errorNSL =[];
$errorWN =[];

function db_getheader_type(){
    $arr = [];
    $sql = "SHOW COLUMNS FROM ".$GLOBALS['db']['name'].".tech_listname;";
    $result = db_connect()->query($sql);
    while($row = $result->fetch_assoc()){
        array_push($arr,$row['Type']);
    }
    return $arr;
}

function convert_type($type){
    $search = strtolower($type);
    if(strpos($search, strtolower("int"))!==false){
        preg_match('#\((.*?)\)#', $search,$gg);
        return ["int",$gg[1]];

    }else{
        preg_match('#\((.*?)\)#', $search,$gg);
        if(sizeof($gg) > 1){
            return ["text",$gg[1]];
        }else{
            return ["text",""];
        }

    }
}

function check_type($value, $type){
    if($type[0] == "int"){
        return is_numeric($value);
    }return true;

}

function checkValidKey($array, $head){
    foreach ($array as $k=>$a){
        //echo $k."=>".$a;
        if(in_array("$k",$head)){
            return true;
        }
    }return false;
}

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

$type = db_getheader_type();
if(checkValidKey($_POST,$header)){

    $i=0;
    $kc=0;
    foreach ($_POST as $key=>$value){
        if (!check_type($value, convert_type($type[$i]))){
            array_push($errorWN,"กรอกได้เฉพาะตัวเลข");
            $kc = 0;
            break;
        }else{
            //Sent to database
            $kc++;
        }
        $i++;
    }
    if($kc >0){
        if(isset($_FILES['image'])){
            $img_path = "../teacher_img/";
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
                        array_push($errorNSL, "นำเข้ารูปภาพเรียบร้อยแล้ว");
                        if(insert_to_table($_POST)){
                            array_push($errorNSL, "นำเข้าายชื่อเรียบร้อยแล้ว");
                        }else{
                            array_push($errorWN, "นำเข้าไม่สำเร็จอาจเกิดจาก Primary key ซ้ำกับของเดมที่มีอยู่แล้ว");
                        }
                    }

                } else {
                    array_push($errorWN, "มีปัญหาบางประการที่ทำให้เราอัพโหลดภาพไม่ได้");
                }
            }else {
                array_push($errorWN, "ไม่รองรับไฟล์ประเภท ".$infopath );
            }
        }else{
            array_push($errorWN, "กรุณาเลือก 1 ภาพ");
        }

    }
}


?>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-plus fa-fw"></i> Single Panel</h3>
        </div>
        <div class="panel-body">
            <form action="?p=add_techer" enctype="multipart/form-data" method="post">



                <?php
                for ($i=0; $i<$res->field_count; $i++){
                ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?=$header[$i]?></label>
                        <input type="text" class="form-control" id="input" name="<?=$header[$i]?>" placeholder="<?=$header[$i]?>" maxlength="<?=convert_type($type[$i])[1];?>" required>
                    </div>
                <?php
                }
                ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Image upload</label>
                    <input class="form-control" type="file" accept="image/*" name="image" onchange="loadFile(event)" required>
                    <img id="output" style="display: none" class="img-thumbnail"/>
                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.style.display = 'block';
                        };
                    </script>
                </div>

                <div class="col-sm-offset-2 col-sm-6"><input type="submit"value="เพิ่มลงในฐานข้อมูล"></div>
            </form>

        </div>
    </div>
</div>

