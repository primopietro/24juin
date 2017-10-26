<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_year.php';
	$aYear = new Year();
	$aYear = $aYear->getObjectFromDB($idObj);
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                        <h4>Date début</h4>
                      <input name='start_date' value='" .$aYear['start_date']."' type='date' class='form-control'>
                    </div>
			
                    <div class='col-xs-4'>
                      <h4>Date fin</h4>
                      <input value='" .$aYear['end_date']."'  name='end_date' type='date' class='form-control'>
                    </div>
                </div></form>";
	
	return $default;
}

