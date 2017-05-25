<?php
include_once dirname(__FILE__) . "/api/imagesProcess.class.php";
include_once dirname(__FILE__) . "/api/personProcess.class.php";

/**
 * Created by PhpStorm.
 * User: Kanda
 * Date: 14/5/2560
 * Time: 1:17
 */
class ImageApi{
    private $img;

    public function __construct(){
        $this->img = new ImagesProcess();
    }
    public function get_student_img($sid){
        return $this->img->get_student_image($sid);
    }
    public function get_student_img_url($sid){
        return $this->img->get_student_image_url($sid);
    }
    public function get_teacher_img_url($sid){
        return $this->img->get_teacher_image_url($sid);
    }
}
class StudentApi{
    private $n;
    public function __construct($type){
        $this->n = new PersonProcess($type);
    }
    public function get_students_list(){
        /**Getting all student data form database
         * @retrun mysql_Object
         * @use  function()['data'];
         */
        return $this->n->get_list_from_db();
    }
    public function find_data_by_sid($sid){
        return $this->n->find_data_by_sid($sid);
    }

    public function find_data_by_year($year){
        return $this->n->find_data_by_year($year);
    }
}

class ConfigApi{

}

class DatabaseApi{

}
?>