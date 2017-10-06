<?php
require_once 'BaseModel.php';
class Building extends BaseModel {
	protected $table_name = 'building';
	protected $primary_key = "id_building";
	protected $id_building = 0;
	protected $name = "";
	protected $address = "";
	protected $nb_classrooms = 0;
	
	

    /**
     * name
     * @return unkown
     */
    public function getName(){
        return $this->name;
    }

    /**
     * name
     * @param unkown $name
     * @return Building
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * address
     * @return unkown
     */
    public function getAddress(){
        return $this->address;
    }

    /**
     * address
     * @param unkown $address
     * @return Building
     */
    public function setAddress($address){
        $this->address = $address;
        return $this;
    }

    /**
     * nb_classrooms
     * @return unkown
     */
    public function getNb_classrooms(){
        return $this->nb_classrooms;
    }

    /**
     * nb_classrooms
     * @param unkown $nb_classrooms
     * @return Building
     */
    public function setNb_classrooms($nb_classrooms){
        $this->nb_classrooms = $nb_classrooms;
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
     * @return Building
     */
    public function setId_building($id_building){
        $this->id_building = $id_building;
        return $this;
    }

}
