<?php
require_once 'BaseModel.php';
class Year extends BaseModel {
	protected $table_name = 'year';
	protected $primary_key = "id_year";
	protected $id_year = 0;
	protected $year = "";
	protected $start_date = "";
	protected $end_date= "";

    
    function getActiveYear(){
        $aListOfYear = $this->getListOfAllDBObjects();
        return $aListOfYear;
    }
    
    function printYearList($aListOfYear,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfYear != null){
        	foreach($aListOfYear as $aYear){
        		$content .= $this->getEachYearComponentList($aYear,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachYearComponentList($aYear,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aYear['year'] . "</td>";
        $line .= "<td>" . $aYear['start_date']. "</td>";
        $line .= "<td>" . $aYear['end_date']. "</td>";
        if($canBeUpdated){
        	$line .= "<td><a objtype='".$aYear['table_name']."' action='update' class='action btn' idobj='".  $aYear['id_year']."'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        if($canBeDeleted){
        	$line .= "<td><a objtype='".$aYear['table_name']."' action='delete' class='action btn' idobj='".$aYear['id_year']."'><i class='fa fa-times text-red'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    /**
     * id_year
     * @return int
     */
    public function getId_year(){
        return $this->id_year;
    }

    /**
     * id_year
     * @param int $id_year
     * @return Group
     */
    public function setId_year($id_year){
        $this->id_year = $id_year;
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
     * @return Group
     */
    public function setYear($year){
        $this->year = $year;
        return $this;
    }

    /**
     * start_date
     * @return date
     */
    public function getStart_date(){
        return $this->start_date;
    }

    /**
     * start_date
     * @param date $start_date
     * @return Group
     */
    public function setStart_date($start_date){
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * end_date
     * @return date
     */
    public function getEnd_date(){
        return $this->end_date;
    }

    /**
     * end_date
     * @param date $end_date
     * @return Group
     */
    public function setEnd_date($end_date){
        $this->end_date = $end_date;
        return $this;
    }

}
