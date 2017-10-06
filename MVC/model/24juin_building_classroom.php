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

}
