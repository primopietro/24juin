<?php
require_once 'BaseModel.php';
class Right extends BaseModel {
	protected $table_name = 'right';
	protected $primary_key = "id_right";
	protected $id_right;
	protected $name;




    /**
     * id_right
     * @return unkown
     */
    public function getId_right(){
        return $this->id_right;
    }

    /**
     * id_right
     * @param unkown $id_right
     * @return Role
     */
    public function setId_right($id_right){
        $this->id_right = $id_right;
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
     * @return Role
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }
    
    function getActiveRight(){
        $aListOfRight = $this->getListOfAllDBObjects();
        return $aListOfRight;
    }
    
    function printRightList($aListOfRight,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfRight != null){
            foreach($aListOfRight as $aRight){
                $content .= $this->getEachRightComponentList($aRight,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachRightComponentList($aRight,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aRight['name'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aRight['table_name']."' action='update' class='action' idobj='".  $aRight['id_right']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aRight['table_name']."' action='delete' class='action' idobj='".$aRight['id_right']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

}