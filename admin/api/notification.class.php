<?php
class Notification{
    private $list_notf= array();
    private $list_warn= array();
    public function __construct($aaa){
        array_push($this->list_notf,$aaa);
        array_push($this->list_warn,$aaa);
    }

    public function show_notification(){
        foreach ($this->list_notf as $notf){
            echo '<div class="notification">'.$notf.'</div>';
        }
    }

    public function show_warnning(){
        foreach ($this->list_warn as $warn){
            echo '<div class="warnning">'.$warn.'</div>';
        }
    }

    public function add_notification($str){
        if (is_string($str) || is_numeric($str)){
            array_push($this->list_notf, $str);
        }else{
            array_push($this->list_warn, "แจ้งเตือนควรเป็นตัวอักษรหรือตัวเลข");
        }
    }
    public function add_arr_notification($str){
        foreach ($str as $a){
            $this->add_notification($a);
        }
        $this->list_notf = array_unique($this->getNotification());
    }

    public function add_warnning($str){
        if (is_string($str) || is_numeric($str)){
            array_push($this->list_warn, $str);
        }else{
            array_push($this->list_warn, "คำเตือนควรเป็นตัวอักษรหรือตัวเลข");
        }
    }

    public function add_arr_warnning($str){
        foreach ($str as $a){
            $this->add_warnning($a);
        }
        $this->list_warn = array_unique($this->getWarnning());
    }

    public function getNotification(){
        return $this->list_notf;
    }

    public function getWarnning(){
        return $this->list_warn;
    }
}

?>