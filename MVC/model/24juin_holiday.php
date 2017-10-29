<?php
require_once 'BaseModel.php';
class Holiday extends BaseModel {
	protected $table_name = 'holiday';
	protected $primary_key = "id_holiday";
	protected $id_holiday;
	protected $day;

	
	
    function getHoliday(){
        $aListOfHoliday= $this->getListOfAllDBObjects();
        return $aListOfHoliday;
    }
    
    function printHolidayList($aListOfHoliday,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfHoliday != null){
            foreach($aListOfHoliday as $aHoliday){
                $content .= $this->getEachHolidayList($aHoliday,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachHolidayList($aHoliday,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aHoliday['day'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aHoliday['table_name']."' action='update' class='action' idobj='".  $aHoliday['id_holiday']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aHoliday['table_name']."' action='delete' class='action' idobj='".$aHoliday['id_holiday']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    



    /**
     * id_holiday
     * @return unkown
     */
    public function getId_holiday(){
        return $this->id_holiday;
    }

    /**
     * id_holiday
     * @param unkown $id_holiday
     * @return Holiday
     */
    public function setId_holiday($id_holiday){
        $this->id_holiday = $id_holiday;
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
     * @return Holiday
     */
    public function setDay($day){
        $this->day = $day;
        return $this;
    }

}
