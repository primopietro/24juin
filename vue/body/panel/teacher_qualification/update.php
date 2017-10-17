<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher_qualification.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
	$aTeacherQualification = new TeacherQualification();
	$aQualification = new Qualification();
	$aTeacherQualificationList  = $aTeacherQualification ->getListOfAllDBObjectsWhere("id_teacher"," = ",$idObj);
	$aQualificationList = $aQualification->getListOfAllDBObjects();
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Qualifications</h4>";
	if($aQualificationList != null){
	    if(sizeof($aQualificationList)>0){
	        $default .= "  <select multiple='multiple' name='qualifications[]'  > ";
	        foreach($aQualificationList as $aQualification){
	            $default .= "   <option   value='".$aQualification['id_qualification']."' ";
	            
	            
	            if($aTeacherQualificationList!=null){
	                if(sizeof($aTeacherQualificationList)>0){
	                    foreach($aTeacherQualificationList as $aQT){
	                        if($aQT['id_qualification'] == $aQualification['id_qualification'] ){
	                            $default .= " selected ";
	                        }
	                    }
	                    
	                }
	            }
	            
	            $default .= " > ";
	            
	        
	            $default .= $aQualification['code'] ." - " . $aQualification['name'] ;
	            $default .= "   </option> ";
	        }
	        
	        $default .= "   </select>     ";
	    }
	}
                    
                             
       $default .= "               </div>
                </div></form>";
	
	return $default;
}

