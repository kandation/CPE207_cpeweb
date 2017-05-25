<?php
include_once dirname(__FILE__)."/api/mangeBroken.class.php";
include_once dirname(__FILE__) . "/inc/inc_dbcon.inc.php";

$errorNSL = [];
$errorWN = [];

$sql = "SELECT * FROM std_listname";
$res = db_connect()->query($sql);
if(isset($_GET['q']) && isset($_GET['id'])){
    $sql = "DELETE FROM std_listname WHERE sid='".$_GET['id']."'";
    $res = db_connect()->query($sql);
    if($res){
        $errorNSL = ["ลบละ"];
        include_once "static/notification.php";
        header("Refresh:1; url='?p=del_std");

    }else {
        echo "พัง";
    }

}else{
?>
<table cellpadding="0" border="1" cellspacing="0" class="table table-bordered">
    <?php
    while ($row = $res->fetch_assoc()){
        //echo $row['sid']."<br/>";

        ?>
        <tr>
            <td><a href="?p=del_std&q=rm&id=<?php echo $row['sid'];?>">ลบ</a></td>
            <?php
            $i=0;
            foreach ($row as $r){
                ?>
            <td><?=$r?></td>
            <?php
                $i++;
                if($i == 5)break;

            }
            ?>
        </tr>
    <?php
    }

    ?>


</table>

<?php }?>


