<?php
require_once 'BaseModel.php';
class Qualification extends BaseModel {
	protected $table_name = 'qualification';
	protected $primary_key = "id_qualification";
	protected $id_qualification = 0;
	protected $code = "";
	protected $name = "";
	protected $nb_hours = "";


    /**
     * code
     * @return unkown
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * code
     * @param unkown $code
     * @return Qualification
     */
    public function setCode($code){
        $this->code = $code;
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
     * @return Qualification
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * nb_hours
     * @return unkown
     */
    public function getNb_hours(){
        return $this->nb_hours;
    }

    /**
     * nb_hours
     * @param unkown $nb_hours
     * @return Qualification
     */
    public function setNb_hours($nb_hours){
        $this->nb_hours = $nb_hours;
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
     * @return Qualification
     */
    public function setId_qualification($id_qualification){
    	$this->id_qualification = $id_qualification;
    	return $this;
    }
    
    function getActiveQualifications(){
    	$aListOfQualifications= $this->getListOfAllDBObjects();
    	return $aListOfQualifications;
    }
    
    function printQualificationsList($aListOfQualifications,$canBeUpdated,$canBeDeleted){
    	$content = '';
    	if($aListOfQualifications != null){
    		foreach($aListOfQualifications as $aQualification){
    			$content .= $this->getEachQualificationComponentList($aQualification,$canBeUpdated,$canBeDeleted);
    		}
    	}
    	
    	return $content;
    }
    
    function getEachQualificationComponentList($aQualification,$canBeUpdated,$canBeDeleted){
    	
    	$line = '';
    	$line .= "<tr>";
    	$line .= "<td>" . $aQualification['code']. "</td>";
    	$line .= "<td>" . $aQualification['name'] . "</td>";
    	$line .= "<td>" . $aQualification['nb_hours']. "</td>";
    	if($canBeUpdated){
    		$line .= "<td><a objtype='".$aQualification['table_name']."' action='update' class='action btn' idobj='".  $aQualification['id_qualification']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
    	}
    	if($canBeDeleted){
    		
    		$line .= "<td><a objtype='".$aQualification['table_name']."' action='delete' class='action btn' idobj='".$aQualification['id_qualification']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
    	}
    	$line .= "</tr>";
    	
    	return $line;
    }

  

}
