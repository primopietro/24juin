<?php
require_once 'BaseModel.php';
class Schedule extends BaseModel {
	protected $table_name = 'schedule';
	protected $primary_key = "id_schedule";
	protected $id_schedule =0;
	protected $code =0;
	protected $year =0;



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
     * @return Schedule
     */
    protected function setId_schedule($id_schedule){
        $this->id_schedule = $id_schedule;
        return $this;
    }

    /**
     * code
     * @return unkown
     */
    protected function getCode(){
        return $this->code;
    }

    /**
     * code
     * @param unkown $code
     * @return Schedule
     */
    protected function setCode($code){
        $this->code = $code;
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
     * @return Schedule
     */
    protected function setYear($year){
        $this->year = $year;
        return $this;
    }

}