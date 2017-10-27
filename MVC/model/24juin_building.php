<?php
require_once 'BaseModel.php';
class Building extends BaseModel {
    protected $table_name = 'building';
    protected $primary_key = "id_building";
    protected $id_building = 0;
    protected $name = "";
    protected $address = "";
    protected $nb_classrooms = 0;
    
    
    function getBuilding(){
        $aListOfBuilding= $this->getListOfAllDBObjects();
        return $aListOfBuilding;
    }
    /**
     * id_building
     * @return int
     */
    public function getId_building(){
        return $this->id_building;
    }
    
    /**
     * id_building
     * @param int $id_building
     * @return 24juin_building
     */
    public function setId_building($id_building){
        $this->id_building = $id_building;
        return $this;
    }
    
    /**
     * name
     * @return string
     */
    public function getName(){
        return $this->name;
    }
    
    /**
     * name
     * @param string $name
     * @return 24juin_building
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }
    
    /**
     * address
     * @return string
     */
    public function getAddress(){
        return $this->address;
    }
    
    /**
     * address
     * @param string $address
     * @return 24juin_building
     */
    public function setAddress($address){
        $this->address = $address;
        return $this;
    }
    
    /**
     * nb_classrooms
     * @return string
     */
    public function getNb_classrooms(){
        return $this->year;
    }
    
    /**
     * nb_classrooms
     * @param string $nb_classrooms
     * @return 24juin_building
     */
    public function setNb_classrooms($nb_classrooms){
        $this->nb_classrooms = $nb_classrooms;
        return $this;
    }
    
    function getActiveBuilding(){
        $aListOfBuilding = $this->getListOfAllDBObjects();
        return $aListOfBuilding;
    }
    
    function printBuildingList($aListOfBuilding,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfBuilding != null){
            foreach($aListOfBuilding as $aBuilding){
                $content .= $this->getEachBuildingComponentList($aBuilding,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachBuildingComponentList($aBuilding,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aBuilding['name'] . "</td>";
        $line .= "<td>" . $aBuilding['address'] . "</td>";
        $line .= "<td>" . $aBuilding['nb_classrooms'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aBuilding['table_name']."' action='update' class='action btn ' idobj='".  $aBuilding['id_building']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aBuilding['table_name']."' action='delete' class='action btn' idobj='".$aBuilding['id_building']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    
    
}
