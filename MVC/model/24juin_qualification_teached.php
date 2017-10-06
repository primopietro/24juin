<?php
require_once 'BaseModel.php';
class QualificationTeached extends BaseModel {
	protected $table_name = 'qualification_teached';
	protected $primary_key = "id_qualification_teached";
	protected $id_qualification_teached = 0;
	protected $id_qualification = 0;
	protected $year = 0;

  


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
     * @return QualificationTeached
     */
    protected function setId_qualification_teached($id_qualification_teached){
        $this->id_qualification_teached = $id_qualification_teached;
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
     * @return QualificationTeached
     */
    protected function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }

    /**
     * year
     * @return unkown
     */
    protected function getYear(){
        return $this->year;
    }

    /**
     * year
     * @param unkown $year
     * @return QualificationTeached
     */
    protected function setYear($year){
        $this->year = $year;
        return $this;
    }

}
