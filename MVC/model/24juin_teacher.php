<?php
require_once 'BaseModel.php';
class Prof extends BaseModel {
	protected $table_name = 'teacher';
	protected $primary_key = "id_teacher";
	protected $id_teacher;
	protected $first_name;
	protected $family_name;

	

    /**
     * id_teacher
     * @return int
     */
    public function getId_teacher(){
        return $this->id_teacher;
    }

    /**
     * id_teacher
     * @param int $id_teacher
     * @return Prof
     */
    public function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
        return $this;
    }

    /**
     * first_name
     * @return string
     */
    public function getFirst_name(){
        return $this->first_name;
    }

    /**
     * first_name
     * @param string $first_name
     * @return Prof
     */
    public function setFirst_name($first_name){
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * family_name
     * @return string
     */
    public function getFamily_name(){
        return $this->family_name;
    }

    /**
     * family_name
     * @param string $family_name
     * @return Prof
     */
    public function setFamily_name($family_name){
        $this->family_name = $family_name;
        return $this;
    }

}