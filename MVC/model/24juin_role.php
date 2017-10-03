<?php
require_once 'BaseModel.php';
class Role extends BaseModel {
	protected $table_name = 'role';
	protected $primary_key = "id_role";
	protected $id_role;
	protected $name;





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
     * @return UserRole
     */
    public function setId_role($id_role){
        $this->id_role = $id_role;
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
     * @return UserRole
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

}