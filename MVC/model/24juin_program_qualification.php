<?php
require_once 'BaseModel.php';
class ProgramQualification extends BaseModel {
	protected $table_name = 'program_qualification';
	protected $primary_key = "id_program_qualification";
	protected $id_program_qualification =0;
	protected $id_program =0;
	protected $id_qualification =0;
	




    /**
     * id_program_qualification
     * @return unkown
     */
    public function getId_program_qualification(){
        return $this->id_program_qualification;
    }

    /**
     * id_program_qualification
     * @param unkown $id_program_qualification
     * @return ProgramQualification
     */
    public function setId_program_qualification($id_program_qualification){
        $this->id_program_qualification = $id_program_qualification;
        return $this;
    }

    /**
     * id_program
     * @return unkown
     */
    public function getId_program(){
        return $this->id_program;
    }

    /**
     * id_program
     * @param unkown $id_program
     * @return ProgramQualification
     */
    public function setId_program($id_program){
        $this->id_program = $id_program;
        return $this;
    }

    /**
     * id_qualification
     * @return unkown
     */
    public function getId_qualification(){
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * @param unkown $id_qualification
     * @return ProgramQualification
     */
    public function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }
    
    
    public function getProgramQualification()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
        
        $program = new Program();
        $aProgramList = $program->getProgram();
        
        $ProgramQualification = new ProgramQualification();
        $ProgramQualificationList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aProgramList != null) {
            if (sizeof($aProgramList) > 0) {
                foreach ($aProgramList as $anObject) {
                    // Get Program
                    
                    $finalList[$anObject['id_program']]['program'] = $anObject;
                    $ProgramQualificationList = $ProgramQualification->getListOfAllDBObjectsWhere("id_program"," = ", $anObject['id_program']);
                    
                    if($ProgramQualificationList != null){
                        if(sizeof($ProgramQualificationList)>0){
                            foreach($ProgramQualificationList as $localTQ){
                                $aQualification = new Qualification();
                                $aQualification = $aQualification->getObjectFromDB($localTQ['id_qualification']);
                                $finalList[$anObject['id_program']]['qualifications'][] = $aQualification;
                            }
                        }
                    }
                    
                    // Get all qualifications for this Program
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachProgramQualificationComponentList($aProgramQualification, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aProgramQualification['program']['name'] ."</td>";
        $line .= "<td>";
        
        if(isset($aProgramQualification['qualifications'])){
            if($aProgramQualification['qualifications'] != null){
                if(sizeof($aProgramQualification['qualifications'])>0){
                    foreach($aProgramQualification['qualifications'] as $aQualification){
                        $line .= $aQualification['code']  . " - " . $aQualification['name'] ."<br>";
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='program_qualification' action='update' class='action' idobj='" . $aProgramQualification['program']['id_program'] . "'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printProgramQualificationList($aListOfProgramQualifications, $canBeUpdated)
    {
        $content = "";
        if ($aListOfProgramQualifications != null) {
            if (sizeof($aListOfProgramQualifications) > 0) {
                foreach ($aListOfProgramQualifications as $aProgramQualification) {
                    $content .= $this->getEachProgramQualificationComponentList($aProgramQualification, $canBeUpdated);
                }
            }
        }
        return $content;
    }

}