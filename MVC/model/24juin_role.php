<?php
require_once 'BaseModel.php';
class Role extends BaseModel {
	protected $table_name = 'role';
	protected $primary_key = "id_role";
	protected $id_role;
	protected $name;
	protected $isMenu;





    /**
     * id_role
     * @return unkown
     */
    public function getId_role(){
        return $this->id_role;
    }

    /**
     * id_role
     * @param unkown $id_role
     * @return UserRole
     */
    public function setId_role($id_role){
        $this->id_role = $id_role;
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
     * @return UserRole
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    function getActiveRole(){
        $aListOfRole = $this->getListOfAllDBObjects();
        return $aListOfRole;
    }
    
    function printRoleList($aListOfRole,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfRole != null){
            foreach($aListOfRole as $aRole){
                $content .= $this->getEachRoleComponentList($aRole,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachRoleComponentList($aRole,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aRole['name'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aRole['table_name']."' action='update' class='action' idobj='".  $aRole['id_role']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aRole['table_name']."' action='delete' class='action' idobj='".$aRole['id_role']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    

    /**
     * isMenu
     * @return unkown
     */
    public function getIsMenu(){
        return $this->isMenu;
    }

    /**
     * isMenu
     * @param unkown $isMenu
     * @return Role
     */
    public function setIsMenu($isMenu){
        $this->isMenu = $isMenu;
        return $this;
    }

}