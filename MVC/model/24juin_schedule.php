<?php
require_once 'BaseModel.php';
class Schedule extends BaseModel {
	protected $table_name = 'schedule';
	protected $primary_key = "id_schedule";
	protected $id_schedule = 0;
	protected $code = "";
	protected $year = "";
	protected $schedule = "";

    /**
     * id_schedule
     * @return INT
     */
    public function getId_schedule(){
        return $this->id_schedule;
    }

    /**
     * id_schedule
     * @param INT $id_schedule
     * @return Schedule
     */
    public function setId_schedule($id_schedule){
        $this->id_schedule = $id_schedule;
        return $this;
    }

    /**
     * code
     * @return String
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * code
     * @param String $code
     * @return Schedule
     */
    public function setCode($code){
        $this->code = $code;
        return $this;
    }

    /**
     * year
     * @return String
     */
    public function getYear(){
        return $this->year;
    }

    /**
     * year
     * @param String $year
     * @return Schedule
     */
    public function setYear($year){
        $this->year = $year;
        return $this;
    }

    /**
     * schedule
     * @return String
     */
    public function getSchedule(){
        return $this->schedule;
    }

    /**
     * schedule
     * @param String $schedule
     * @return Schedule
     */
    public function setSchedule($schedule){
        $this->schedule = $schedule;
        return $this;
    }
    
    function getScheduleList(){
        $aListOfSchedule = $this->getListOfAllDBObjects();
        return $aListOfSchedule;
    }
    
    function printScheduleList($aListOfSchedule){
        $content = '';
        if($aListOfSchedule != null){
            foreach($aListOfSchedule as $aSchedule){
                $content .= $this->getEachScheduleComponentList($aSchedule);
            }
        }
        
        return $content;
    }
    
    function getEachScheduleComponentList($aSchedule){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aSchedule['code']. "</td>";
        $line .= "<td>" . $aSchedule['schedule'] . "</td>";
        $line .= "<td><a id='consultSchedule' idSchedule='".$aSchedule['id_schedule']."'>Consulter</a></td>";
        $line .= "</tr>";
        
        return $line;
    }

}