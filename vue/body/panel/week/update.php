<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
	$aWeek = new Week();
	$aWeek = $aWeek->getObjectFromDB($idObj);
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
					<div class='col-xs-6'>
                      <h4>Année</h4>
                      <input name='year' type='string' class='form-control' value='".$_SESSION['year']."' readonly>
                    </div>
					<div class='col-xs-6'>
                      <h4>Code</h4>
                      <input name='name' type='text' value='". $aWeek['name']."' class='form-control' placeholder='ex: 10-juil'>
                    </div>
					<div class='col-xs-6'>
                      <h4>Date début</h4>
                      <input name='date_start' type='date' value='". $aWeek['date_start']."' class='form-control' placeholder='ex: 10-juil'>
                    </div>
					<div class='col-xs-6'>
                      <h4>Date début</h4>
                      <input name='date_finish' type='date' value='". $aWeek['date_finish']."' class='form-control' placeholder='ex: 10-juil'>
                    </div>
                </div></form>";
	
	return $default;
}

