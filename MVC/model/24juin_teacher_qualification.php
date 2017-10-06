<?php
require_once 'BaseModel.php';
class TeacherQualification extends BaseModel {
	protected $table_name = 'teacher_qualification';
	protected $primary_key = "id_teacher_qualification";
	protected $id_teacher_qualification = 0;
	protected $id_teacher = 0;
	protected $id_qualification = 0;


    /**
     * id_teacher_qualification
     * @return unkown
     */
    protected function getId_teacher_qualification(){
        return $this->id_teacher_qualification;
    }

    /**
     * id_teacher_qualification
     * @param unkown $id_teacher_qualification
     * @return TeacherQualification
     */
    protected function setId_teacher_qualification($id_teacher_qualification){
        $this->id_teacher_qualification = $id_teacher_qualification;
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
     * @return TeacherQualification
     */
    protected function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
        return $this;
    }

    /**
     * id_qualification
     * @return unkown
     */
    protected function getId_qualification(){
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * @param unkown $id_qualification
     * @return TeacherQualification
     */
    protected function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }

}
