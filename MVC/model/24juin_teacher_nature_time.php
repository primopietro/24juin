<?php
require_once 'BaseModel.php';
class TeacherNatureTime extends BaseModel {
	protected $table_name = 'teacher_nature_time';
	protected $primary_key = "id_teacher_nature_time";
	protected $id_teacher_nature_time = 0;
	protected $id_nature_time = 0;
	protected $id_teacher = 0;

    /**
     * id_teacher_nature_time
     * @return INT
     */
    public function getId_teacher_nature_time(){
        return $this->id_teacher_nature_time;
    }

    /**
     * id_teacher_nature_time
     * @param INT $id_teacher_nature_time
     * @return NatureTime
     */
    public function setId_teacher_nature_time($id_teacher_nature_time){
        $this->id_teacher_nature_time = $id_teacher_nature_time;
        return $this;
    }

    /**
     * id_nature_time
     * @return INT
     */
    public function getId_nature_time(){
        return $this->id_nature_time;
    }

    /**
     * id_nature_time
     * @param INT $id_nature_time
     * @return NatureTime
     */
    public function setId_nature_time($id_nature_time){
        $this->id_nature_time = $id_nature_time;
        return $this;
    }

    /**
     * id_teacher
     * @return INT
     */
    public function getId_teacher(){
        return $this->id_teacher;
    }

    /**
     * id_teacher
     * @param INT $id_teacher
     * @return NatureTime
     */
    public function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
        return $this;
    }

}