<?php
require_once 'BaseModel.php';
class RightObjectRole extends BaseModel {
	protected $table_name = 'right_object_role';
	protected $primary_key = "id_right_object_role";
	protected $id_right;
	protected $id_object;
	protected $id_role;





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
     * @return RightObjectRole
     */
    public function setId_right($id_right){
        $this->id_right = $id_right;
        return $this;
    }

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
     * @return RightObjectRole
     */
    public function setId_object($id_object){
        $this->id_object = $id_object;
        return $this;
    }

    /**
     * id_role
     * @return unkown
     */
    public function getId_role(){
        return $this->id_role;
    }

    /**
     * id_role
     * @param unkown $id_role
     * @return RightObjectRole
     */
    public function setId_role($id_role){
        $this->id_role = $id_role;
        return $this;
    }

}