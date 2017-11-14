<?php
require_once 'BaseModel.php';
class TeacherQualificationTeached extends BaseModel {
	protected $table_name = 'teacher_qualification_teached';
	protected $primary_key = "id_teacher_qualification_teached";
	protected $id_teacher_qualification_teached = 0;
	protected $id_teacher = 0;
	protected $id_qualification_teached = 0;




    /**
     * id_teacher_qualification_teached
     * @return unkown
     */
    protected function getId_teacher_qualification_teached(){
        return $this->id_teacher_qualification_teached;
    }

    /**
     * id_teacher_qualification_teached
     * @param unkown $id_teacher_qualification_teached
     * @return TeacherQualificationTeached
     */
    protected function setId_teacher_qualification_teached($id_teacher_qualification_teached){
        $this->id_teacher_qualification_teached = $id_teacher_qualification_teached;
        return $this;
    }

    /**
     * id_teacher
     * @return unkown
     */
    protected function getId_teacher(){
        return $this->id_teacher;
    }

    /**
     * id_teacher
     * @param unkown $id_teacher
     * @return TeacherQualificationTeached
     */
    protected function setId_teacher($id_teacher){
        $this->id_teacher = $id_teacher;
        return $this;
    }

    /**
     * id_qualification_teached
     * @return unkown
     */
    protected function getId_qualification_teached(){
        return $this->id_qualification_teached;
    }

    /**
     * id_qualification_teached
     * @param unkown $id_qualification_teached
     * @return TeacherQualificationTeached
     */
    protected function setId_qualification_teached($id_qualification_teached){
        $this->id_qualification_teached = $id_qualification_teached;
        return $this;
    }
    
    function getObjectAsSelectWhere($toDisplay, $id){
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $aToDisplay = explode(",", $toDisplay);
        $aListOfObjects = $this->getListOfAllDBObjectsWhere("id_teacher", "=", $id);
        
        
        echo "<option value='0' selected>Faites un choix</option>";
        if ($aListOfObjects != null) {
            foreach ( $aListOfObjects as $anObject ) {
                require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
                $aQualificationTeached = new QualificationTeached();
                $aListOfObjects2 = $aQualificationTeached->getObjectWhereYearAndIdQualificationTeached($anObject["id_qualification_teached"],$_SESSION['year']);
                  foreach ( $aListOfObjects2 as $anObject2 ) {
                    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
                    $aQualification = new Qualification();
                    $aListOfObjects3 = $aQualification->getListOfAllDBObjectsWhere("id_qualification", " = ", $anObject2["id_qualification"]);
                    
                    foreach ( $aListOfObjects3 as $anObject3 ) {
                        $infoToDisplay = "";
                        foreach ( $aToDisplay as $anColumn){
                            $infoToDisplay .=  $anObject3[$anColumn] . " ";
                        }
                        echo "<option value='" . $anObject3["id_qualification"] . "'>" . $infoToDisplay . "</option>";
                    }
                }
            }
        }
        
    }

}
