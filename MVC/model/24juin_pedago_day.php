<?php
require_once 'BaseModel.php';
class PedagoDay extends BaseModel {
	protected $table_name = 'pedago_day';
	protected $primary_key = "id_pedago_day";
	protected $id_pedago_day = 0;
	protected $day;

	
    function getPedagoDay($id_program){
    	$aListOfPedagoDay = array();
    	
    	if($id_program != 0){
    	    $aListOfPedagoDay = $this->getListOfAllDBObjectsWhere("id_program", "=", $id_program);
    	} else{
    	    $aListOfPedagoDay = $this->getListOfAllDBObjectsWithProgram();
    	}
    	return $aListOfPedagoDay;
    }
    
    function printPedagoDayList($aListOfPedagoDay,$canBeUpdated,$canBeDeleted, $filter, $role){
        $content = '';
        if($aListOfPedagoDay != null){
            foreach($aListOfPedagoDay as $aPedagoDay){
                $content .= $this->getEachPedagoDayComponentList($aPedagoDay,$canBeUpdated,$canBeDeleted, $filter, $role);
            }
        }
   
        return $content;
    }
    
    function getEachPedagoDayComponentList($aPedagoDay,$canBeUpdated,$canBeDeleted, $filter, $role){
        
        $line = '';
        $line .= "<tr>";
        if($filter == 0 && $role != 2){
            $line .= "<td>" . $aPedagoDay['name'] . "</td>";
        }
        $line .= "<td>" . $aPedagoDay['day'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aPedagoDay['table_name']."' action='update' class='action' idobj='".  $aPedagoDay['id_pedago_day']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            
            $line .= "<td><a objtype='".$aPedagoDay['table_name']."' action='delete' class='action' idobj='".$aPedagoDay['id_pedago_day']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    
    public function getListOfAllDBObjectsWhere($argument,$operation, $value) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` nt
		JOIN program_pedago_day tnt ON tnt.id_pedago_day = nt.id_pedago_day WHERE ".$argument. " ".$operation." ".$value." ";
    	
    	
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
    
    function getListOfAllDBObjectsWithProgram() {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` nt
		JOIN program_pedago_day tnt ON tnt.id_pedago_day = nt.id_pedago_day
		JOIN program t ON tnt.id_program = t.id_program
		ORDER BY nt.day DESC";
    	
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
    public function getId_pedago_day(){
        return $this->id_nature_time;
    }

    /**
     * id_nature_time
     * @param unkown $id_nature_time
     * @return NatureTime
     */
    public function setId_pedago_day($id_pedago_day){
        $this->$id_pedago_day = $id_pedago_day;
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