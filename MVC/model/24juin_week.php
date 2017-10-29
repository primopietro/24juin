<?php
require_once 'BaseModel.php';
class Week extends BaseModel {
	protected $table_name = 'week';
	protected $primary_key = "id_week";
	protected $id_week;
	protected $year;
	protected $name;
	protected $date_start;
	protected $date_finish;


    /**
     * id_week
     * @return int
     */
    public function getId_week(){
        return $this->id_week;
    }

    /**
     * id_week
     * @param int $id_week
     * @return Week
     */
    public function setId_week($id_week){
        $this->id_week = $id_week;
        return $this;
    }

    /**
     * year
     * @return string
     */
    public function getYear(){
        return $this->year;
    }

    /**
     * year
     * @param string $year
     * @return Week
     */
    public function setYear($year){
        $this->year = $year;
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
     * @return Week
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * date_start
     * @return date
     */
    public function getDate_start(){
        return $this->date_start;
    }

    /**
     * date_start
     * @param date $date_start
     * @return Week
     */
    public function setDate_start($date_start){
        $this->date_start = $date_start;
        return $this;
    }

    /**
     * date_finish
     * @return date
     */
    public function getDate_finish(){
        return $this->date_finish;
    }

    /**
     * date_finish
     * @param date $date_finish
     * @return Week
     */
    public function setDate_finish($date_finish){
        $this->date_finish = $date_finish;
        return $this;
    }
    
    
    function getActiveWeek(){
    	$aListOfWeek = $this->getListOfAllDBObjects();
    	return $aListOfWeek;
    }
    
    function printWeekList($aListOfWeek,$canBeUpdated,$canBeDeleted){
    	$content = '';
    	if($aListOfWeek != null){
    		foreach($aListOfWeek as $aWeek){
    			if($aWeek['year'] == $_SESSION['year']){
    				$content .= $this->getEachWeekComponentList($aWeek,$canBeUpdated,$canBeDeleted);
    			}
    		}
    	}
    	
    	return $content;
    }
    
    function getEachWeekComponentList($aWeek,$canBeUpdated,$canBeDeleted){
    	$line = '';
    	$line .= "<tr>";
    	$line .= "<td>" . $aWeek['name'] . "</td>";
    	$line .= "<td>" . $aWeek['date_start'] . "</td>";
    	$line .= "<td>" . $aWeek['date_finish'] . "</td>";
    	if($canBeUpdated){
    		$line .= "<td><a objtype='".$aWeek['table_name']."' action='update' class='action btn' idobj='".  $aWeek['id_week']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
    	}
    	if($canBeDeleted){
    		
    		$line .= "<td><a objtype='".$aWeek['table_name']."' action='delete' class='action btn' idobj='".$aWeek['id_week']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
    	}
    	$line .= "</tr>";
    	
    	return $line;
    }

}