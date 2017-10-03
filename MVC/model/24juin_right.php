<?php
require_once 'BaseModel.php';
class Right extends BaseModel {
	protected $table_name = 'right';
	protected $primary_key = "id_right";
	protected $id_right;
	protected $name;




    /**
     * id_right
     * @return unkown
     */
    public function getId_right(){
        return $this->id_right;
    }

    /**
     * id_right
     * @param unkown $id_right
     * @return Role
     */
    public function setId_right($id_right){
        $this->id_right = $id_right;
        return $this;
    }

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
     * @return Role
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

}