<?php
require_once 'BaseModel.php';
class ProgramQualification extends BaseModel {
	protected $table_name = 'program_qualification';
	protected $primary_key = "id_program_qualification";
	protected $id_program_qualification =0;
	protected $id_program =0;
	protected $id_qualification =0;
	




    /**
     * id_program_qualification
     * @return unkown
     */
    public function getId_program_qualification(){
        return $this->id_program_qualification;
    }

    /**
     * id_program_qualification
     * @param unkown $id_program_qualification
     * @return ProgramQualification
     */
    public function setId_program_qualification($id_program_qualification){
        $this->id_program_qualification = $id_program_qualification;
        return $this;
    }

    /**
     * id_program
     * @return unkown
     */
    public function getId_program(){
        return $this->id_program;
    }

    /**
     * id_program
     * @param unkown $id_program
     * @return ProgramQualification
     */
    public function setId_program($id_program){
        $this->id_program = $id_program;
        return $this;
    }

    /**
     * id_qualification
     * @return unkown
     */
    public function getId_qualification(){
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * @param unkown $id_qualification
     * @return ProgramQualification
     */
    public function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }
    
    
    public function getProgramQualification()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
        
        $program = new Program();
        $aProgramList = $program->getProgram();
        
        $ProgramQualification = new ProgramQualification();
        $ProgramQualificationList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aProgramList != null) {
            if (sizeof($aProgramList) > 0) {
                foreach ($aProgramList as $anObject) {
                    // Get Program
                    
                    $finalList[$anObject['id_program']]['program'] = $anObject;
                    $ProgramQualificationList = $ProgramQualification->getListOfAllDBObjectsWhere("id_program"," = ", $anObject['id_program']);
                    
                    if($ProgramQualificationList != null){
                        if(sizeof($ProgramQualificationList)>0){
                            foreach($ProgramQualificationList as $localTQ){
                                $aQualificationTeached = new QualificationTeached();
                                $aQualificationTeached = $aQualificationTeached->getObjectFromDB($localTQ['id_qualification']);
                                $finalList[$anObject['id_program']]['qualifications'][] = $aQualificationTeached;
                            }
                        }
                    }
                    
                    // Get all qualifications for this Program
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachProgramQualificationComponentList($aProgramQualification, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aProgramQualification['program']['name'] ."</td>";
        $line .= "<td>";
        
        if(isset($aProgramQualification['qualifications'])){
            if($aProgramQualification['qualifications'] != null){
                if(sizeof($aProgramQualification['qualifications'])>0){
                    foreach($aProgramQualification['qualifications'] as $aQualification){
                    	if($aQualification['year'] == $_SESSION['year']){
                        	$line .= $aQualification['code']  . " - " . $aQualification['name'] ."<br>";
                    	}
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='program_qualification' action='update' class='action btn' idobj='" . $aProgramQualification['program']['id_program'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printProgramQualificationList($aListOfProgramQualifications, $canBeUpdated)
    {
        $content = "";
        if ($aListOfProgramQualifications != null) {
            if (sizeof($aListOfProgramQualifications) > 0) {
                foreach ($aListOfProgramQualifications as $aProgramQualification) {
                    $content .= $this->getEachProgramQualificationComponentList($aProgramQualification, $canBeUpdated);
                }
            }
        }
        return $content;
    }
    
    function getObjectFromDBWithQualification($primary_key) {
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this );
    	
    	if($this->primary_key == "order"){
    		$this->primary_key = "name";
    	}
    	
    	$sql = "SELECT * FROM `" . $this->table_name . "` pq 
		JOIN qualification_teached qt ON pq.id_qualification = qt.id_qualification_teached WHERE " . $this->primary_key . " = '" .$primary_key ."'";
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
    
    function deleteFromDBWhereAndProgram($id_program, $year) {
    	$sql = "DELETE pq FROM `" . $this->table_name . "` pq 
 		JOIN qualification_teached qt ON qt.id_qualification_teached = pq.id_qualification
		WHERE id_program = " . $id_program . " AND qt.year = '" . $year . "'";
    	include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    	
    	if ($conn->query ( $sql ) === TRUE) {
    		return "success";
    	} else {
    		return  "fail";
    	}
    	
    	$conn->close ();
    }

}