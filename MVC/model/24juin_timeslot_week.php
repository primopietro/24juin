<?php
require_once 'BaseModel.php';
class TimeslotWeek extends BaseModel {
    protected $table_name = 'timeslot_week';
    
    protected $primary_key = "id_timeslot_week";
    
    protected $id_timeslot_week = 0;
    
    protected $id_timeslot = 0;
    
    protected $id_week = 0;
    
    public function getTimeslotWeek()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
        
        $timeslot = new Timeslot();
        $aTimeslotList = $timeslot->getTimeslot();
        
        $TimeslotWeek = new TimeslotWeek();
        $TimeslotWeekList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aTimeslotList != null) {
            if (sizeof($aTimeslotList) > 0) {
                foreach ($aTimeslotList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_timeslot']]['timeslot'] = $anObject;
                    $TimeslotWeekList = $TimeslotWeek->getListOfAllDBObjectsWhere("id_timeslot"," = ", $anObject['id_timeslot']);
                    
                    if($TimeslotWeekList != null){
                        if(sizeof($TimeslotWeekList)>0){
                            foreach($TimeslotWeekList as $localTQ){
                                $aWeek = new Week();
                                $aWeek = $aWeek->getObjectFromDB($localTQ['id_week']);
                                $finalList[$anObject['id_timeslot']]['weeks'][] = $aWeek;
                            }
                        }
                    }
                    
                    // Get all Timeslot for this week
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachTimeslotWeekComponentList($aTimeslotWeek, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $arrayValues = $this->returnDayNameAndAmValue($aTimeslotWeek['timeslot']['day'],$aTimeslotWeek['timeslot']['AM']);
        $line .= "<td>" . $arrayValues[0] . " - " . $arrayValues[1] . "</td>";
        $line .= "<td>";
        
        if(isset($aTimeslotWeek['weeks'])){
            if($aTimeslotWeek['weeks'] != null){
                if(sizeof($aTimeslotWeek['weeks'])>0){
                    foreach($aTimeslotWeek['weeks'] as $aWeek){
                        if($aWeek['year'] == $_SESSION['year']){
                        $line .= $aWeek['name']  . " / " . $aWeek['date_start'] . " - " . $aWeek['date_finish'] ."<br>";
                        }
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='timeslot_week' action='update' class='action btn' idobj='" . $aTimeslotWeek['timeslot']['id_timeslot'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printTimeslotWeekList($aListOfTimeslotWeek, $canBeUpdated)
    {
        $content = "";
        if ($aListOfTimeslotWeek != null) {
            if (sizeof($aListOfTimeslotWeek) > 0) {
                foreach ($aListOfTimeslotWeek as $aTimeslotWeek) {
                    $content .= $this->getEachTimeslotWeekComponentList($aTimeslotWeek, $canBeUpdated);
                }
            }
        }
        return $content;
    }
    
    function deleteFromDBWhereAndTimeslot($id_timeslot, $year) {
        $sql = "DELETE tw FROM `" . $this->table_name . "` tw
 		JOIN week w ON w.id_week = tw.id_week
		WHERE id_timeslot = " . $id_timeslot . " AND w.year = '" . $year . "'";
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            return "success";
        } else {
            return  "fail";
        }
        
        $conn->close ();
    }
    
    function returnDayNameAndAmValue($day, $am){
        if($day == "1"){
            $DayName = "Lundi"; 
        }else if($day == "2"){
            $DayName = "Mardi"; 
        }else if($day == "3"){
            $DayName = "Mercredi";
        }else if($day == "4"){
            $DayName = "Jeudi";
        }else if($day == "5"){
            $DayName = "Vendredi";
        }else if($day == "6"){
            $DayName = "Samedi";
        }else if($day == "7"){
            $DayName = "Dimanche";
        }
        
        if($am == "1"){
            $AmValue = "Am1";
        }else if($am == "2"){
            $AmValue = "Am2";
        }else if($am == "3"){
            $AmValue = "Pm1";
        }else if($am == "4"){
            $AmValue = "Pm2";
        }
        
        return array($DayName,$AmValue);
    }
    
    /**
     * id_timeslot_week
     *
     * @return unkown
     */
    public function getId_timeslot_week()
    {
        return $this->id_timeslot_week;
    }
    
    /**
     * id_timeslot_week
     *
     * @param unkown $id_timeslot_week
     * @return TimeslotWeek
     */
    public function setId_timeslot_week($id_timeslot_week)
    {
        $this->id_timeslot_week = $id_timeslot_week;
        return $this;
    }
    
    /**
     * id_timeslot
     *
     * @return unkown
     */
    public function getId_timeslot()
    {
        return $this->id_timeslot;
    }
    
    /**
     * id_timeslot
     *
     * @param unkown $id_timeslot
     * @return Timeslot
     */
    public function setId_timeslot($id_timeslot)
    {
        $this->id_timeslot = $id_timeslot;
        return $this;
    }
    
    /**
     * id_week
     *
     * @return unkown
     */
    public function getId_week()
    {
        return $this->id_week;
    }
    
    /**
     * id_week
     *
     * @param unkown $id_week
     * @return IdWeek
     */
    public function setId_week($id_week)
    {
        $this->id_week = $id_week;
        return $this;
    }
}
