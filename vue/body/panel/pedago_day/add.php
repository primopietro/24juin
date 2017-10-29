<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
	$default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
					<div class='col-xs-4'>
                                     <h4>Jour</h4>
                      <input name='day' type='date' class='form-control' placeholder='ex: 2017-10-10'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Année</h4>
                      <input name='year' type='string' class='form-control' value='".$_SESSION['year']."' readonly>
                    </div>
                </div></form>";
	
	return $default;
}

