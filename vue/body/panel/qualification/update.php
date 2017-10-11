<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
	$aQualification = new Qualification();
	$aQualification = $aQualification->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-3'>
                        <h4>Code Unique</h4>
                      <input name='code' value='" .$aQualification['code']."' type='text' class='form-control' placeholder='Code Unique'>
                    </div>
			
                    <div class='col-xs-3'>
                      <h4>Nom</h4>
                      <input value='" .$aQualification['name']."'  name='name' type='text' class='form-control' placeholder='Nom'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Quantité d'heures</h4>
                      <input value='" .$aQualification['nb_hours']."' name='nb_hours' type='number' class='form-control' placeholder='Quantite d'heures'>
                    </div>
                </div></form>";
	
	return $default;
}

