<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program_qualification.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
	
	$aProgramQualification = new ProgramQualification();
	$aProgramQualificationList  = $aProgramQualification ->getListOfAllDBObjectsWhere("id_program"," = ",$idObj);
	
	$aQualificationTeached = new QualificationTeached();
	$aQualificationTeachedList = $aQualificationTeached->getListOfAllDBObjectsWhere("year"," LIKE ", "'".$_SESSION['year']."'");
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Qualifications</h4>";
	if($aQualificationTeachedList != null){
		if(sizeof($aQualificationTeachedList)>0){
	        $default .= "  <select multiple='multiple' name='qualifications[]'  > ";
	        foreach($aQualificationTeachedList as $aQualification){
	            $default .= "   <option   value='".$aQualification['id_qualification_teached']."' ";
	            
	            
	            if($aProgramQualificationList!=null){
	                if(sizeof($aProgramQualificationList)>0){
	                    foreach($aProgramQualificationList as $aQT){
	                        if($aQT['id_qualification'] == $aQualification['id_qualification_teached'] ){
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

