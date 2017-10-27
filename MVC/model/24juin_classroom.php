<?php
require_once 'BaseModel.php';
class Classroom extends BaseModel {
	protected $table_name = 'classroom';
	protected $primary_key = "id_classroom";
	protected $id_classroom = 0;
	protected $code = "";
	protected $nb_zone = 1;

	/**
	 * id_classroom
	 * @return int
	 */
	public function getId_classroom(){
	    return $this->id_classroom;
	}
	
	/**
	 * id_classroom
	 * @param int $id_classroom
	 * @return 24juin_classroom
	 */
	public function setId_classroom($id_classroom){
	    $this->id_classroom = $id_classroom;
	    return $this;
	}
	
	/**
	 * code
	 * @return string
	 */
	public function getCode(){
	    return $this->code;
	}
	
	/**
	 * name
	 * @param string $name
	 * @return 24juin_classroom
	 */
	public function setCode($code){
	    $this->code = $code;
	    return $this;
	}
	
	/**
	 * nb_zone
	 * @return int
	 */
	public function getNb_zone(){
		return $this->nb_zone;
	}
	
	/**
	 * nb_zone
	 * @param int $nb_zone
	 * @return 24juin_classroom
	 */
	public function setNb_zone($nb_zone){
		$this->nb_zone = $nb_zone;
		return $this;
	}
	
	
    function getActiveClassroom(){
        $aListOfClassroom = $this->getListOfAllDBObjects();
        return $aListOfClassroom;
    }
    
    function printClassroomList($aListOfClassroom,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfClassroom != null){
            foreach($aListOfClassroom as $aClassroom){
                $content .= $this->getEachClassroomComponentList($aClassroom,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachClassroomComponentList($aClassroom,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aClassroom['code'] . "</td>";
        $line .= "<td>" . $aClassroom['nb_zone'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aClassroom['table_name']."' action='update' class='action btn ' idobj='".  $aClassroom['id_classroom']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aClassroom['table_name']."' action='delete' class='action btn ' idobj='".$aClassroom['id_classroom']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    

}
