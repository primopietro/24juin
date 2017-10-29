<?php
if(!isset($_SESSION)){session_start();}
require_once 'BaseModel.php';
class ClassroomZone extends BaseModel {
	protected $table_name = 'classroom_zone';
	protected $primary_key = "id_classroom_zone";
	protected $id_classroom_zone= 0;
	protected $id_classroom= 0;
	protected $id_zone= '';

	

    /**
     * id_classroom_zone
     * @return unkown
     */
    public function getId_classroom_zone(){
        return $this->id_classroom_zone;
    }

    /**
     * id_classroom_zone
     * @param unkown $id_classroom_zone
     * @return ClassroomZone
     */
    public function setId_classroom_zone($id_classroom_zone){
        $this->id_classroom_zone = $id_classroom_zone;
        return $this;
    }

    /**
     * id_classroom
     * @return unkown
     */
    public function getId_classroom(){
        return $this->id_classroom;
    }

    /**
     * id_classroom
     * @param unkown $id_classroom
     * @return ClassroomZone
     */
    public function setId_classroom($id_classroom){
        $this->id_classroom = $id_classroom;
        return $this;
    }

    /**
     * id_zone
     * @return unkown
     */
    public function getId_zone(){
        return $this->id_zone;
    }

    /**
     * id_zone
     * @param unkown $id_zone
     * @return ClassroomZone
     */
    public function setId_zone($id_zone){
        $this->id_zone = $id_zone;
        return $this;
    }
    
    public function getClassroomZone()
    {
    	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_zone.php';
    	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
    	
    	$aZone = new Zone();
    	$aZoneList = $aZone->getListOfAllDBObjects();
    	
    	$aClassroom = new Classroom();
    	$aClassroomList = $aClassroom->getListOfAllDBObjects();
    	
    	$aClassroomZone = new ClassroomZone();
    	$aClassroomZoneList = array();
    	
    	$finalList = array();
    	$originalList = $this->getListOfAllDBObjects();
    	
    	if ($aClassroomList != null) {
    		if (sizeof($aClassroomList) > 0) {
    			foreach ($aClassroomList as $anObject) {
    				// Get teacher
    				
    				$finalList[$anObject['id_classroom']]['classroom'] = $anObject;
    				$aClassroomZoneList = $aClassroomZone->getListOfAllDBObjectsWhere("id_classroom"," = ", $anObject['id_classroom']);
    				
    				if($aClassroomZoneList!= null){
    					if(sizeof($aClassroomZoneList)>0){
    						foreach($aClassroomZoneList as $localCZ){
    							$aZone= new Zone();
    							$aZone = $aZone->getObjectFromDB($localCZ['id_zone']);
    							$finalList[$anObject['id_classroom']]['zones'][] = $aZone;
    						}
    					}
    				}
    				
    				// Get all classroom for this buiulding
    			}
    		}
    	}
    	
    	return $finalList;
    }
    
    function getEachClassroomZoneComponentList($aClassroomZone, $canBeUpdated)
    {
    	
    	$line = '';
    	
    	$line .= "<tr>";
    	$line .= "<td>" . $aClassroomZone['classroom']['code'] . "</td>";
    	$line .= "<td>";
    	
    	if(isset($aClassroomZone['zones'])){
    		if($aClassroomZone['zones'] != null){
    			if(sizeof($aClassroomZone['zones'])>0){
    				foreach($aClassroomZone['zones'] as $aZone){
    					$line .= $aZone['code']  ."<br>";
    				}
    				
    			}
    		}
    		
    	}
    	
    	$line .="</td>";
    	if ($canBeUpdated) {
    		$line .= "<td><a objtype='classroom_zone' action='update' class='action btn' idobj='" . $aClassroomZone['classroom']['id_classroom'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
    	}
    	$line .= "</tr>";
    	
    	return $line;
    }
    
    public function printClassroomZoneList($aListOfClassroomZone, $canBeUpdated)
    {
    	$content = "";
    	if ($aListOfClassroomZone!= null) {
    		if (sizeof($aListOfClassroomZone) > 0) {
    			foreach ($aListOfClassroomZone as $aClassroomZone) {
    				$content .= $this->getEachClassroomZoneComponentList($aClassroomZone, $canBeUpdated);
    			}
    		}
    	}
    	return $content;
    }
    
}
