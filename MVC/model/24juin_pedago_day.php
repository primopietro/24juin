<?php
require_once 'BaseModel.php';
class PedagoDay extends BaseModel {
	protected $table_name = 'pedago_day';
	protected $primary_key = "id_pedago_day";
	protected $id_pedago_day = 0;
	protected $day;
	protected $year;

	
    function getPedagoDay(){
    	
    	/*$aListOfPedagoDay = $this->getListOfAllDBObjects();
    	
    	return $aListOfPedagoDay;*/
    	
    	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program_pedago_day.php';
    	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
    	
    	$aPedagoDay = new PedagoDay();
    	$aPedagoDayList = $this->getListOfAllDBObjects();
    	
    	$aProgram = new Program();
    	$aProgramList = $aProgram->getProgram();
    	
    	$aProgramPedagoDay = new ProgramPedagoDay();
    	$aProgramPedagoDayList = array();
    	
    	$finalList = array();
    	$originalList = $this->getListOfAllDBObjects();
    	
    	if ($aPedagoDayList != null) {
    		if (sizeof($aPedagoDayList) > 0) {
    			foreach ($aPedagoDayList as $anObject) {
    				// Get teacher
    				
    				$finalList[$anObject['id_pedago_day']]['pedago_day'] = $anObject;
    				$aProgramPedagoDayList = $aProgramPedagoDay->getListOfAllDBObjectsWhere("id_pedago_day"," = ", $anObject['id_pedago_day']);
    				
    				
    				// Get all groups for this teacher
    				if($aProgramPedagoDayList != null){
    					if(sizeof($aProgramPedagoDayList)>0){
    						foreach($aProgramPedagoDayList as $localPPDL){
    							$theProgram = new Program();
    							$theProgram = $theProgram->getObjectFromDB($localPPDL['id_program']);
    							$finalList[$anObject['id_pedago_day']]['programs'][] = $theProgram;
    						}
    					}
    				}
    			}
    		}
    	}
    	
    	return $finalList;
    }
    
    function printPedagoDayList($aListOfPedagoDay,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfPedagoDay != null){
        	if (sizeof($aListOfPedagoDay) > 0) {
	            foreach($aListOfPedagoDay as $aPedagoDay){
	            	if($_SESSION['year'] == $aPedagoDay['pedago_day']['year']){
	                	$content .= $this->getEachPedagoDayComponentList($aPedagoDay,$canBeUpdated,$canBeDeleted);
	            
	            	}
	            }
        	}
        }
        
   
        return $content;
    }
    
    function getEachPedagoDayComponentList($aPedagoDay,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aPedagoDay['pedago_day']['day'] . "</td>";
        $line .= "<td>";
        
        if(isset($aPedagoDay['programs'])){
        	if($aPedagoDay['programs'] != null){
        		if(sizeof($aPedagoDay['programs'] ) > 0){
        			foreach($aPedagoDay['programs']  as $aProgram){
        				$line .= $aProgram['name'] ."<br>";
        			}
        			
        		}
        	}
        	
        }
        
        $line .="</td>";
        if($canBeUpdated){
        	$line .= "<td><a objtype='".$aPedagoDay['pedago_day']['table_name']."' action='update' class='action btn' idobj='".  $aPedagoDay['pedago_day']['id_pedago_day']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
        	
        	$line .= "<td><a objtype='".$aPedagoDay['pedago_day']['table_name']."' action='delete' class='action btn' idobj='".$aPedagoDay['pedago_day']['id_pedago_day']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
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
    
    function getListOfAllDBObjectsWithPedagoDay() {
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
     * @return PedagoDay
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
     * @return PedagoDay
     */
    public function setDay($day){
        $this->day = $day;
        return $this;
    }
    
    /**
     * year
     * @return unkown
     */
    public function getYear(){
    	return $this->year;
    }
    
    /**
     * year
     * @param unkown $year
     * @return PedagoDay
     */
    public function setYear($year){
    	$this->year = $year;
    	return $this;
    }

}