?php
include_once dirname(__FILE__)."/api.php";

$imga = new ImageApi();
echo $imga->get_student_img(580610688);
?>