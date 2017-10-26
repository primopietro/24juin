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

    public function getListOfAllDBObjectsWhere($argument,$operation, $value) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "`";
        
        if($this->table_name == "right_object_role"){
            $sql .= " JOIN object ON object.id_object = right_object_role.id_object ";
        }
        
        $sql .= "WHERE ".$argument. " ".$operation." ".$value." ";
        
        if($this->table_name == "right_object_role"){
            $sql .= " ORDER BY object.name";
        }
        
        
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $localObjects = array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject = Array ();
                $anObject ["primary_key"] = $this->primary_key;
                $anObject ["table_name"] = $this->table_name;
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                }
                
                $localObjects [$row [$this->primary_key]] = $anObject;
            }
            
            $conn->close ();
            return $localObjects;
        }
        $conn->close ();
        return null;
    }
}