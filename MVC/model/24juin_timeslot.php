<?php
require_once 'BaseModel.php';
class Timeslot extends BaseModel {
	protected $table_name = 'timeslot';
	protected $primary_key = "id_timeslot";
	protected $id_timeslot = 0;
	protected $day;
	protected $am;



	function getTimeslot(){
	    $aListOfTimeslot= $this->getListOfAllDBObjects();
	    return $aListOfTimeslot;
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
     * @return Timeslot
     */
    protected function setId_timeslot($id_timeslot){
        $this->id_timeslot = $id_timeslot;
        return $this;
    }

    /**
     * day
     * @return unkown
     */
    protected function getDay(){
        return $this->day;
    }

    /**
     * day
     * @param unkown $day
     * @return Timeslot
     */
    protected function setDay($day){
        $this->day = $day;
        return $this;
    }

    /**
     * am
     * @return unkown
     */
    protected function getAm(){
        return $this->am;
    }

    /**
     * am
     * @param unkown $am
     * @return Timeslot
     */
    protected function setAm($am){
        $this->am = $am;
        return $this;
    }

}