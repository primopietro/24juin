<?php
require_once 'BaseModel.php';
class NatureTime extends BaseModel {
	protected $table_name = 'nature_time';
	protected $primary_key = "id_nature_time";
	protected $id_nature_time = 0;
	protected $hours;
	protected $day;

	
    function getNatureTime($id_teacher){
    	$aListOfNatureTime = array();
    	
    	if($id_teacher != 0){
    		$aListOfNatureTime = $this->getListOfAllDBObjectsWhere("id_teacher", "=", $id_teacher);
    	} else{
    		$aListOfNatureTime = $this->getListOfAllDBObjectsWithTeacher();
    	}
    	return $aListOfNatureTime;
    }
    
    function printNatureTimeList($aListOfNatureTime,$canBeUpdated,$canBeDeleted, $filter, $role){
        $content = '';
        if($aListOfNatureTime != null){
        	foreach($aListOfNatureTime as $aNatureTime){
        		$content .= $this->getEachNatureTimeComponentList($aNatureTime,$canBeUpdated,$canBeDeleted, $filter, $role);
            }
        }
        
        return $content;
    }
    
    function getEachNatureTimeComponentList($aNatureTime,$canBeUpdated,$canBeDeleted, $filter, $role){
        
        $line = '';
        $line .= "<tr>";
        if($filter == 0 && $role != 2){
        	$line .= "<td>" . $aNatureTime['code'] ." - " . $aNatureTime['first_name'] . " " . $aNatureTime['family_name'] . "</td>";
        }
        $line .= "<td>" . $aNatureTime['hours']. "</td>";
        $line .= "<td>" . $aNatureTime['day'] . "</td>";
        if($canBeUpdated){
        	$line .= "<td><a objtype='".$aNatureTime['table_name']."' action='update' class='action btn' idobj='".  $aNatureTime['id_nature_time']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        if($canBeDeleted){
            
        	$line .= "<td><a objtype='".$aNatureTime['table_name']."' action='delete' class='action btn' idobj='".$aNatureTime['id_nature_time']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    
    public function getListOfAllDBObjectsWhere($argument,$operation, $value) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` nt
		JOIN teacher_nature_time tnt ON tnt.id_nature_time = nt.id_nature_time WHERE ".$argument. " ".$operation." ".$value." ";
    	
    	
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
    
    function getListOfAllDBObjectsWithTeacher() {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` nt
		JOIN teacher_nature_time tnt ON tnt.id_nature_time = nt.id_nature_time
		JOIN teacher t ON tnt.id_teacher = t.id_teacher
		ORDER BY t.code, nt.day DESC";
    	
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
    
    /**
     * id_nature_time
     * @return unkown
     */
    public function getId_nature_time(){
        return $this->id_nature_time;
    }

    /**
     * id_nature_time
     * @param unkown $id_nature_time
     * @return NatureTime
     */
    public function setId_nature_time($id_nature_time){
        $this->id_nature_time = $id_nature_time;
        return $this;
    }

    /**
     * hours
     * @return unkown
     */
    public function getHours(){
        return $this->hours;
    }

    /**
     * hours
     * @param unkown $hours
     * @return NatureTime
     */
    public function setHours($hours){
        $this->hours = $hours;
        return $this;
    }

    /**
     * day
     * @return unkown
     */
    public function getDay(){
        return $this->day;
    }

    /**
     * day
     * @param unkown $day
     * @return NatureTime
     */
    public function setDay($day){
        $this->day = $day;
        return $this;
    }

}