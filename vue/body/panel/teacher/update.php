<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
	$aTeacher = new Teacher ();
	$aTeacher  = $aTeacher ->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-3'>
                        <h4>Code Unique</h4>
                      <input name='code' value='" .$aTeacher['code']."'  name='code' type='text' class='form-control' placeholder='ex: proulxMa'>
                    </div>
			
                    <div class='col-xs-3'>
                      <h4>firt_name</h4>
                      <input value='" .$aTeacher['first_name']."'  name='first_name' type='text' class='form-control' placeholder='ex: Maxime '>
                    </div>
					<div class='col-xs-3'>
                      <h4>family_name</h4>
                      <input value='" .$aTeacher['family_name']."' name='family_name' type='text' class='form-control' placeholder='ex: Proulx'>
                    </div>
                </div></form>";
	
	return $default;
}

