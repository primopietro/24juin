<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
	
	$aClassroom = new Classroom();
	$aClassroom = $aClassroom->getObjectFromDB($idObj);
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                        <h4>Code</h4>
                      <input name='code' value='" .$aClassroom['code']."' type='text' class='form-control' placeholder='ex: 1234'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Code</h4>
                      <input name='nb_zone' value='" .$aClassroom['nb_zone']."' type='number' class='form-control' placeholder='ex: 3'>
                    </div>
                </div></form>";
	
	return $default;
}

