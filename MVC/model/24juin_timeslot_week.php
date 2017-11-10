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
	    $line .= "<td>" . $aTimeslotWeek['timeslot']['day'] . " - " . $aTeacherQualification['timeslot']['AM'] . "</td>";
	    $line .= "<td>";
	    
	    if(isset($aTimeslotWeek['weeks'])){
	        if($aTimeslotWeek['weeks'] != null){
	            if(sizeof($aTimeslotWeek['weeks'])>0){
	                foreach($aTimeslotWeek['weeks'] as $aWeek){
	                    $line .= $aWeek['name']  . " - " . $aWeek['date_start'] . " à " . $aWeek['date_finish'] ."<br>";
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
