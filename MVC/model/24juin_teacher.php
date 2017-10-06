<?php
require_once 'BaseModel.php';
class Teacher extends BaseModel {
	protected $table_name = 'teacher';
	protected $primary_key = "id_teacher";
	protected $id_teacher = 0;
	protected $code;
	protected $first_name;
	protected $family_name;

	

    
    
    function getTeacher(){
        $aListOfTeacher= $this->getListOfAllDBObjects();
        return $aListOfTeacher;
    }
    
    function printTeacherList($aListOfTeacher,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfTeacher != null){
            foreach($aListOfTeacher as $aTeacher){
                $content .= $this->getEachTeacherComponentList($aTeacher,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachTeacherComponentList($aTeacher,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aTeacher['code']. "</td>";
        $line .= "<td>" . $aTeacher['first_name'] . "</td>";
        $line .= "<td>" . $aTeacher['family_name']. "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aTeacher['table_name']."' action='update' class='action' idobj='".  $aTeacher['id_teacher']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            
            $line .= "<td><a objtype='".$aTeacher['table_name']."' action='delete' class='action' idobj='".$aTeacher['id_teacher']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    



    /**
     * id_teacher
     * @return unkown
     */
    public function getId_teacher(){
        return $this->id_teacher;
    }

    /**
     * id_teacher
     * @param unkown $id_teacher
     * @return Teacher
     */
    public function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
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
     * @return Teacher
     */
    public function setCode($code){
        $this->code = $code;
        return $this;
    }

    /**
     * first_name
     * @return unkown
     */
    public function getFirst_name(){
        return $this->first_name;
    }

    /**
     * first_name
     * @param unkown $first_name
     * @return Teacher
     */
    public function setFirst_name($first_name){
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * family_name
     * @return unkown
     */
    public function getFamily_name(){
        return $this->family_name;
    }

    /**
     * family_name
     * @param unkown $family_name
     * @return Teacher
     */
    public function setFamily_name($family_name){
        $this->family_name = $family_name;
        return $this;
    }

}