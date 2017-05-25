<?php
include_once dirname(__FILE__) . "/../inc/inc_dbcon.inc.php";
include_once dirname(__FILE__)."/../../config.inc.php";

class AddSinglePhoto{
    private $error_notf = array();
    private $notification = array();
    private $db_type = "";
    private $root = "";

    public function __construct($type, $root){
        $this->root = $root;
        if($type == "student"){
            $this->db_type = "std_img_list";
            $this->main($type);
        }else{
            $this->db_type = "tec_img_list";
            $this->main($type);
        }

    }

    public function image_encyption($name){
        return md5($name);
    }

    private function main($type){
        //var_dump($_FILES);
        // error message
        $error_file = array();
        $error_file_numberic = array();
        if(isset($_FILES['img'])){
            // start
            $stack = 0;
            $all_stack = sizeof($_FILES['img']['name']);
            foreach ($_FILES['img']['name'] as $index=>$v){
                $basename = pathinfo(basename($v),PATHINFO_FILENAME);
                $sid_file_length = strlen($basename);
                $cv_int = intval(str_replace(" ", "", $basename));
                // Type Select
                $condition = null;
                if($type == "student"){
                    $condition = is_numeric($cv_int) && $sid_file_length == 9 && $cv_int > 0;
                }else{
                    $condition = is_numeric($cv_int) && $cv_int > 0;
                }
                if($condition){
                    $infopath = pathinfo(basename($v),PATHINFO_EXTENSION);
                    if (in_array($infopath, $GLOBALS['img']['support'])){
                        // Upload
                        $stack += 1;
                        $this->uploaded($index, $all_stack, $stack);
                    }else {
                        array_push($error_file, $_FILES['img']['name'][$index]);
                    }
                }else if(!$condition){
                    array_push($error_file_numberic,$v);
                }else{
                    array_push($this->error_notf, "ข้อผิดพลาดที่ไม่รู้จัก");
                }

            }
            if ($stack != $all_stack && $stack > 0){
                array_push($this->notification, "ดูเหมือนการเพิ่มลงฐานข้อมูลจะทำได้เพียง ".$stack." ใน ".$all_stack." เอง");
            }
            if($error_file){
                $str = "เดี๋ยวนะ! เราไม่อนุญาติไฟล์ ";
                array_push($this->error_notf,$str.$this->error_expend($error_file));
            }
            if ($error_file_numberic){
                if (sizeof($error_file_numberic) <= 1 && $error_file_numberic[0] == ""){
                    $str = "ไม่เห็นมาอะไรส่งมาแล้ว ลองตรวจดูอีกทีสิ";
                }else{
                    $str = "ชื่อไฟล์ภาพ ".$this->error_expend($error_file_numberic)."ไม่ถูกต้อง (อันที่จริงมันควรจะเป็นรหัสนักศึกษา)";
                }

                array_push($this->error_notf, $str);
            }
            $this->error_notf = array_unique($this->error_notf);
            $this->notification = array_unique($this->notification);
            //header("Refresh:3");
        }
    }

    private function uploaded($index, $num_all_img, $stack){
        $dir = realpath($this->root)."/";

        //$filename = $dir.basename($_FILES['img']['name'][$index]);
        $extension = explode('/',$_FILES['img']['type'][$index])[1] ;
        $filename = $this->image_encyption($_FILES['img']['name'][$index]);
        //Insert name to DB
        // [][][]

        $gg = $filename.".".$extension;
        $sql = "INSERT INTO ".$this->db_type." (`sid`, `url`) VALUES ('".$_FILES['img']['name'][$index]."','".$gg."');";
        db_connect()->query($sql);

        $path = $dir.$filename.".".$extension;
        $tmp = $_FILES['img']['tmp_name'][$index];
        if (move_uploaded_file($tmp, $path)){
            if($stack == $num_all_img){
                array_push($this->notification,"ง่ายๆสบายมาก เพิ่มรูปภาพลงในฐานข้อมูลเรียบร้อยแล้ว");
            }
        }else{
            array_push($this->error_notf, "ดูเหมือนว่าจะไม่สามารถเพิ่มเข้าฐานข้อมูลได้ซะแล้ว");
        }
    }

    private function error_expend($error){
        $str = "";
        foreach ($error as $name){
            $str .= $name." ";
        }return $str;
    }

    public function show_diabox(){
        if($this->error_notf){
            foreach ($this->error_notf as $e){
                echo $e."<br />";
            }
        }
        if ($this->notification){
            foreach ($this->notification as $e){
                echo $e."<br />";
            }
        }

    }

    public function getErrorNotf(){
        return $this->error_notf;
    }
    public function getNotification(){
        return $this->notification;
    }

}


?>