<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_teacher.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
    
    $aTimeslotTeacher = new TimeslotTeacher();
    $aTimeslotTeacherList  = $aTimeslotTeacher ->getListOfAllDBObjectsWhere("id_timeslot"," = ",$idObj);
    
    $aTeacher = new Teacher();
    $aTeacherList = $aTeacher->getListOfAllDBObjects();
    
    $default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Teachers</h4>";
    if($aTeacherList != null){
        if(sizeof($aTeacherList)>0){
            $default .= "  <select multiple='multiple' name='teachers[]'  > ";
            foreach($aTeacherList as $aTeacher){
                $default .= "   <option   value='".$aTeacher['id_teacher']."' ";
                
                
                if($aTimeslotTeacherList!=null){
                    if(sizeof($aTimeslotTeacherList)>0){
                        foreach($aTimeslotTeacherList as $aTT){
                            if($aTT['id_teacher'] == $aTeacher['id_teacher'] ){
                                $default .= " selected ";
                            }
                        }
                        
                    }
                }
                
                $default .= " > ";
                
                
                $default .=  $aTeacher['code'] . " - " . $aTeacher['first_name'] . "  " . $aTeacher['family_name'];
                $default .= "   </option> ";
            }
            
            $default .= "   </select>     ";
        }
    }
    
    
    $default .= "               </div>
                </div></form>";
    
    return $default;
}


