<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom_zone.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_zone.php';
	$aClassroomZone = new ClassroomZone();
	$aZone = new Zone();
	
	$aClassroomZoneList  = $aClassroomZone->getListOfAllDBObjectsWhere("id_classroom"," = ",$idObj);
	$aZoneList = $aZone->getListOfAllDBObjects();
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Qualifications</h4>";
	if($aZoneList != null){
		if(sizeof($aZoneList) >0){
	        $default .= "  <select multiple='multiple' name='zones[]'  > ";
	        foreach($aZoneList as $theZone){
	        	$default .= "   <option   value='".$theZone['id_zone']."' ";
	            
	            
	        	if($aClassroomZoneList!=null){
	        		if(sizeof($aClassroomZoneList)>0){
	        			foreach($aClassroomZoneList as $aCZ){
	        				if($aCZ['id_zone'] == $theZone['id_zone'] ){
	                            $default .= " selected ";
	                        }
	                    }
	                    
	                }
	            }
	            
	            $default .= " > ";
	            
	        
	            $default .= $theZone['code'];
	            $default .= "   </option> ";
	        }
	        
	        $default .= "   </select>     ";
	    }
	}
                    
                             
       $default .= "               </div>
                </div></form>";
	
	return $default;
}

