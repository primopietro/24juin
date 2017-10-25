<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
	
	$aTeacher = new Teacher();
	$aTeacherList = $aTeacher->getListOfAllDBObjects();
	
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Nom d'utilisateur</h4>
                      <input name='name' type='text' class='form-control' placeholder='ex: Bernard'>
                    </div>
                    <div class='col-xs-4'>
                      <h4>Mot de passe</h4>
                      <input name='password' type='text' class='form-control' placeholder='ex: Password'>
                    </div>

					<div class='col-xs-4'>
                        <h4>Professeurs</h4>";
    					$default .= "  <select class='selectTeacher' name='fk_teacher'><option   value='0'>Choisissez un professeur</option>";
    					if($aTeacherList!= null){
    						if(sizeof($aTeacherList)>0){
						        foreach($aTeacherList as $theTeacher){
						        	$default .= "   <option   value='". $theTeacher['id_teacher'] ."'>";
						            
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

