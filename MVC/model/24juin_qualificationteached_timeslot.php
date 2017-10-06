<?php
require_once 'BaseModel.php';
class QualificationTeachedTimeslot extends BaseModel {
	protected $table_name = 'qualificationteached_timeslot';
	protected $primary_key = "id_qualificationteached_timeslot";
	protected $id_qualificationteached_timeslot =0;
	protected $id_timeslot =0;
	protected $id_qualificationteached =0;
	



    /**
     * id_qualificationteached_timeslot
     * @return unkown
     */
    protected function getId_qualificationteached_timeslot(){
        return $this->id_qualificationteached_timeslot;
    }

    /**
     * id_qualificationteached_timeslot
     * @param unkown $id_qualificationteached_timeslot
     * @return QualificationTeachedTimeslot
     */
    protected function setId_qualificationteached_timeslot($id_qualificationteached_timeslot){
        $this->id_qualificationteached_timeslot = $id_qualificationteached_timeslot;
        return $this;
    }

    /**
     * id_timeslot
     * @return unkown
     */
    protected function getId_timeslot(){
        return $this->id_timeslot;
    }

    /**
     * id_timeslot
     * @param unkown $id_timeslot
     * @return QualificationTeachedTimeslot
     */
    protected function setId_timeslot($id_timeslot){
        $this->id_timeslot = $id_timeslot;
        return $this;
    }

    /**
     * id_qualificationteached
     * @return unkown
     */
    protected function getId_qualificationteached(){
        return $this->id_qualificationteached;
    }

    /**
     * id_qualificationteached
     * @param unkown $id_qualificationteached
     * @return QualificationTeachedTimeslot
     */
    protected function setId_qualificationteached($id_qualificationteached){
        $this->id_qualificationteached = $id_qualificationteached;
        return $this;
    }

}