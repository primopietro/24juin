<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_right.php';
	
	$aRight = new Right();
	$aRight = $aRight->getObjectFromDB($idObj);
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                        <h4>Nom</h4>
                      <input name='name' value='" .$aRight['name']."' type='text' class='form-control' placeholder='ex: add'>
                    </div>
                </div></form>";
	
	return $default;
}

