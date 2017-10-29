<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_pedago_day_all.php';
	$aPedagoDay = new PedagoDayAll ();
	$aPedagoDay = $aPedagoDay->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
					<div class='col-xs-4'>
                        <h4>Jour</h4>
                      <input name='day' type='date' class='form-control' value='" . $aPedagoDay['day'] ."' placeholder='ex: 2017-10-10'>
                    </div>
                </div></form>";
	
	return $default;
}

