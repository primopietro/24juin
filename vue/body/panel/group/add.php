<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Code unique</h4>
                      <input name='code' type='text' class='form-control' placeholder='Code unique'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Année</h4>
                      <input name='year' type='date' class='form-control' placeholder='Année'>
                    </div>
                </div></form>";
    
    return $default;
}

