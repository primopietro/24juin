<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group_teacher.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
	$aGroupTeacher = new GroupTeacher();
	$aGroup = new Group();
	$aGroupTeacherList  = $aGroupTeacher ->getListOfAllDBObjectsWhere("id_teacher"," = ",$idObj);
	$aGroupList = $aGroup->getListOfAllDBObjects();
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Groups</h4>";
	if($aGroupList != null){
	    if(sizeof($aGroupList)>0){
	        $default .= "  <select multiple='multiple' name='groups[]'  > ";
	        foreach($aGroupList as $aGroup){
	            $default .= "   <option   value='".$aGroup['id_group']."' ";
	            
	            
	            if($aGroupTeacherList!=null){
	                if(sizeof($aGroupTeacherList)>0){
	                    foreach($aGroupTeacherList as $aQT){
	                        if($aQT['id_group'] == $aGroup['id_group'] ){
	                            $default .= " selected ";
	                        }
	                    }
	                    
	                }
	            }
	            
	            $default .= " > ";
	            
	            $default .= $aGroup['code'] ." - " .  substr($aGroup['year'], 0, 4) ;
	            $default .= "   </option> ";
	        }
	        
	        $default .= "   </select>     ";
	    }
	}
                    
                             
       $default .= "               </div>
                </div></form>";
	
	return $default;
}

