<?php
require_once 'BaseModel.php';
class TimeslotTeacher extends BaseModel {
    protected $table_name = 'timeslot_teacher';
    
    protected $primary_key = "id_timeslot_teacher";
    
    protected $id_timeslot_teacher = 0;
    
    protected $id_timeslot = 0;
    
    protected $id_teacher = 0;
    
    public function getTimeslotTeacher()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
        
        $timeslot = new Timeslot();
        $aTimeslotList = $timeslot->getTimeslot();
        
        $TimeslotTeacher = new TimeslotTeacher();
        $TimeslotTeacherList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aTimeslotList != null) {
            if (sizeof($aTimeslotList) > 0) {
                foreach ($aTimeslotList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_timeslot']]['timeslot'] = $anObject;
                    $TimeslotTeacherList = $TimeslotTeacher->getListOfAllDBObjectsWhere("id_timeslot"," = ", $anObject['id_timeslot']);
                    
                    if($TimeslotTeacherList != null){
                        if(sizeof($TimeslotTeacherList)>0){
                            foreach($TimeslotTeacherList as $localTQ){
                                $aTeacher = new Teacher();
                                $aTeacher = $aTeacher->getObjectFromDB($localTQ['id_teacher']);
                                $finalList[$anObject['id_timeslot']]['teachers'][] = $aTeacher;
                            }
                        }
                    }
                    
                    // Get all Timeslot for this week
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachTimeslotTeacherComponentList($aTimeslotTeacher, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $arrayValues = $this->returnDayNameAndAmValue($aTimeslotTeacher['timeslot']['day'],$aTimeslotTeacher['timeslot']['AM']);
        $line .= "<td>" . $arrayValues[0] . " - " . $arrayValues[1] . "</td>";
        $line .= "<td>";
        
        if(isset($aTimeslotTeacher['teachers'])){
            if($aTimeslotTeacher['teachers'] != null){
                if(sizeof($aTimeslotTeacher['teachers'])>0){
                    foreach($aTimeslotTeacher['teachers'] as $aTeacher){
                        $line .= $aTeacher['code'] . " - " . $aTeacher['first_name'] . "  " . $aTeacher['family_name']."<br>";
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='timeslot_teacher' action='update' class='action btn' idobj='" . $aTimeslotTeacher['timeslot']['id_timeslot'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printTimeslotTeacherList($aListOfTimeslotTeacher, $canBeUpdated)
    {
        $content = "";
        if ($aListOfTimeslotTeacher != null) {
            if (sizeof($aListOfTimeslotTeacher) > 0) {
                foreach ($aListOfTimeslotTeacher as $aTimeslotTeacher) {
                    $content .= $this->getEachTimeslotTeacherComponentList($aTimeslotTeacher, $canBeUpdated);
                }
            }
        }
        return $content;
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
     * id_timeslot_teacher
     *
     * @return unkown
     */
    public function getId_timeslot_teacher()
    {
        return $this->id_timeslot_teacher;
    }
    
    /**
     * id_timeslot_teacher
     *
     * @param unkown $id_timeslot_week
     * @return TimeslotTeacher
     */
    public function setId_timeslot_teacher($id_timeslot_teacher)
    {
        $this->id_timeslot_teacher = $id_timeslot_teacher;
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
     * id_teacher
     *
     * @return unkown
     */
    public function getId_teacher()
    {
        return $this->id_teacher;
    }
    
    /**
     * id_teacher
     *
     * @param unkown $id_teacher
     * @return IdTeacher
     */
    public function setId_teacher($id_teacher)
    {
        $this->id_teacher = $id_teacher;
        return $this;
    }
}
