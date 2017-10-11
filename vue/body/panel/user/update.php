<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_user.php';
	
	$aUser = new User();
	$aUser = $aUser->getObjectFromDB($idObj);
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Nom</h4>
                      <input name='name' value='" .$aUser['name']."' type='text' class='form-control' placeholder='ex: Bernard'>
                    </div>
                    <div class='col-xs-6'>
                        <h4>Mot de passe</h4>
                      <input name='password' value='" .$aUser['password']."' type='text' class='form-control' placeholder='ex: Mot de passe'>
                    </div>
                </div></form>";
	
	return $default;
}

