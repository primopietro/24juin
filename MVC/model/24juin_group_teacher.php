<?php
require_once 'BaseModel.php';
class GroupTeacher extends BaseModel {
	protected $table_name = 'group_teacher';
	protected $primary_key = "id_group_teacher";
	protected $id_group_teacher = 0;
	protected $id_group = 0;
	protected $id_teacher = 0;



	public function getGroupTeacher(){
	    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
	    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
	    
	    $teacher = new Teacher();
	    $aTeacherList = $teacher->getTeacher();
	    
	    $group = new Group();
	    $aGroupList = $group->getGroup();
	    
	    $aGroupTeacher = new GroupTeacher();
	    $aGroupTeacherList = array();
	    
	    $finalList = array();
	    $originalList = $this->getListOfAllDBObjects();
	    
	    if ($aTeacherList != null) {
	        if (sizeof($aTeacherList) > 0) {
	            foreach ($aTeacherList as $anObject) {
	                // Get teacher
	                
	                $finalList[$anObject['id_teacher']]['teacher'] = $anObject;
	                $aGroupTeacherList = $aGroupTeacher->getListOfAllDBObjectsWhere("id_teacher"," = ", $anObject['id_teacher']);
	                
	                
	                // Get all groups for this teacher
	                if($aGroupTeacherList != null){
	                    if(sizeof($aGroupTeacherList)>0){
	                        foreach($aGroupTeacherList  as $localGT){
	                            $aGroup = new Group();
	                            $aGroup = $aGroup->getObjectFromDB($localGT['id_group']);
	                            $finalList[$anObject['id_teacher']]['groups'][] = $aGroup;
	                        }
	                    }
	                }
	            }
	        }
	    }
	    
	    return $finalList;
	}
	
	public function printGroupTeacherList($aListOfGroupTeachers, $canBeUpdated)
	{
	    $content = "";
	    if ($aListOfGroupTeachers != null) {
	        if (sizeof($aListOfGroupTeachers) > 0) {
	            foreach ($aListOfGroupTeachers  as $aGroupTeacher) {
	                $content .= $this->getEachGroupTeacherComponentList($aGroupTeacher, $canBeUpdated);
	            }
	        }
	    }
	    return $content;
	}
	function getEachGroupTeacherComponentList($aGroupTeacher, $canBeUpdated)
	{
	    
	    $line = '';
	    
	    $line .= "<tr>";
	    $line .= "<td>" . $aGroupTeacher['teacher']['code'] . " - " . $aGroupTeacher['teacher']['first_name'] . "  " . $aGroupTeacher['teacher']['family_name'] . "</td>";
	    $line .= "<td>";
	    
	    if(isset($aGroupTeacher['groups'])){
	        if($aGroupTeacher['groups'] != null){
	            if(sizeof($aGroupTeacher['groups'] )>0){
	                foreach($aGroupTeacher['groups']  as $aGroup){
	                    $line .= $aGroup['code']  . " - " . substr($aGroup['year'], 0, 4) ."<br>";
	                }
	                
	            }
	        }
	        
	    }
	    
	    $line .="</td>";
	    if ($canBeUpdated) {
	        $line .= "<td><a objtype='group_teacher' action='update' class='action btn' idobj='" . $aGroupTeacher['teacher']['id_teacher'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
	    }
	    $line .= "</tr>";
	    
	    return $line;
	}
	
    /**
     * id_group_teacher
     * @return unkown
     */
	public function getId_group_teacher(){
        return $this->id_group_teacher;
    }

    /**
     * id_group_teacher
     * @param unkown $id_group_teacher
     * @return Groupteacher
     */
    public function setId_group_teacher($id_group_teacher){
        $this->id_group_teacher = $id_group_teacher;
        return $this;
    }

    /**
     * id_group
     * @return unkown
     */
    public function getId_group(){
        return $this->id_group;
    }

    /**
     * id_group
     * @param unkown $id_group
     * @return Groupteacher
     */
    public function setId_group($id_group){
        $this->id_group = $id_group;
        return $this;
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
     * @return Groupteacher
     */
    public function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
        return $this;
    }

}
