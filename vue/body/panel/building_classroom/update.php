<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building_classroom.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
	$aBuildingClassroom = new BuildingClassroom();
	$aClassroom = new Classroom();
	$aBuildingClassroomList  = $aBuildingClassroom ->getListOfAllDBObjectsWhere("id_building"," = ",$idObj);
	$aClassroomList = $aClassroom->getListOfAllDBObjects();
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Locaux</h4>";
	if($aClassroomList != null){
	    if(sizeof($aClassroomList)>0){
	        $default .= "  <select multiple='multiple' name='classrooms[]'  > ";
	        foreach($aClassroomList as $aClassroom){
	            $default .= "   <option   value='".$aClassroom['id_classroom']."' ";
	            
	            
	            if($aBuildingClassroomList!=null){
	                if(sizeof($aBuildingClassroomList)>0){
	                    foreach($aBuildingClassroomList as $aQT){
	                        if($aQT['id_classroom'] == $aClassroom['id_classroom'] ){
	                            $default .= " selected ";
	                        }
	                    }
	                    
	                }
	            }
	            
	            $default .= " > ";
	            
	        
	            $default .= $aClassroom['code'] ;
	            $default .= "   </option> ";
	        }
	        
	        $default .= "   </select>     ";
	    }
	}
                    
                             
       $default .= "               </div>
                </div></form>";
	
	return $default;
}

