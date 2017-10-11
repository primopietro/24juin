<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Nom</h4>
                      <input name='name' type='text' class='form-control' placeholder='ex: add'>
                    </div>
                </div></form>";
    
    return $default;
}

