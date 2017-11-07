<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group_qualification_teached.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
	$aGroupQualificationTeached = new GroupQualificationTeached();
	$aQualificationTeached = new QualificationTeached();
	$aGroupQualificationTeachedList  = $aGroupQualificationTeached ->getListOfAllDBObjectsWhere("id_group"," = ",$idObj);
	$aQualificationTeachedList = $aQualificationTeached->getListOfAllDBObjects();
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>QualificationTeacheds</h4>";
	if($aQualificationTeachedList != null){
	    if(sizeof($aQualificationTeachedList)>0){
	        $default .= "  <select multiple='multiple' name='qualification_teached[]'  > ";
	        foreach($aQualificationTeachedList as $aQualificationTeached){
	            $default .= "   <option   value='".$aQualificationTeached['id_qualification_teached']."' ";
	            
	            
	            if($aGroupQualificationTeachedList!=null){
	                if(sizeof($aGroupQualificationTeachedList)>0){
	                    foreach($aGroupQualificationTeachedList as $aQT){
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

