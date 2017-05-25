<?php
class PersonProcess{
    private $type;

    public function __construct($t){
        if ($t == "student"){
            $this->type = "std_listname";
        }else{
            $this->type = "tech_listname";
        }
    }

    private function connect($sql){
        return db_connect()->query($sql);
    }
    public function get_list_from_db(){
        $sql = "SELECT * FROM ".$this->type."";
        $result = $this->connect($sql);
        $arr_data = [];
        while ($row = $result->fetch_assoc()){
            array_push($arr_data, $row);
        }
        return $arr_data;
    }
    public function find_data_by_sid($sid){
        $db_type = ($this->type == "std_listname")?"sid":"sid";
        $sql = "SELECT * FROM ".$this->type." WHERE ".$db_type."='".$sid."'";
        $result = $this->connect($sql);
        $arr_data = [];
        while ($row = $result->fetch_assoc()){
            array_push($arr_data, $row);
        }
        return $arr_data;
    }
    public function find_data_by_year($year){
        $f = strval($year)[0];
        $l = strval($year)[1];
        $sql = "SELECT * FROM ".$this->type." WHERE (sid REGEXP '^[".$f."][".$l."]')";
        $result = $this->connect($sql);
        $arr_data = [];
        while ($row = $result->fetch_assoc()){
            array_push($arr_data, $row);
        }
        return $arr_data;
    }
}

?>