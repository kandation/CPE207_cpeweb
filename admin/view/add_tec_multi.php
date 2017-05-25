<?php
$std_add_multi = new AddMulti("tech_listname");
$std_add_multi->text_process();


$addPhoto = new AddPhoto("student",'../teacher_img/');
$errorNSL = [];
$errorWN = [];
if($addPhoto->getErrorNotf()||$addPhoto->getNotification()){
    $errorWN = $addPhoto->getErrorNotf();
    $errorNSL = $addPhoto->getNotification();
}

if ($std_add_multi->getError() || $std_add_multi->getNotification()){
    $errorWN = $std_add_multi->getError();
    $errorNSL = $std_add_multi->getNotification();

}
//$std_add_multi->show_error();
//$std_add_multi->show_notification();
$tim_str = "";
foreach ($std_add_multi->getPaser() as $tim){
    $tim_str .= "      |      ".$tim;
}



?>

<script src="../../jquery-3.2.1.min.js"></script>
<script>
        var str_t = "590610627	ธีรยุทธ	ปัญโญเหียงยุทธ	TEERAYUT\naaaaaaaaa\n\nddddddddd\teeeeeeeed";
        var str_n = "590610627	ธีรยุทธ	ปัญโญเหียงยุทธ	TEERAYUT\tssssssss\n";
        var str_s = "ss";
        $(document).ready(function (e) {
            $('#data').val(str_n);
        });
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Single Box Query</h3>
            </div>
            <div class="panel-body">
                <form action="?p=add_student" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <div class="col-sm-12">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="file" name="img[]" multiple>
                            <input type="submit" class="btn btn-default" name="" value="อัปโหลดภาพ" id="">
                        </div>
                    </div>

                </form>
                <form action="?p=add_student" method="post">

                    <div class="col-xs-12 col-sm-12">

                        <div class="form-group">
                            <div class="col-sm-12">
                                <h5>ควรเป็นไปตามหัวข้อเหล่านี้ <br /><small><?=$tim_str;?></small></h5>
                                <h6>แบ่งด้วย <?php $pps= $std_add_multi->getDetectMark();
                                            if($pps =="\t"){
                                                echo "\\t (Tab)";
                                            }
                                            elseif($pps ==","){
                                                echo ", (Comma)";
                                            }elseif($pps ==" "){
                                                echo "  (Space)";
                                            }?></h6>
                                <textarea name="q" id="data" cols="30" rows="10" style="width: 65%; height: 240px;">sss</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-default" name="" value="ประมวลรายชื่อ" id="">
                            </div>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>
</div>



