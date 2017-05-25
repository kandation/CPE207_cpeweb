<div class="panel panel-default">
    <form action="?p=edit_student&q=ma" enctype="multipart/form-data" method="post" >

        <div class="panel-heading">ขอให้มั่นใจว่าคุณตั้งชื่อไฟล์ตรงกับรหัสนักศึกษาแล้ว</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="file" name="img[]" multiple>
                    <input type="submit" class="btn btn-default" name="" value="อัปโหลดภาพ" id="">
                </div>
            </div>
        </div>


    </form>
</div>

<?php
include_once dirname(__FILE__)."/../../config.inc.php";
include_once dirname(__FILE__)."/../inc/inc_dbcon.inc.php";
$errorNSL = [];
$errorWN = [];

if(isset($_FILES['img'])){
    $c=0;
    $file = $_FILES['img'];
    $img_path = "../student_img/";
    for ($i=0;$i<sizeof($file['name']);$i++){
        $kc=0;
        $basename = basename($file['name'][$i]);
        $path = pathinfo($basename,PATHINFO_FILENAME);
        $infopath = pathinfo($basename,PATHINFO_EXTENSION);
        $encode_basename = md5($file['name'][$i]).".".$infopath;
        if (in_array($infopath, $GLOBALS['img']['support'])) {
            if (move_uploaded_file($file["tmp_name"][$i], $img_path.$encode_basename)) {
                $kc++;
                $sql = "INSERT INTO std_img_list (sid, url) VALUES ('".$path."' ,'".$encode_basename."')";
                if(db_connect()->query($sql)){
                    $sql = "SELECT * FROM std_img_list WHERE sid='".$path."'";
                    $res = db_connect()->query($sql);
                    array_push($errorWN,"เราคิดว่าหลายๆภาพ ยังไม่ตรงกับรายชื่อ แต่ไม่เป็นไร เราเพิ่มมาให้ก่อนละกัน<br>ออแต่บางที่รูปก็อาหายไปเองได้นะ ถ้าคุณเปิดฟังก์ชั่นทำความสะอาดอัตโนมัติ (ไปจัดการได้ที่ตั้งค่า)");

                }else{
                    //echo "<p>เรารู้อยู่แล้วแหละว่ามีไฟล์อยู่แล้ว ไม่เป็นไรเราจัดการเปลี่ยนให้เรียบร้อยละ</p>";
                    $c++;
                    $sql = "UPDATE std_img_list SET url='".$encode_basename."' WHERE sid='".$path."'";
                    $res = db_connect()->query($sql);
                }
            } else {
                array_push($errorWN, "มีปัญหาบางประการที่ทำให้เราอัพโหลดภาพไม่ได้");
            }
        }else {
            array_push($errorWN, "ไม่รองรับไฟล์ประเภท ".$infopath );
        }
    }
    array_push($errorNSL,"เรารับมา ".sizeof($file['name'])." ไฟล์ เรานำเข้าสำเร็จทั้งหมด ".$c." ไฟล์");


}


/*
 *
 * if(isset($_FILES['image'])){
            $img_path = "../student_img/";
            $basename = basename($_FILES['image']['name']);
            echo $basename;
            $path = pathinfo($basename,PATHINFO_FILENAME);
            print_r($GLOBALS['img']['support']);
            $infopath = pathinfo($basename,PATHINFO_EXTENSION);
            $encode_basename = md5($_FILES['image']['name']).".".$infopath;
            if (in_array($infopath, $GLOBALS['img']['support'])){
                echo $_FILES['image']['name'];
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $img_path.$encode_basename)) {
                    $kc++;
                    $sql = "INSERT INTO std_img_list (sid, url) VALUES ('".$_POST['sid']."' ,'".$encode_basename."')";
                    echo $sql;
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
 */

?>