<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
	$aGroup = new Group();
	$aGroup = $aGroup->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                        <h4>Code Unique</h4>
                      <input name='code' value='" .$aGroup['code']."' type='text' class='form-control' placeholder='ex: AUT1J16SE'>
                    </div>
			
                    <div class='col-xs-4'>
                      <h4>Année</h4>
                      <input value='" .$aGroup['year']."'  name='year' type='text' class='form-control' readonly>
                    </div>
                </div></form>";
	
	return $default;
}

