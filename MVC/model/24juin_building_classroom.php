<?php
require_once 'BaseModel.php';
class BuildingClassroom extends BaseModel {
	protected $table_name = 'building_classroom';
	protected $primary_key = "id_building_classroom";
	protected $id_building_classroom = 0;
	protected $id_building = 0;
	protected $id_classroom = 0;


    /**
     * id_building_classroom
     * @return unkown
     */
    public function getId_building_classroom(){
        return $this->id_building_classroom;
    }

    /**
     * id_building_classroom
     * @param unkown $id_building_classroom
     * @return BuildingClassroom
     */
    public function setId_building_classroom($id_building_classroom){
        $this->id_building_classroom = $id_building_classroom;
        return $this;
    }

    /**
     * id_building
     * @return unkown
     */
    public function getId_building(){
        return $this->id_building;
    }

    /**
     * id_building
     * @param unkown $id_building
     * @return BuildingClassroom
     */
    public function setId_building($id_building){
        $this->id_building = $id_building;
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
     * @return BuildingClassroom
     */
    public function setId_classroom($id_classroom){
        $this->id_classroom = $id_classroom;
        return $this;
    }
    
    
    public function getBuildingClassroom()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
        
        $building = new Building(); 
        $aBuildingList = $building->getBuilding();
        
        $buildingClassroom = new BuildingClassroom();
        $buildingClassroomList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aBuildingList != null) {
            if (sizeof($aBuildingList) > 0) {
                foreach ($aBuildingList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_building']]['building'] = $anObject;
                    $buildingClassroomList = $buildingClassroom->getListOfAllDBObjectsWhere("id_building"," = ", $anObject['id_building']);
                    
                    if($buildingClassroomList != null){
                        if(sizeof($buildingClassroomList)>0){
                            foreach($buildingClassroomList as $localTQ){
                                $aClassroom = new Classroom();
                                $aClassroom = $aClassroom->getObjectFromDB($localTQ['id_classroom']);
                                $finalList[$anObject['id_building']]['classrooms'][] = $aClassroom;
                            }
                        }
                    }
                    
                    // Get all classroom for this buiulding
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachBuildingClassroomComponentList($aBuildingClassroom, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aBuildingClassroom['building']['name'] . " - " . $aBuildingClassroom['building']['address'] .  "</td>";
        $line .= "<td>";
        
        if(isset($aBuildingClassroom['classrooms'])){
            if($aBuildingClassroom['classrooms'] != null){
                if(sizeof($aBuildingClassroom['classrooms'])>0){
                    foreach($aBuildingClassroom['classrooms'] as $aClassroom){
                        $line .= $aClassroom['code']  ."<br>";
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='building_classroom' action='update' class='action btn' idobj='" . $aBuildingClassroom['building']['id_building'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printTeacherQualificationList($aListOfBuildingClassroom, $canBeUpdated)
    {
        $content = "";
        if ($aListOfBuildingClassroom != null) {
            if (sizeof($aListOfBuildingClassroom) > 0) {
                foreach ($aListOfBuildingClassroom as $aBuildingClassroom) {
                    $content .= $this->getEachBuildingClassroomComponentList($aBuildingClassroom, $canBeUpdated);
                }
            }
        }
        return $content;
    }
    
    function getObjectAsSelectWhere($toDisplay, $id){
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $aListOfObjects = $this->getListOfAllDBObjectsWhere("id_building", "=", $id);
        
        if ($aListOfObjects != null) {
            foreach ( $aListOfObjects as $anObject ) {
                echo "<option value='" . $anObject [$this->primary_key] . "'>" . $anObject [$toDisplay] . "</option>";
            }
        }
        
    }

}
