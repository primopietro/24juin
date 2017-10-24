<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
	$default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
					<div class='col-xs-4'>
                      <h4>Heure(s)</h4>
                      <input name='hours' type='number' class='form-control' placeholder='ex: 35.5 '>
                    </div>
                    <div class='col-xs-4'>
                        <h4>Jour</h4>
                      <input name='day' type='date' class='form-control' placeholder='ex: 2017-10-10'>
                    </div>
                </div></form>";
	
	return $default;
}

