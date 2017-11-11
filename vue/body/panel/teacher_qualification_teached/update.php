<?php
//teacher_qualication_teached
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher_qualification_teached.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
	$aTeacherQualificationTeached = new TeacherQualificationTeached();
	$aQualificationTeached = new QualificationTeached();
	$aTeacherQualificationTeachedList  = $aTeacherQualificationTeached ->getListOfAllDBObjectsWhere("id_teacher"," = ",$idObj);
	$aQualificationTeachedList = $aQualificationTeached->getListOfAllDBObjectsWhere("year"," LIKE ", "'".$_SESSION['year']."'");
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Qualifications Teached</h4>";
	if($aQualificationTeachedList != null){
	    if(sizeof($aQualificationTeachedList)>0){
	        $default .= "  <select multiple='multiple' name='qualification_teached[]'  > ";
	        foreach($aQualificationTeachedList as $aQualificationTeached){
	            $default .= "   <option   value='".$aQualificationTeached['id_qualification_teached']."' ";
	            
	            
	            if($aTeacherQualificationTeachedList!=null){
	                if(sizeof($aTeacherQualificationTeachedList)>0){
	                    foreach($aTeacherQualificationTeachedList as $aQT){
	                        if($aQT['id_qualification_teached'] == $aQualificationTeached['id_qualification_teached'] ){
	                            $default .= " selected ";
	                        }
	                    }
	                    
	                }
	            }
	            
	            $default .= " > ";
	            
	        
	            $default .= $aQualificationTeached['code'] ." - " . $aQualificationTeached['name'] ;
	            $default .= "   </option> ";
	        }
	        
	        $default .= "   </select>     ";
	    }
	}
                    
                             
       $default .= "               </div>
                </div></form>";
	
	return $default;
}

