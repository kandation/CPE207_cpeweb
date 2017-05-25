<div class="collapse navbar-collapse navbar-ex1-collapse">
<?php
include_once dirname(__FILE__)."/../inc/inc_menu.inc.php";
$menu = $GLOBALS['admin_menu_header'];
$sub = $GLOBALS['admin_menu'];
$collect = [];
foreach ($menu as $hkey=>$hval){
    $collect[$hkey] = $hval;
    $collect[$hkey]['sub'] = [];
    foreach ($sub as $sk=>$sv){
        if ($sub[$sk][4] == $hkey){
            array_push($collect[$hkey]['sub'],$sv);
            //print_r($sv);
            //echo "<br>";
        }
    }
}
/*
echo "<pre>";
var_dump($collect);
echo "</pre>";
*/
echo '<ul class="nav navbar-nav side-nav">';
foreach ($collect as $mnk=>$mn) {
    if ($mn['type'] == "dd") {
        echo '<li>';
        echo '<a href="javascript:;" data-toggle="collapse" data-target="#'.$mnk.'" class="collapsed" aria-expanded="false"><i class="fa fa-fw fa-arrows-v"></i> ' . $mn['name'] . ' <i class="fa fa-fw fa-caret-down"></i></a>';
        echo '<ul id="'.$mnk.'" class="collapse" aria-expanded="false" style="height: 0px;">';
        foreach ($mn['sub'] as $sm) {
            echo '<li>';
            echo '<a href="' . $sm[3] . '">' . $sm[0] . '</a>';
            echo '</li>';
            //print_r($sm);
        }
        echo '</ul>';
        echo '</li>';
    }
    if ($mn['type'] == "ss") {

        echo '<li>';
        echo '<a href="'.$mn['sub'][0][3].'"><i class="fa fa-fw fa-dashboard"></i> ' . $mn['sub'][0][0] . '</a>';
        echo '</li>';
        //print_r($sm);

    }

}
echo '</ul>';

?>

</div>

