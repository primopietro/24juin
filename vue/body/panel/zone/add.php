<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Code</h4>
                      <input name='code' type='text' class='form-control' placeholder='ex: DFA392'>
                    </div>
				<div class='col-xs-4'>
                      <h4>Comment</h4>
                      <input name='comment' type='text' class='form-control' placeholder='ex:  A cours'>
                    </div>
                </div></form>";
    
    return $default;
}

