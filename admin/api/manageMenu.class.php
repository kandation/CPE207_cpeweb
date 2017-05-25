<?php
include_once dirname(__FILE__)."/../inc/inc_menu.inc.php";
class manageMenu{
    private $f;
    public function __construct(){
        $this->f = "0";
    }
    public function get_menu(){
        foreach ($GLOBALS['admin_menu'] as $r){
            echo '<a href="'.$r[2].'">'.$r[0].'</a> ';
        }
    }

    public function getList(){
        return $GLOBALS['admin_menu'];
    }

}