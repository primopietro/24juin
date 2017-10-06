<?php
require_once 'BaseModel.php';
class Group extends BaseModel {
	protected $table_name = 'group';
	protected $primary_key = "id_group";
	protected $id_group = 0;
	protected $code = "";
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
     * code
     * @return string
     */
    public function getCode(){
        return $this->code;
    }
    
    /**
     * code
     * @param string $code
     * @return 24juin_group
     */
    public function setCode($code){
        $this->code = $code;
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
    
    function printGroupList($aListOfGroup,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfGroup != null){
            foreach($aListOfGroup as $aGroup){
                $content .= $this->getEachgroupComponentList($aGroup,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachGroupComponentList($aGroup,$canBeUpdated,$canBeDeleted){
        $format = 'Y-m-d';
        $year = DateTime::createFromFormat($format, $aGroup['year']);
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aGroup['code'] . "</td>";
        $line .= "<td>" . $year->format('Y') . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aGroup['table_name']."' action='update' class='action' idobj='".  $aGroup['id_group']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            
            $line .= "<td><a objtype='".$aGroup['table_name']."' action='delete' class='action' idobj='".$aGroup['id_group']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
}
