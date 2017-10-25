<?php
require_once 'BaseModel.php';
class User extends BaseModel {
	protected $table_name = 'user';
	protected $primary_key = "id_user";
	protected $id_user;
	protected $name;
	protected $password;
	protected $fk_teacher;



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
    
    /**
     * fk_teacher
     * @return int
     */
    public function getFk_teacher(){
    	return $this->fk_teacher;
    }
    
    /**
     * fk_teacher
     * @param int $fk_teacher
     * @return User
     */
    public function setFk_teacher($fk_teacher){
    	$this->fk_teacher = $fk_teacher;
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
    
    function getActiveUser(){
        $aListOfUser = $this->getListOfAllDBObjects();
        return $aListOfUser;
    }
    
    function printUserList($aListOfUser,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfUser != null){
            foreach($aListOfUser as $aUser){
                $content .= $this->getEachUserComponentList($aUser,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachUserComponentList($aUser,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aUser['name'] . "</td>";
        $line .= "<td>" . $aUser['password'] . "</td>";
        if($aUser['fk_teacher'] != 0){
        	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
        	$aTeacher = new Teacher();
        	$theTeacher = $aTeacher->getObjectFromDB($aUser['fk_teacher']);
        	
        	$line .= "<td>" . $theTeacher['code'] ." - " . $theTeacher['first_name'] . " " . $theTeacher['family_name'] . "</td>";
        }else{
        	$line .= "<td></td>";
        }
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aUser['table_name']."' action='update' class='action' idobj='".  $aUser['id_user']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aUser['table_name']."' action='delete' class='action' idobj='".$aUser['id_user']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

}