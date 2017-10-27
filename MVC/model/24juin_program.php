<?php
require_once 'BaseModel.php';
class Program extends BaseModel {
	protected $table_name = 'program';
	protected $primary_key = "id_program";
	protected $id_program = 0;
	protected $name = "";
	protected $duration = 0;
	protected $nb_of_qualifications = 0;

	
	function getProgram(){
	    $aListOfProgram= $this->getListOfAllDBObjects();
	    return $aListOfProgram;
	}
	/**
	 * id_program
	 * @return int
	 */
	public function getId_program(){
	    return $this->id_program;
	}
	
	/**
	 * id_program
	 * @param int $id_program
	 * @return Group
	 */
	public function setId_program($id_program){
	    $this->id_program = $id_program;
	    return $this;
	}
	
	/**
	 * name
	 * @return string
	 */
	public function getName(){
	    return $this->name;
	}
	
	/**
	 * name
	 * @param string $name
	 * @return Group
	 */
	public function setName($name){
	    $this->name = $name;
	    return $this;
	}
	
	/**
	 * duration
	 * @return double
	 */
	public function getDuration(){
	    return $this->duration;
	}
	
	/**
	 * duration
	 * @param double $duration
	 * @return Group
	 */
	public function setDuration($duration){
	    $this->duration = $duration;
	    return $this;
	}
	
	/**
	 * nb_of_qualifications
	 * @return int
	 */
	public function getNb_of_qualifications(){
	    return $this->nb_of_qualifications;
	}
	
	/**
	 * nb_of_qualifications
	 * @param int $nb_of_qualifications
	 * @return Group
	 */
	public function setNb_of_qualifications($nb_of_qualifications){
	    $this->nb_of_qualifications = $nb_of_qualifications;
	    return $this;
	}
    
    function getActiveProgram(){
        $aListOfProgram = $this->getListOfAllDBObjects();
        return $aListOfProgram;
    }
    
    function printProgramList($aListOfProgram,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfProgram != null){
            foreach($aListOfProgram as $aProgram){
                $content .= $this->getEachProgramComponentList($aProgram,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachProgramComponentList($aProgram,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aProgram['name'] . "</td>";
        $line .= "<td>" . $aProgram['duration'] . "</td>";
        $line .= "<td>" . $aProgram['nb_of_qualifications'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aProgram['table_name']."' action='update' class='action btn' idobj='".  $aProgram['id_program']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aProgram['table_name']."' action='delete' class='action btn' idobj='".$aProgram['id_program']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    

}
