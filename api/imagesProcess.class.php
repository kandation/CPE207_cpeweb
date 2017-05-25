<?php
    class ImagesProcess{
        private $dbtype;
        public function __construct($type="student"){
            $this->dbtype = $type;
        }

        public function get_student_image($sid){
            global $img,$conn;
            $sql = "SELECT * FROM std_img_list WHERE sid='".$sid."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(isset($row['url'])){
                $pic_img = $img['student_dir'].'/'.$row['url'];
            }else{
                $pic_img = "http://www.blingyourband.com/skin/frontend/blingyourband/blingyourbands/images/no-available-image.png";
            }
            return "<img class=\"teamImage\" src=\"".$pic_img."\" alt=\"\" width=\"".$img['student_pro_w']."\">";
        }

        public function get_student_image_url($sid){
            global $img,$conn;
            $tt = ($this->dbtype = "student")?"std_img_list":"tec_img_list";
            $type = ($this->dbtype == "student")?"sid":"sid";
            $sip = ($this->dbtype == "student")?$sid:$sid.".png";
            //echo $this->dbtype ;
            $sql = "SELECT * FROM ".$tt." WHERE ".$type."='".$sip."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(isset($row['url'])){
                $pic_img = $img['student_dir'].'/'.$row['url'];
            }else{
                $pic_img = "http://www.blingyourband.com/skin/frontend/blingyourband/blingyourbands/images/no-available-image.png";
            }
            return $pic_img;
        }

        public function get_teacher_image($sid){
            global $img,$conn;
            $type = ($this->dbtype == "student")?"sid":"sid";
            $tt = ($this->dbtype == "student")?"std_img_list":"tec_img_list";
            $sql = "SELECT * FROM ".$tt." WHERE ".$type."='".$sid."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(isset($row['url'])){
                $pic_img = $img['student_dir'].'/'.$row['url'];
            }else{
                $pic_img = "http://www.blingyourband.com/skin/frontend/blingyourband/blingyourbands/images/no-available-image.png";
            }
            return "<img src=\"".$pic_img."\" alt=\"\" width=\"".$img['student_pro_w']."\">";
        }

        public function get_teacher_image_url($sid){
            global $img,$conn;
            $tt = ($this->dbtype = "student")?"std_img_list":"tec_img_list";
            $type = ($this->dbtype == "student")?"sid":"sid";
               //echo $this->dbtype ;
            $sql = "SELECT * FROM tec_img_list WHERE sid='".$sid."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(isset($row['url'])){
                $pic_img = $img['teacher'].'/'.$row['url'];
            }else{
                $pic_img = "http://www.blingyourband.com/skin/frontend/blingyourband/blingyourbands/images/no-available-image.png";
            }
            return $pic_img;
        }

        public function get_list_images($type){
            global $img,$conn;
            $arr = array();
            if ($type == "student"){
                $table = "std_img_list";
            }else{
                $table = "tec_img_list";
            }
            $sql = "SELECT * FROM ".$table."";
            $result = $conn->query($sql);
            if($result){
                while ($data = $result->fetch_assoc()){
                    array_push($arr,$data);
                }
            }
            return $arr;
        }

    }
?>


