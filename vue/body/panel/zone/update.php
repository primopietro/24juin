<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_zone.php';
	
	$aZone= new Zone();
	$aZone= $aZone->getObjectFromDB($idObj);
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                        <h4>Nom</h4>
                      <input name='code' value='" .$aZone['code']."' type='text' class='form-control' placeholder='ex: DFA392'>
                    </div>
 				<div class='col-xs-4'>
                        <h4>Comment</h4>
                      <input name='comment' value='" .$aZone['comment']."' type='text' class='form-control' placeholder='ex: A cours'>
                    </div>
                </div></form>";
	
	return $default;
}

