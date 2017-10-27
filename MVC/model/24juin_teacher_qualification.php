<?php
require_once 'BaseModel.php';

class TeacherQualification extends BaseModel
{

    protected $table_name = 'teacher_qualification';

    protected $primary_key = "id_teacher_qualification";

    protected $id_teacher_qualification = 0;

    protected $id_teacher = 0;

    protected $id_qualification = 0;

    public function getTeacherQualification()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
        
        $teacher = new Teacher();
        $aTeacherList = $teacher->getTeacher();
        
        $teacherQualification = new TeacherQualification();
        $teacherQualificationList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aTeacherList != null) {
            if (sizeof($aTeacherList) > 0) {
                foreach ($aTeacherList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_teacher']]['teacher'] = $anObject;
                    $teacherQualificationList = $teacherQualification->getListOfAllDBObjectsWhere("id_teacher"," = ", $anObject['id_teacher']);
                    
                    if($teacherQualificationList != null){
                        if(sizeof($teacherQualificationList)>0){
                            foreach($teacherQualificationList as $localTQ){
                                $aQualification = new Qualification();
                                $aQualification = $aQualification->getObjectFromDB($localTQ['id_qualification']);
                                $finalList[$anObject['id_teacher']]['qualifications'][] = $aQualification;
                            }
                        }
                    }
                    
                    // Get all qualifications for this teacher
                }
            }
        }
        
        return $finalList;
    }

    function getEachTeacherQualificationComponentList($aTeacherQualification, $canBeUpdated)
    {
      
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aTeacherQualification['teacher']['code'] . " - " . $aTeacherQualification['teacher']['first_name'] . "  " . $aTeacherQualification['teacher']['family_name'] . "</td>";
        $line .= "<td>";
        
        if(isset($aTeacherQualification['qualifications'])){
            if($aTeacherQualification['qualifications'] != null){
                if(sizeof($aTeacherQualification['qualifications'])>0){
                    foreach($aTeacherQualification['qualifications'] as $aQualification){
                        $line .= $aQualification['code']  . " - " . $aQualification['name'] ."<br>";
                    }
                   
                }
            }
            
        }
   
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='teacher_qualification' action='update' class='action btn' idobj='" . $aTeacherQualification['teacher']['id_teacher'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    public function printTeacherQualificationList($aListOfTeacherQualifications, $canBeUpdated)
    {
        $content = "";
        if ($aListOfTeacherQualifications != null) {
            if (sizeof($aListOfTeacherQualifications) > 0) {
                foreach ($aListOfTeacherQualifications as $aTeacherQualification) {
                    $content .= $this->getEachTeacherQualificationComponentList($aTeacherQualification, $canBeUpdated);
                }
            }
        }
        return $content;
    }

    /**
     * id_teacher_qualification
     * 
     * @return unkown
     */
    public function getId_teacher_qualification()
    {
        return $this->id_teacher_qualification;
    }

    /**
     * id_teacher_qualification
     * 
     * @param unkown $id_teacher_qualification
     * @return TeacherQualification
     */
    public function setId_teacher_qualification($id_teacher_qualification)
    {
        $this->id_teacher_qualification = $id_teacher_qualification;
        return $this;
    }

    /**
     * id_teacher
     * 
     * @return unkown
     */
    public function getId_teacher()
    {
        return $this->id_teacher;
    }

    /**
     * id_teacher
     * 
     * @param unkown $id_teacher
     * @return TeacherQualification
     */
    public function setId_teacher($id_teacher)
    {
        $this->id_teacher = $id_teacher;
        return $this;
    }

    /**
     * id_qualification
     * 
     * @return unkown
     */
    public function getId_qualification()
    {
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * 
     * @param unkown $id_qualification
     * @return TeacherQualification
     */
    public function setId_qualification($id_qualification)
    {
        $this->id_qualification = $id_qualification;
        return $this;
    }
}
