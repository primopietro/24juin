<?php
if(!isset($_SESSION)){session_start();}
require_once 'BaseModel.php';
class QualificationTeached extends BaseModel {
	protected $table_name = 'qualification_teached';
	protected $primary_key = "id_qualification_teached";
	protected $id_qualification_teached = 0;
	protected $id_qualification = 0;
	protected $year = '';

  


    /**
     * id_qualification_teached
     * @return unkown
     */
    function getId_qualification_teached(){
        return $this->id_qualification_teached;
    }

    /**
     * id_qualification_teached
     * @param unkown $id_qualification_teached
     * @return QualificationTeached
     */
    function setId_qualification_teached($id_qualification_teached){
        $this->id_qualification_teached = $id_qualification_teached;
        return $this;
    }

    /**
     * id_qualification
     * @return unkown
     */
    function getId_qualification(){
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * @param unkown $id_qualification
     * @return QualificationTeached
     */
    function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }

    /**
     * year
     * @return unkown
     */
    function getYear(){
        return $this->year;
    }

    /**
     * year
     * @param unkown $year
     * @return QualificationTeached
     */
    function setYear($year){
        $this->year = $year;
        return $this;
    }
    
    function getActiveQualificationTeached(){
    	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
    	
    	$aQualification = new Qualification();
    	
    	$aListOfQualificationTeached = $aQualification->getListOfAllDBObjects();
    	return $aListOfQualificationTeached;
    }
    
    function printQualificationTeachedList($aListOfQualificationTeached,$canBeUpdated,$canBeDeleted){
    	$content = '';
    	if($aListOfQualificationTeached != null){
    		foreach($aListOfQualificationTeached as $aQualificationTeached){
    			$content .= $this->getEachQualificationTeachedComponentList($aQualificationTeached,$canBeUpdated,$canBeDeleted);
    		}
    	}
    	
    	return $content;
    }
    
    function getEachQualificationTeachedComponentList($aQualificationTeached,$canBeUpdated,$canBeDeleted){
    	
    	$toCheck = $this->getObjectWhereYearAndIdQualification($_SESSION['year'], $aQualificationTeached['id_qualification']);
    	$line = '';
    	$line .= "<tr>";
    	$line .= "<td class='col-xs-4'>" .  $aQualificationTeached['code']. " - " . $aQualificationTeached['name'] . "</td>";
    	$line .= "<td class='col-xs-8'><input style='margin-left: 25px;' id='clickQualificationTeached' type='checkbox' name='id_qualification' objtype='qualification_teached' value='".$aQualificationTeached['id_qualification']."'";
    	
    	if($toCheck != null){
    		$line.= " checked ";
    	}
    	
    	$line.= "></td>";
    	$line .= "</tr>";
    	
    	return $line;
    }
    
    public  function getListOfAllDBObjects() {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` qt
		JOIN qualification q ON q.id_qualification = qt.id_qualification";
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
    
    public function getObjectFromDB($primary_key) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this );
    	
    	if($this->primary_key == "order"){
    		$this->primary_key = "name";
    	}
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` qt
		JOIN qualification q ON q.id_qualification = qt.id_qualification WHERE " . $this->primary_key . " = '" .$primary_key ."'";
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
    
    public function getListOfAllDBObjectsWhere($argument,$operation, $value) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` qt 
		JOIN qualification q ON q.id_qualification = qt.id_qualification WHERE ".$argument. " ".$operation." ".$value." ";
    	
    	
    	
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
    
    public function getObjectWhereYearAndIdQualification($year,$id_qualification) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` WHERE year = '" . $year . "' AND id_qualification  = " . $id_qualification;
    	
    	$result = $conn->query ( $sql );
    	
    	if ($result->num_rows > 0) {
    		$anObject = Array ();
    		while ( $row = $result->fetch_assoc () ) {
    			$anObject ["primary_key"] = $this->primary_key;
    			$anObject ["table_name"] = $this->table_name;
    			foreach ( $row as $aRowName => $aValue ) {
    				$anObject [$aRowName] = $aValue;
    			}
    		}
    		
    		$conn->close ();
    		return $anObject;
    	}
    	$conn->close ();
    	return null;
    }
    
    public function getObjectWhereYearAndIdQualificationTeached($id_qualification_teached,$year) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "` WHERE year = '" . $year . "' AND id_qualification_teached  = " . $id_qualification_teached;
        
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $anObject = Array ();
            while ( $row = $result->fetch_assoc () ) {
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
    
    function getObjectAsSelectWhere($id,$year){
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $aListOfObjects = $this->getObjectWhereYearAndIdQualificationTeached($id,$year);
        
        return $aListOfObjects;
        
    }
    

}
