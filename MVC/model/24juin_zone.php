<?php
require_once 'BaseModel.php';
class Zone extends BaseModel {
	protected $table_name = 'zone';
	protected $primary_key = "id_zone";
	protected $id_zone;
	protected $code;
	protected $comment;

	
	
	
	


    /**
     * id_zone
     * @return unkown
     */
    public function getId_zone(){
        return $this->id_zone;
    }

    /**
     * id_zone
     * @param unkown $id_zone
     * @return Zone
     */
    public function setId_zone($id_zone){
        $this->id_zone = $id_zone;
        return $this;
    }

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
     * @return Zone
     */
    public function setCode($code){
        $this->code = $code;
        return $this;
    }

    /**
     * comment
     * @return unkown
     */
    public function getComment(){
        return $this->comment;
    }

    /**
     * comment
     * @param unkown $comment
     * @return Zone
     */
    public function setComment($comment){
        $this->comment = $comment;
        return $this;
    }

    
    function getActiveZone(){
    	$aListOfZone = $this->getListOfAllDBObjects();
    	return $aListOfZone;
    }
    
    function printZoneList($aListOfZone,$canBeUpdated,$canBeDeleted){
    	$content = '';
    	if($aListOfZone != null){
    		foreach($aListOfZone as $aZone){
    			$content .= $this->getEachZoneComponentList($aZone,$canBeUpdated,$canBeDeleted);
    		}
    	}
    	
    	return $content;
    }
    
    function getEachZoneComponentList($aZone,$canBeUpdated,$canBeDeleted){
    	
    	$line = '';
    	$line .= "<tr>";
    	$line .= "<td>" . $aZone['code'] . "</td>";
    	$line .= "<td>" . $aZone['comment'] . "</td>";
    	if($canBeUpdated){
    		$line .= "<td><a objtype='".$aZone['table_name']."' action='update' class='action btn ' idobj='".  $aZone['id_zone']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
    	}
    	if($canBeDeleted){
    		$line .= "<td><a objtype='".$aZone['table_name']."' action='delete' class='action btn ' idobj='".$aZone['id_zone']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
    	}
    	$line .= "</tr>";
    	
    	return $line;
    }
    
}