<?php
require_once 'BaseModel.php';
if(!isset($_SESSION)){session_start();}
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
