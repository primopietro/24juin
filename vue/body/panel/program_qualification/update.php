<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program_qualification.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
	$aProgramQualification = new ProgramQualification();
	$aQualification = new Qualification();
	$aQualificationTeached = new QualificationTeached();
	
	$aProgramQualificationList  = $aProgramQualification ->getListOfAllDBObjectsWhere("id_Program"," = ",$idObj);
	
	
	
	$aQualificationTeached = $aQualificationTeached->getListOfAllDBObjectsWhere("year"," LIKE ", "'".$_SESSION['year']."'");
	
	$tempQualificationList = array();
	
	
	$aQualificationList = $aQualification->getListOfAllDBObjects();
	
	foreach($aQualificationTeached as $localQT){
	    foreach($aQualificationList as $aQualification){
	        if($localQT['id_qualification'] == $aQualification['id_qualification']){
	            $tempQualificationList[$localQT['id_qualification']] = $aQualification;
	        }
	    }
	}
	$aQualificationList = $tempQualificationList;
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Qualifications</h4>";
	if($aQualificationList != null){
	    if(sizeof($aQualificationList)>0){
	        $default .= "  <select multiple='multiple' name='qualifications[]'  > ";
	        foreach($aQualificationList as $aQualification){
	            $default .= "   <option   value='".$aQualification['id_qualification']."' ";
	            
	            
	            if($aProgramQualificationList!=null){
	                if(sizeof($aProgramQualificationList)>0){
	                    foreach($aProgramQualificationList as $aQT){
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

