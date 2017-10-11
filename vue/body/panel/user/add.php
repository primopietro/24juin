<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                      <h4>Nom</h4>
                      <input name='name' type='text' class='form-control' placeholder='ex: Bernard'>
                    </div>
                    <div class='col-xs-6'>
                      <h4>Mot de passe</h4>
                      <input name='password' type='text' class='form-control' placeholder='ex: Password'>
                    </div>
                </div></form>";
    
    return $default;
}

