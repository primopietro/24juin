<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
	$aBuilding = new Building();
	$aBuilding = $aBuilding->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-3'>
                        <h4>Nom</h4>
                      <input name='name' value='" .$aBuilding['name']."' type='text' class='form-control' placeholder='ex: Pavillon 2'>
                    </div>
                    <div class='col-xs-3'>
                      <h4>Adresse</h4>
                      <input value='" .$aBuilding['address']."'  name='address' type='text' class='form-control' placeholder='ex: 1838 rue dunant'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Nombre de locaux</h4>
                      <input value='" .$aBuilding['nb_classrooms']."' name='nb_classrooms' type='number' class='form-control' placeholder='ex: 4'>
                    </div>
                </div></form>";
	
	return $default;
}

