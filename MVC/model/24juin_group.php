<?php
require_once 'BaseModel.php';
class Group extends BaseModel {
	protected $table_name = 'group';
	protected $primary_key = "id_group";
	protected $id_group = 0;
	protected $year = "";

    /**
     * table_name
     * @param unkown $table_name
     * @return 24juin_group
     */
    public function setTable_name($table_name){
        $this->table_name = $table_name;
        return $this;
    }

    /**
     * id_group
     * @return int
     */
    public function getId_group(){
        return $this->id_group;
    }

    /**
     * id_group
     * @param int $id_group
     * @return 24juin_group
     */
    public function setId_group($id_group){
        $this->id_group = $id_group;
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
     * @return 24juin_group
     */
    public function setYear($year){
        $this->year = $year;
        return $this;
    }
    
    function getActiveGroup(){
        $aListOfGroup = $this->getListOfAllDBObjects();
        return $aListOfGroup;
    }

    function printGroupList($aListOfGroup){
        $content = '';
        if($aListOfGroup != null){
            foreach($aListOfGroup as $aGroup){
                $content .= $this->getEachgroupComponentList($aGroup);
            }
        }
        
        return $content;
    }
    
    function getEachGroupComponentList($aGroup){
        $format = 'Y-m-d';
        $year = DateTime::createFromFormat($format, $aGroup['year']);
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aGroup['id_group'] . "</td>";
        $line .= "<td>" . $year->format('Y') . "</td>";
        $line .= "<td><a href='#'><i class='fa fa-times text-red'></i></a></td>";
        $line .= "</tr>";
        
        return $line;
    }
}
