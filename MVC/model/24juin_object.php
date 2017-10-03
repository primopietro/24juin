<?php
require_once 'BaseModel.php';
class Object extends BaseModel {
	protected $table_name = 'object';
	protected $primary_key = "id_object";
	protected $id_object;
	protected $name;





    /**
     * id_object
     * @return unkown
     */
    public function getId_object(){
        return $this->id_object;
    }

    /**
     * id_object
     * @param unkown $id_object
     * @return Object
     */
    public function setId_object($id_object){
        $this->id_object = $id_object;
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
     * @return Object
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

}