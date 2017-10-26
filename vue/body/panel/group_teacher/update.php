<?php
if (! isset ( $_SESSION )) {session_start ();}

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
                        <h4>Groupes</h4>";
	if($aGroupList != null){
	    if(sizeof($aGroupList)>0){
	        $default .= "  <select style='width:100%;' multiple='multiple' name='groups[]'  > ";
	        foreach($aGroupList as $aGroup){
	        	if($aGroup['year'] == $_SESSION['year']){
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
		            
		            $default .= $aGroup['code'] ." - " .  $aGroup['year'];
		            $default .= "   </option> ";
	        }
	        }
	        
	        $default .= "   </select>     ";
	    }
	}
                    
                             
       $default .= "               </div>
                </div></form>";
	
	return $default;
}

