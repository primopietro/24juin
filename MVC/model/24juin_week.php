<?php
require_once 'BaseModel.php';
class User extends BaseModel {
	protected $table_name = 'user';
	protected $primary_key = "id_user";
	protected $id_user;
	protected $name;
	protected $password;



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
     * name
     * @return unkown
     */
    public function getName(){
        return $this->name;
    }

    /**
     * name
     * @param unkown $name
     * @return User
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * password
     * @return unkown
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * password
     * @param unkown $password
     * @return User
     */
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
    
    public function checkPassword(){
        
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this );
        
    
        $sql = "SELECT * FROM `user` WHERE name= '" .$this->name ."' AND password = '" .$this->password ."'";
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $anObject = Array ();
            while ( $row = $result->fetch_assoc () ) {
                foreach ( $row as $aRowName => $aValue ) {
                    $this->$aRowName = $aValue;
                }
            }
            $conn->close ();
         return "success";
        }
        $conn->close ();
        return "fail";
    }

}