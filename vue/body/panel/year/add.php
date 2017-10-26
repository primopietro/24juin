<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Date début</h4>
                      <input name='start_date' type='date' class='form-control'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Date fin</h4>
                      <input name='end_date' type='date' class='form-control'>
                    </div>
                </div></form>";
    
    return $default;
}

