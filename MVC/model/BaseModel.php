<?php
if(!isset($_SESSION)){session_start();}
class BaseModel{
    // Known attributes
    protected $table_name = '';
    protected $primary_key = null; // Not known EVERY time...
    public function addDBObject() {
        $internalAttributes = get_object_vars ( $this );
        
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $definition = "INSERT INTO `" . $this->table_name . "`";
     
        $attributes = " ( ";
        $values = " VALUES (";
        $lastElement = end ( $internalAttributes );
        $counter =0;
        
        foreach ( $internalAttributes as $rowName => $value ) {
            if ($rowName != "table_name" && $rowName != "primary_key") {
              
                $attributes .= "`" . $rowName . "`";
                if ($value == null) {
                    $values .= "NULL";
                } else {
                    $values .= "'" . $value . "'";
                }
                
                if ((sizeof($internalAttributes)-1) > $counter) {
                    $attributes .= ",";
                    $values .= ",";
                }
            }
            $counter++;
        }
        
        $attributes .= " ) ";
        $values .= " ) ";
        
        $sql = $definition . $attributes . $values;
    
        $id = 0;
        
        if (! $result = $conn->query ( $sql )) {
        	echo $sql;
            echo " fail";
            exit ();
        } else {
            echo "success";
            $id = mysqli_insert_id($conn);
        }
        
        $conn->close ();
        
        return $id;
    }
    function updateDBObject() {
        $internalAttributes = get_object_vars ( $this );
        
        $definition = "UPDATE `" . $this->table_name . "` ";
        
        $sets = "SET ";
        $sizeOfObject = sizeof($internalAttributes);
        $compterAttribute = 1;
        $lastElement = end ( $internalAttributes );
        foreach ( $internalAttributes as $rowName => $value ) {
            
            if ($value != $this->table_name && $value != $this->primary_key && $rowName != $this->primary_key) {
                
                $sets .= "  `" . $rowName . "` = " . "'" . $value . "'";
                
                if (  $compterAttribute < $sizeOfObject) {
                    $sets .= ", ";
                }
            }
            $compterAttribute++;
        }
        
        $condition = " WHERE  `" . $this->table_name . "`.`" . $this->primary_key . "` = " . $internalAttributes [$this->primary_key];
        
        $sql = $definition . $sets . $condition;
        
        //echo "<br>" . $sql;
        
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            echo "success";
        } else {
            echo $sql . "<br>";
            echo "fail";
        }
        
        $conn->close ();
    }
    function updateObjectDynamically($aField, $aValue, $anID) {
        $sql = "UPDATE `" . $this->table_name . "`
		SET `$aField` = '$aValue'
		WHERE `" . $this->table_name . "`.`" . $this->primary_key . "` = '$anID' ";
        
        //echo "<br>" . $sql;
        
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            echo "success";
        } else {
            echo "fail";
        }
        
        $conn->close ();
    }
    
    //Delete from database
    function deleteFromDB($anID) {
    	$sql = "DELETE FROM `" . $this->table_name . "`
 		WHERE `" . $this->table_name . "`.`" . $this->primary_key . "`=  $anID  ";
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	if ($conn->query ( $sql ) === TRUE) {
    		return "success";
    	} else {
    		return "fail";
    	}
    	
    	$conn->close ();
    }
    
    // Set to disabled
    function removeDBObject($anID) {
        $sql = "UPDATE `" . $this->table_name . "`
		SET `id_state` = '2'
		WHERE  `" . $this->table_name . "`.`" . $this->primary_key . "` = '$anID' ";
        
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            return "success";
        } else {
            return "fail";
        }
        
        $conn->close ();
    }
  
    //Delete from database
    function deleteFromDBWhere($argument,$operation, $value) {
        $sql = "DELETE FROM `" . $this->table_name . "`
 		WHERE " . $argument . " ".$operation. "  $value  ";
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            return "success";
        } else {
            return  "fail";
        }
        
        $conn->close ();
    }
    public function getListOfAllDBObjectsWhere($argument,$operation, $value) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "`"; 
    	
	
    	
    	$sql .= "WHERE ".$argument. " ".$operation." ".$value." ";
    
    	
    	
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
    
    public  function getListOfAllDBObjects() {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "` ";
        $result = $conn->query ( $sql );
        //echo $sql;
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
    function getObjectFromDB($primary_key) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this );
        
        if($this->primary_key == "order"){
            $this->primary_key = "name";
        }
        
        $sql = "SELECT * FROM `" . $this->table_name . "` WHERE " . $this->primary_key . " = '" .$primary_key ."'";
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $anObject = Array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject ["primary_key"] = $this->primary_key;
                $anObject ["table_name"] = $this->table_name;
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                    $this->$aRowName = $aValue;
                }
            }
            $conn->close ();
            return $anObject;
        }
        $conn->close ();
        return null;
    }
    function getObjectAsArrayWithMetadata() {
        return get_object_vars ( $this );
    }
    function getObjectAsArrayWithOutMetadata() {
        $anObject = get_object_vars ( $this );
        unset ( $anObject ['table_name'] );
        unset ( $anObject ['primary_key'] );
        return $anObject;
    }
    
    /**
     * table_name
     * @return unkown
     */
    public function getTable_name(){
        return $this->table_name;
    }
    /**
     * table_name
     * @param unkown $table_name
     * @return localModel
     */
    public function setTable_name($table_name){
        $this->table_name = $table_name;
        return $this;
    }
    /**
     * primary_key
     * @return unkown
     */
    public function getPrimary_key(){
        return $this->primary_key;
    }
    /**
     * primary_key
     * @param unkown $primary_key
     * @return localModel
     */
    public function setPrimary_key($primary_key){
        $this->primary_key = $primary_key;
        return $this;
    }
    
    
    public  function getListOfAllDBObjectsSortBy($sort) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM '" . $this->table_name . "' ORDER BY ".$sort. "";
        $result = $conn->query ( $sql );
        //echo $sql;
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
    
    public function getObjectAsSelect($toDisplay){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$toReturn = "";
    	
    	$aToDisplay = explode(",", $toDisplay);
    	$aListOfObjects = $this->getListOfAllDBObjects ();
    	
    	if($this->table_name != "teacher"){
    		$toReturn .= "<option value='0' selected>Faites un choix</option>";
    	}
    	if ($aListOfObjects != null) {
    		foreach ( $aListOfObjects as $anObject ) {
    			$infoToDisplay = "";
    			foreach ( $aToDisplay as $anColumn){
    				$infoToDisplay .=  $anObject[$anColumn] . " ";
    			}
    			if($this->table_name != "group"){
    				$toReturn .= "<option value='" . $anObject [$this->primary_key] . "'>" . $infoToDisplay . "</option>";
    			}else if($this->table_name == "group" && $anObject['year'] == $_SESSION['year']){
    				$toReturn .= "<option value='" . $anObject [$this->primary_key] . "'>" . $infoToDisplay . "</option>";
    			}
    		}
    	}
    	
    	return $toReturn;
    	
    }
    
    public function getObjectAsSelectWhereYear($toDisplay, $year){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$aToDisplay = explode(",", $toDisplay);
    	$aListOfObjects = $this->getListOfAllDBObjectsWhere("year"," LIKE ", "'".$_SESSION['year']."'");
    	
    	if ($aListOfObjects != null) {
    		foreach ( $aListOfObjects as $anObject ) {
    			$infoToDisplay = "";
    			foreach ( $aToDisplay as $anColumn){
    				$infoToDisplay .=  $anObject[$anColumn] . " ";
    			}
    			$toReturn .= "<option value='" . $anObject [$this->primary_key] . "'>" . $infoToDisplay . "</option>";
    			
    		}
    	}
    	
    	return $toReturn;
    }
}
