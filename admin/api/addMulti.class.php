<?php
class AddMulti{
    private $now_working_in = "";
    private $error_notf = array();
    private $notf = array();
    private $detect_mark = "\t";

    private $paser;

    function __construct($work){
        $this->now_working_in = $work;
        $this->paser = get_table_header($this->now_working_in);
    }

    private function empty_text_filter($text){
        return ($text != '' && !is_null($text) && urlencode($text) != '%0D');
    }

    private function insert_to_table($datas){
        global $conn;
        $keys = get_table_header($this->now_working_in);
        $arr = array();
        foreach ($datas as $d){
            array_push($arr, $d);
        }
        $i=0;
        $cols ="";
        $vals ="";
        foreach ($keys as $k){
            $cols .= "`".$k."` ,";
            $vals .= "'".$arr[$i] . "' ,";
            $i++;
        }
        $cols = rtrim($cols,",");
        $vals = rtrim($vals,",");

        $sql = "INSERT INTO ".$this->now_working_in."  (".$cols . ") VALUES(".$vals .")";
        $conn->query($sql);
    }

    public function text_process(){
        if(isset($_POST['q'])){
            // Config

            $db_table_num = sizeof($this->paser);
            // Set Error variable
            $error_nothing_elements = 0;
            $error = array();
            $notti = array();
            // Getting form method
            $data = $_POST['q'];
            // sub-seq new line
            $data = explode("\n", $data);
            // fillter Empty Array
            if(sizeof($data) > 0 && isset($data)) {
                // Counter
                $error_nothing_elements = 0;
                $error_count_element_num = 0;
                // filter empty array
                $data = array_filter($data, array($this, 'empty_text_filter'));

                // save first counter
                $error_data_num_first = sizeof($data);
                if(!$data){
                    $error_nothing_elements += 1;
                    $error_count_element_num += 1;
                }
                // read all data
                foreach ($data as $d) {
                    //  filter non-string
                    if ($this->empty_text_filter($d)) {
                        // sub-seq by delimeter
                        $seqs = explode($this->detect_mark, $d);
                        // read personal data
                        if(sizeof($seqs) == $db_table_num ){
                            $error_count_element_num += 1;
                            $this->insert_to_table($seqs);
                            /*foreach ($seqs as $seq) {
                               // echo $seq."<br>";
                            }*/
                        }else{
                            array_push($this->error_notf,"จำนวน Elements หรือ ตัวคั่น (line: ".($error_count_element_num+1).") ที่รับมาไม่ตรงกับที่กำหนดไว้ โปรดแก้ไข<small><a href=\"#\">ตั้งค่า</a></small>");
                            break;
                        }
                    } else {
                        // counter
                        $error_nothing_elements += 1;
                        $error_count_element_num += 2;
                    }
                }
                if ($error_count_element_num == $error_data_num_first){
                    array_push($this->notf, "เย่ ส่งเสร็จหมดแล้ว");
                }
            }else{
                array_push($this->error_notf, "ดูเหมือนว่าระหว่างทางเราจะได้ข้อมูลไม่ครบ ลองส่งใหม่");
            }
            if($error_nothing_elements){
                array_push($this->error_notf, "ดูเหมือนว่าคุณจะลืมใส่เนื้อหาลงไป");
            }
        }
    }

    public function show_error(){
        if(sizeof($this->error_notf) > 0) {
            foreach ($this->error_notf as $value) {
                echo $value;
            }
        }
    }

    public function show_notification(){
        if(sizeof($this->notf) > 0){
            foreach ($this->notf as $value){
                echo $value;
            }
        }
    }

    public function getError(){
        return $this->error_notf;
    }

    public function getNotification(){
        return $this->notf;
    }

    public function getPaser(){
        return $this->paser;
    }

    public function getDetectMark(){
        return $this->detect_mark;
    }


}

?>