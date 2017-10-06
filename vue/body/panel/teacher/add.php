<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
	$default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-3'>
                        <h4>Code Unique</h4>
                      <input name='code' type='text' class='form-control' placeholder='ex: proulxMa'>
                    </div>
			
                    <div class='col-xs-3'>
                      <h4>Prénom</h4>
                      <input name='first_name' type='text' class='form-control' placeholder='ex: Maxime '>
                    </div>
					<div class='col-xs-3'>
                      <h4>Nom</h4>
                      <input name='family_name' type='text' class='form-control' placeholder='ex: Proulx'>
                    </div>
                </div></form>";
	
	return $default;
}

