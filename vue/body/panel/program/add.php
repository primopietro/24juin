<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-4'>
                      <h4>Nom</h4>
                      <input name='name' type='text' class='form-control' placeholder='ex: Charpenterie'>
                    </div>
					<div class='col-xs-4'>
                      <h4>Durée</h4>
                      <input name='duration' type='number' class='form-control' placeholder='ex: 100.5'>
                    </div>
                    <div class='col-xs-4'>
                      <h4>Nb. compétences</h4>
                      <input name='nb_of_qualifications' type='number' class='form-control' placeholder='ex: 10'>
                    </div>
                </div></form>";
    
    return $default;
}

