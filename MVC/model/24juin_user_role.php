<?php
require_once 'BaseModel.php';
class UserRole extends BaseModel {
	protected $table_name = 'user_role';
	protected $primary_key = "id_user_role";
	protected $id_user;
	protected $id_role;




    /**
     * id_user
     * @return unkown
     */
    public function getId_user(){
        return $this->id_user;
    }

    /**
     * id_user
     * @param unkown $id_user
     * @return User
     */
    public function setId_user($id_user){
        $this->id_user = $id_user;
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
     * @return User
     */
    public function setId_role($id_role){
        $this->id_role = $id_role;
        return $this;
    }

}