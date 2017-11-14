<?php
require_once 'BaseModel.php';
class TimeslotQualificationTeached extends BaseModel {
    protected $table_name = 'timeslot_qualification_teached';
    
    protected $primary_key = "id_timeslot_qualification_teached";
    
    protected $id_timeslot_qualification_teached = 0;
    
    protected $id_timeslot = 0;
    
    protected $id_qualification_teached = 0;
    
    public function getTimeslotQualificationTeached()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
        
        $timeslot = new Timeslot();
        $aTimeslotList = $timeslot->getTimeslot();
        
        $TimeslotQualificationTeached = new TimeslotQualificationTeached();
        $TimeslotQualificationTeachedList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aTimeslotList != null) {
            if (sizeof($aTimeslotList) > 0) {
                foreach ($aTimeslotList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_timeslot']]['timeslot'] = $anObject;
                    $TimeslotQualificationTeachedList = $TimeslotQualificationTeached->getListOfAllDBObjectsWhere("id_timeslot"," = ", $anObject['id_timeslot']);
                    
                    if($TimeslotQualificationTeachedList != null){
                        if(sizeof($TimeslotQualificationTeachedList)>0){
                            foreach($TimeslotQualificationTeachedList as $localTQ){
                                $aQualificationTeached = new QualificationTeached();
                                $aQualificationTeached = $aQualificationTeached->getObjectFromDB($localTQ['id_qualification_teached']);
                                $finalList[$anObject['id_timeslot']]['qualifications_teached'][] = $aQualificationTeached;
                            }
                        }
                    }
                    
                    // Get all Timeslot for this qualifiction teached
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachTimeslotQualificationTeachedComponentList($aTimeslotQualificationTeached, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $arrayValues = $this->returnDayNameAndAmValue($aTimeslotQualificationTeached['timeslot']['day'],$aTimeslotQualificationTeached['timeslot']['AM']);
        $line .= "<td>" . $arrayValues[0] . " - " . $arrayValues[1] . "</td>";
        $line .= "<td>";
        
        if(isset($aTimeslotQualificationTeached['qualifications_teached'])){
            if($aTimeslotQualificationTeached['qualifications_teached'] != null){
                if(sizeof($aTimeslotQualificationTeached['qualifications_teached'])>0){
                    foreach($aTimeslotQualificationTeached['qualifications_teached'] as $aQualificationTeached){
                        if($aQualificationTeached['year'] == $_SESSION['year']){
                            $line .= $aQualificationTeached['code']  . " - " . $aQualificationTeached['name'] ."<br>";
                        }
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='timeslot_qualification_teached' action='update' class='action btn' idobj='" . $aTimeslotQualificationTeached['timeslot']['id_timeslot'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printTimeslotQualificationTeachedList($aListOfTimeslotQualificationTeached, $canBeUpdated)
    {
        $content = "";
        if ($aListOfTimeslotQualificationTeached != null) {
            if (sizeof($aListOfTimeslotQualificationTeached) > 0) {
                foreach ($aListOfTimeslotQualificationTeached as $aTimeslotQualificationTeached) {
                    $content .= $this->getEachTimeslotQualificationTeachedComponentList($aTimeslotQualificationTeached, $canBeUpdated);
                }
            }
        }
        return $content;
    }
    
    function deleteFromDBWhereAndTimeslot($id_timeslot, $year) {
        $sql = "DELETE tqt FROM `" . $this->table_name . "` tqt
 		JOIN qualification_teached q ON q.id_qualification_teached = tqt.id_qualification_teached
		WHERE tqt.id_timeslot = " . $id_timeslot . " AND q.year = '" . $year . "'";
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
     * id_timeslot_qualification_teached
     *
     * @return unkown
     */
    public function getId_timeslot_qualification_teached()
    {
        return $this->id_timeslot_qualification_teached;
    }
    
    /**
     * id_timeslot_qualification_teached
     *
     * @param unkown $id_timeslot_qualification_teached
     * @return TimeslotQualificationTeached
     */
    public function setId_timeslot_qualification_teached($id_timeslot_qualification_teached)
    {
        $this->id_timeslot_qualification_teached = $id_timeslot_qualification_teached;
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
     * id_qualification_teached
     *
     * @return unkown
     */
    public function getId_qualification_teached()
    {
        return $this->id_qualification_teached;
    }
    
    /**
     * id_qualification_teached
     *
     * @param unkown $id_qualification_teached
     * @return IdQualificationTeached
     */
    public function setId_qualification_teached($id_qualification_teached)
    {
        $this->id_qualification_teached = $id_qualification_teached;
        return $this;
    }
}
