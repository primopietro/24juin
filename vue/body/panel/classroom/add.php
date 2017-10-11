<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Code</h4>
                      <input name='code' type='text' class='form-control' placeholder='ex: 1234'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Code</h4>
                      <input name='nb_zone' type='number' class='form-control' placeholder='ex: 3'>
                    </div>
                </div></form>";
    
    return $default;
}

