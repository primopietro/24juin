<?php
require_once 'BaseModel.php';
class TeacherQualificationTeached extends BaseModel {
	protected $table_name = 'teacher_qualification_teached';
	protected $primary_key = "id_teacher_qualification_teached";
	protected $id_teacher_qualification_teached = 0;
	protected $id_teacher = 0;
	protected $id_qualification_teached = 0;




    /**
     * id_teacher_qualification_teached
     * @return unkown
     */
    protected function getId_teacher_qualification_teached(){
        return $this->id_teacher_qualification_teached;
    }

    /**
     * id_teacher_qualification_teached
     * @param unkown $id_teacher_qualification_teached
     * @return TeacherQualificationTeached
     */
    protected function setId_teacher_qualification_teached($id_teacher_qualification_teached){
        $this->id_teacher_qualification_teached = $id_teacher_qualification_teached;
        return $this;
    }

    /**
     * id_teacher
     * @return unkown
     */
    protected function getId_teacher(){
        return $this->id_teacher;
    }

    /**
     * id_teacher
     * @param unkown $id_teacher
     * @return TeacherQualificationTeached
     */
    protected function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
        return $this;
    }

    /**
     * id_qualification_teached
     * @return unkown
     */
    protected function getId_qualification_teached(){
        return $this->id_qualification_teached;
    }

    /**
     * id_qualification_teached
     * @param unkown $id_qualification_teached
     * @return TeacherQualificationTeached
     */
    protected function setId_qualification_teached($id_qualification_teached){
        $this->id_qualification_teached = $id_qualification_teached;
        return $this;
    }

}
