<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_user.php';
	
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
	
	$aTeacher = new Teacher();
	$aTeacherList = $aTeacher->getListOfAllDBObjects();
	
	$aUser = new User();
	$aUser = $aUser->getObjectFromDB($idObj);
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                        <h4>Nom d'utilisateur</h4>
                      <input name='name' value='" . $aUser['name'] ."' type='text' class='form-control' placeholder='ex: Bernard'>
                    </div>
                    <div class='col-xs-4'>
                        <h4>Mot de passe</h4>
                      <input name='password' value='" . $aUser['password'] ."' type='text' class='form-control' placeholder='ex: Mot de passe'>
                    </div>
					
					<div class='col-xs-4'>
                        <h4>Professeur</h4>";
    					$default .= "  <select class='selectTeacher' name='fk_teacher'><option   value='0'>Choisissez un professeur</option>";
    					if($aTeacherList!= null){
    						if(sizeof($aTeacherList)>0){
						        foreach($aTeacherList as $theTeacher){
						        	$default .= "   <option   value='". $theTeacher['id_teacher'] ."'";
						            
						        	if($aUser['fk_teacher'] != 0){
				        				if($theTeacher['id_teacher'] == $aUser['fk_teacher']){
				        					$default .= " selected ";
				        				}
						        	}
						        	
						        	$default .= " > ";
						        	
						        	$default .= $theTeacher['code'] ." - " . $theTeacher['first_name'] . " " . $theTeacher['family_name'];
						            $default .= "   </option> ";
						        }
						        
						    }
    					}
    					$default .= "   </select>     ";
                    
                             
       			$default .= "</div>
                </div></form>";
	
	return $default;
}

