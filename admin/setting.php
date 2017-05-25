<?php
$errorNSL = [];
$errorWN = [];

$sql = "SELECT COUNT(*) AS total FROM ".$GLOBALS['db']['prefix']."adm_config";
$result = db_connect()->query($sql);
$data = mysqli_fetch_assoc($result);
$setup_db = [
    'sbox'=>'box_open',
    'paser_text'=>'\t',
    'clean'=>'clean_open'
];

$arr_check = [];

if($data['total'] <= 0 || $data['total'] != sizeof($setup_db)){
    foreach ($setup_db as $key=>$value){
        $sql = "INSERT INTO ".$GLOBALS['db']['prefix']."adm_config (config_name, config_prop) VALUES ('".$key."','".$value."')";
        db_connect()->query($sql);
    }
}else{
    $sql = "SELECT * FROM ".$GLOBALS['db']['prefix']."adm_config";
    $res = db_connect()->query($sql);
    while ($row = $res->fetch_assoc()){
        $arr_check[$row['config_name']] = $row['config_prop'];
    }
}

function checked($value, $arr_check){
    return (in_array($value,$arr_check))?"checked":"";

}
if(isset($_POST)){
    $c = 0;
    foreach ($_POST as $key=>$value){
        if(array_key_exists($key,$setup_db)){
            $sqli = "UPDATE ".$GLOBALS['db']['prefix']."adm_config SET `config_prop`='".$value."' WHERE `config_name`='".$key."'" ;
            //echo $sqli."<br>";
            $rr = db_connect()->query($sqli);
            $c++;
        }
    }
    if($c == sizeof($setup_db)){
        array_push($errorNSL,"เรียบร้อยละ รีเฟรชให้ใหม่ใน 2 วิ");
        header("refresh:2");
    }
}
?>

<script>
    function showPaser() {
        var x = document.getElementById("paserText").value;
        document.getElementById("paserTextValue").innerHTML = x;
        var lenT = x.split("\\t").length-1;
        lenT += (x.split("\t").length-1);
        var lenS = x.split(" ").length-1;
        var lenC = x.split(",").length-1;

        var sum = (lenC+lenS+lenT);

        if(sum == 0){
            if(x.length > 0){
                document.getElementById("paserTextValue").innerHTML = x;
            }else {
                document.getElementById("paserTextValue").innerHTML = "(ว่างเปล่า)";
            }


        }else {
            var all = "";
            var s = 0;
            if(lenT > 0){
                all += "Tab x"+lenT+" ";
                s++;
            }
            if(lenS > 0){
                all += "Space x"+lenS+" ";
                s++;
            }
            if (lenC > 0){
                all += "Comma x"+lenC+" ";
                s++;
            }
            document.getElementById("paserTextValue").innerHTML = all;
        }
    }

    window.onload = showPaser;

</script>
<form  action="?p=parse" method="post" enctype="multipart/form-data" class="form-horizontal" name="fff">

    <div class="form-group">
        <div class="col-sm-3 control-label">ใช้งาน Single Box Query</div>
        <div class="col-sm-3">
            <input type="radio" name="sbox" id="box_open" value="box_open" <?=checked("box_open", $arr_check);?>><lable for="box_open"> เปิด</lable>
            <input type="radio" name="sbox" id="box_close" value="box_close" <?=checked("box_close", $arr_check);?>><label for="box_close"> ปิด</label>
        </div>

    </div>
    <div class="form-group">

        <label class="col-sm-3 control-label">ตั้งค่าตัวแบ่ง</label>
        <div class="col-sm-3">
            <input type="text" name="paser_text" id="paserText" href="" width="20%" value="<?=$arr_check['paser_text'];?>" oninput="showPaser()">
            <span id="paserTextValue"></span>

        </div>
    </div>
    <hr>

    <div class="form-group">
        <div class="col-sm-3 control-label">ใช้งานจัดการไฟล์ขยะอัตโนมัติ</div>
        <div class="col-sm-9">
            <lable for="clean_open"><input type="radio" name="clean" id="clean_open" value="clean_open" <?=checked("clean_open", $arr_check);?>> เปิด</lable>
            <label for="clean_close"><input type="radio" name="clean" id="clean_close" value="clean_close" <?=checked("clean_close", $arr_check);?>> ปิด</label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Database Prefix</label>
        <div class="col-sm-9">
            <?=($GLOBALS['db']['prefix']=="")?"ไม่มี":$GLOBALS['db']['prefix'];?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            <input type="submit" class="btn btn-default" value="ยืนยันการตั้งค่า">
        </div>
    </div>



</form>
