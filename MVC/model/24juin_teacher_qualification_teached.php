<?php
require_once 'BaseModel.php';

class TeacherQualificationTeached extends BaseModel
{
    
    protected $table_name = 'teacher_qualification_teached';
    
    protected $primary_key = "id_teacher_qualification_teached";
    
    protected $id_teacher_qualification_teached = 0;
    
    protected $id_teacher = 0;
    
    protected $id_qualification_teached = 0;
    
    public function getTeacherQualificationTeached()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
        
        $teacher = new Teacher();
        $aTeacherList = $teacher->getTeacher();
        
        $TeacherQualificationTeached= new TeacherQualificationTeached();
        $TeacherQualificationTeachedList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aTeacherList != null) {
            if (sizeof($aTeacherList) > 0) {
                foreach ($aTeacherList as $anObject) {
                    // Get teacher
                    
                    $finalList[$anObject['id_teacher']]['teacher'] = $anObject;
                    $TeacherQualificationTeachedList = $TeacherQualificationTeached->getListOfAllDBObjectsWhere("id_teacher"," = ", $anObject['id_teacher']);
                    
                    if($TeacherQualificationTeachedList != null){
                        if(sizeof($TeacherQualificationTeachedList)>0){
                            foreach($TeacherQualificationTeachedList as $localTQ){
                                $aQualificationTeached = new QualificationTeached();
                                $aQualificationTeached = $aQualificationTeached->getObjectFromDB($localTQ['id_qualification_teached']);
                                $finalList[$anObject['id_teacher']]['qualifications_teached'][] = $aQualificationTeached;
                            }
                        }
                    }
                    
                    // Get all qualification_teacheds for this teacher
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachTeacherQualificationTeachedComponentList($aTeacherQualificationTeached, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aTeacherQualificationTeached['teacher']['code'] . " - " . $aTeacherQualificationTeached['teacher']['first_name'] . " " . $aTeacherQualificationTeached['teacher']['family_name'] ."</td>";
        $line .= "<td>";
        
        if(isset($aTeacherQualificationTeached['qualifications_teached'])){
            if($aTeacherQualificationTeached['qualifications_teached'] != null){
                if(sizeof($aTeacherQualificationTeached['qualifications_teached'])>0){
                    foreach($aTeacherQualificationTeached['qualifications_teached'] as $aQualificationTeached){
                        if($aQualificationTeached['year'] == $_SESSION['year']){
                            $line .= $aQualificationTeached['code']  . " - " . $aQualificationTeached['name'] ."<br>";
                        }
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='teacher_qualification_teached' action='update' class='action btn' idobj='" . $aTeacherQualificationTeached['teacher']['id_teacher'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printTeacherQualificationTeachedList($aListOfTeacherQualificationsTeached, $canBeUpdated)
    {
        $content = "";
        if ($aListOfTeacherQualificationsTeached != null) {
            if (sizeof($aListOfTeacherQualificationsTeached) > 0) {
                foreach ($aListOfTeacherQualificationsTeached as $aTeacherQualificationTeached) {
                    $content .= $this->getEachTeacherQualificationTeachedComponentList($aTeacherQualificationTeached, $canBeUpdated);
                }
            }
        }
        return $content;
    }
    
    function deleteFromDBWhereAndTeacher($id_teacher, $year) {
        $sql = "DELETE tqt FROM `" . $this->table_name . "` tqt
 		JOIN qualification_teached qt ON qt.id_qualification_teached = tqt.id_qualification_teached
		WHERE id_teacher = " . $id_teacher . " AND qt.year = '" . $year . "'";
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            return "success";
        } else {
            return  "fail";
        }
        
        $conn->close ();
    }
    
    /**
     * id_teacher_qualification_teached
     *
     * @return unkown
     */
    public function getId_teacher_qualification_teached()
    {
        return $this->id_teacher_qualification_teached;
    }
    
    /**
     * id_teacher_qualification_teached
     *
     * @param unkown $id_teacher_qualification_teached
     * @return TeacherQualificationTeached
     */
    public function setId_teacher_qualification_teached($id_teacher_qualification_teached)
    {
        $this->id_teacher_qualification_teached = $id_teacher_qualification_teached;
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
     * @return TeacherQualificationTeached
     */
    public function setId_teacher($id_teacher)
    {
        $this->id_teacher = $id_teacher;
        return $this;
    }
    
    /**
     * id_qualification_teached
     *
     * @return unkown
     */
    public function getId_qualification_teached()
    {
        return $this->id_qualification_teached;
    }
    
    /**
     * id_qualification_teached
     *
     * @param unkown $id_qualification_teached
     * @return TeacherQualificationTeached
     */
    public function setId_qualification_teached($id_qualification_teached)
    {
        $this->id_qualification_teached = $id_qualification_teached;
        return $this;
    }
    
    function getObjectAsSelectWhere($id){
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $aListOfObjects = $this->getSelectQuerry($id);
        
        echo "<option value='0'>Faites un choix</option>";
        if ($aListOfObjects != null) {
            foreach ( $aListOfObjects as $anObject ) {
                echo "<option value='".$anObject['id_qualification_teached']."'>".$anObject['code']. " " . $anObject['name']."</option>";
            }
        }
        
    }
    
    function getSelectQuerry($id_teacher){
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ($this);
        
        $sql = "SELECT tqt.id_qualification_teached, q.code, q.name FROM " . $this->table_name . " tqt JOIN teacher t ON t.id_teacher = tqt.id_teacher
          JOIN qualification_teached qt ON qt.id_qualification_teached = tqt.id_qualification_teached
          JOIN qualification q ON q.id_qualification = qt.id_qualification
          WHERE qt.year = '" . $_SESSION['year'] . "' AND tqt.id_teacher = " . $id_teacher;
        
        
        //echo $sql;
        
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $localObjects = array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject = Array ();
                $anObject ["primary_key"] = $this->primary_key;
                $anObject ["table_name"] = $this->table_name;
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                }
                
                $localObjects [$row [$this->primary_key]] = $anObject;
            }
            
            $conn->close ();
            return $localObjects;
        }
        $conn->close ();
        return null;
    }
}


