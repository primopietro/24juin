<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_nature_time.php';
	$aNatureTime = new NatureTime ();
	$aNatureTime = $aNatureTime->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
					<div class='col-xs-4'>
                      <h4>Heure(s)</h4>
                      <input name='hours' type='number' class='form-control' value='" . $aNatureTime['hours']. "' placeholder='ex: 35.5 '>
                    </div>

					<div class='col-xs-4'>
                        <h4>Jour</h4>
                      <input name='day' type='date' class='form-control' value='" . $aNatureTime['day'] ."' placeholder='ex: 2017-10-10'>
                    </div>
                </div></form>";
	
	return $default;
}

