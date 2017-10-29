<?php
if(!isset($_SESSION)){session_start();}
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup(){
    $default = "<form id='formAdd'><div class='box-body'>
                  <div class='row'>
					<div class='col-xs-6'>
                      <h4>Année</h4>
                      <input name='year' type='string' class='form-control' value='".$_SESSION['year']."' readonly>
                    </div>
					<div class='col-xs-6'>
                      <h4>Code</h4>
                      <input name='name' type='text' class='form-control' placeholder='ex: 10-juil'>
                    </div>
					<div class='col-xs-6'>
                      <h4>Date début</h4>
                      <input name='date_start' type='date' class='form-control' placeholder='ex: 10-juil'>
                    </div>
					<div class='col-xs-6'>
                      <h4>Date début</h4>
                      <input name='date_finish' type='date' class='form-control' placeholder='ex: 10-juil'>
                    </div>
                </div></form>";
    
    return $default;
}

