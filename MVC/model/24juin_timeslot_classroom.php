<?php
require_once 'BaseModel.php';
class TimeslotTeacher extends BaseModel {
    protected $table_name = 'timeslot_classroom';
    
    protected $primary_key = "id_timeslot_classroom";
    
    protected $id_timeslot_classroom = 0;
    
    protected $id_timeslot = 0;
    
    protected $id_classroom = 0;
    
    public function getTimeslotClassroom()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
        
        $timeslot = new Timeslot();
        $aTimeslotList = $timeslot->getTimeslot();
        
        $TimeslotClassroom = new TimeslotClassroom();
        $TimeslotClassroomList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aTimeslotList != null) {
            if (sizeof($aTimeslotList) > 0) {
                foreach ($aTimeslotList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_timeslot']]['timeslot'] = $anObject;
                    $TimeslotClassroomList = $TimeslotClassroom->getListOfAllDBObjectsWhere("id_timeslot"," = ", $anObject['id_timeslot']);
                    
                    if($TimeslotClassroomList != null){
                        if(sizeof($TimeslotClassroomList)>0){
                            foreach($TimeslotClassroomList as $localTQ){
                                $aClassroom = new Classroom();
                                $aClassroom = $aClassroom->getObjectFromDB($localTQ['id_classroom']);
                                $finalList[$anObject['id_timeslot']]['classrooms'][] = $aClassroom;
                            }
                        }
                    }
                    
                    // Get all Timeslot for this classroom
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachTimeslotClassroomComponentList($aTimeslotClassroom, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $arrayValues = $this->returnDayNameAndAmValue($aTimeslotClassroom['timeslot']['day'],$aTimeslotClassroom['timeslot']['AM']);
        $line .= "<td>" . $arrayValues[0] . " - " . $arrayValues[1] . "</td>";
        $line .= "<td>";
        
        if(isset($aTimeslotClassroom['classrooms'])){
            if($aTimeslotClassroom['classrooms'] != null){
                if(sizeof($aTimeslotClassroom['classrooms'])>0){
                    foreach($aTimeslotClassroom['classrooms'] as $aClassroom){
                        $line .= $aClassroom['code']  ."<br>";
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='timeslot_classroom' action='update' class='action btn' idobj='" . $aTimeslotClassroom['timeslot']['id_timeslot'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printTimeslotClassroomList($aListOfTimeslotClassroom, $canBeUpdated)
    {
        $content = "";
        if ($aListOfTimeslotClassroom != null) {
            if (sizeof($aListOfTimeslotClassroom) > 0) {
                foreach ($aListOfTimeslotClassroom as $aTimeslotClassroom) {
                    $content .= $this->getEachTimeslotClassroomComponentList($aTimeslotClassroom, $canBeUpdated);
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
     * id_timeslot_classroom
     *
     * @return unkown
     */
    public function getId_timeslot_classroom()
    {
        return $this->id_timeslot_classroom;
    }
    
    /**
     * id_timeslot_classroom
     *
     * @param unkown $id_timeslot_classroom
     * @return TimeslotClassroom
     */
    public function setId_timeslot_classroom($id_timeslot_classroom)
    {
        $this->id_timeslot_classroom = $id_timeslot_classroom;
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
     * id_classroom
     *
     * @return unkown
     */
    public function getId_classroom()
    {
        return $this->id_classroom;
    }
    
    /**
     * id_classroom
     *
     * @param unkown $id_classroom
     * @return IdClassroom
     */
    public function setId_classroom($id_classroom)
    {
        $this->id_classroom = $id_classroom;
        return $this;
    }
}
