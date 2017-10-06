<?php
require_once 'BaseModel.php';
class ClassroomQualification extends BaseModel {
	protected $table_name = 'clasroom_qualification';
	protected $primary_key = "id_clasroom_qualification";
	protected $id_clasroom_qualification = 0;
	
	protected $id_classroom = 0;
	protected $id_qualification = 0;




    /**
     * id_clasroom_qualification
     * @return unkown
     */
    public function getId_clasroom_qualification(){
        return $this->id_clasroom_qualification;
    }

    /**
     * id_clasroom_qualification
     * @param unkown $id_clasroom_qualification
     * @return ClassroomQualification
     */
    public function setId_clasroom_qualification($id_clasroom_qualification){
        $this->id_clasroom_qualification = $id_clasroom_qualification;
        return $this;
    }

    /**
     * id_classroom
     * @return unkown
     */
    public function getId_classroom(){
        return $this->id_classroom;
    }

    /**
     * id_classroom
     * @param unkown $id_classroom
     * @return ClassroomQualification
     */
    public function setId_classroom($id_classroom){
        $this->id_classroom = $id_classroom;
        return $this;
    }

    /**
     * id_qualification
     * @return unkown
     */
    public function getId_qualification(){
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * @param unkown $id_qualification
     * @return ClassroomQualification
     */
    public function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }

}
