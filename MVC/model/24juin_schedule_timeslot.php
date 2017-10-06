<?php
require_once 'BaseModel.php';
class ScheduleTimeslot extends BaseModel {
	protected $table_name = 'schedule_timeslot';
	protected $primary_key = "id_schedule_timeslot";
	protected $id_schedule_timeslot = 0;
	protected $id_timeslot = 0;
	protected $id_schedule = 0;


    /**
     * id_schedule_timeslot
     * @return unkown
     */
    protected function getId_schedule_timeslot(){
        return $this->id_schedule_timeslot;
    }

    /**
     * id_schedule_timeslot
     * @param unkown $id_schedule_timeslot
     * @return ScheduleTimeslot
     */
    protected function setId_schedule_timeslot($id_schedule_timeslot){
        $this->id_schedule_timeslot = $id_schedule_timeslot;
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
     * @return ScheduleTimeslot
     */
    protected function setId_timeslot($id_timeslot){
        $this->id_timeslot = $id_timeslot;
        return $this;
    }

    /**
     * id_schedule
     * @return unkown
     */
    protected function getId_schedule(){
        return $this->id_schedule;
    }

    /**
     * id_schedule
     * @param unkown $id_schedule
     * @return ScheduleTimeslot
     */
    protected function setId_schedule($id_schedule){
        $this->id_schedule = $id_schedule;
        return $this;
    }

}
