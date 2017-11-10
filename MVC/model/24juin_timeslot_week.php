<?php
require_once 'BaseModel.php';
class TimeslotWeek extends BaseModel {
	protected $table_name = 'timeslot_week';
	protected $primary_key = "id_timeslot_week";
	protected $id_timeslot_week = 0;
	protected $id_week = 0;
	protected $id_timeslot = 0;

	public  function getId_timeslot_week(){
	    return $this->id_timeslot_week;
	}
	public  function setId_timeslot_week($anId){
	     $this->id_timeslot_week = $anId;
	}
	
	public  function getId_timeslot(){
	    return $this->id_timeslot;
	}
	public  function setId_timeslot($anId){
	    $this->id_timeslot = $anId;
	}
	
	public  function getId_week(){
	    return $this->id_week;
	}
	public  function setId_week($anId){
	    $this->id_week = $anId;
	}
}
