<?php
include_once dirname(__FILE__) . "/../inc/inc_dbcon.inc.php";
$errorNSL = [];
$errorWN = [];

$admConfig = db_admin_getConfig();

if($admConfig['sbox'] == "box_open"){
    include_once dirname(__FILE__) . "/../view/add_tec_multi.php";
}else{
    include_once dirname(__FILE__) . "/../view/add_tec_single.php";
}

?>