<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');

// if session not set (user not logged in)
if (! isset($_SESSION["currentClient"]) || $_SESSION["currentUser"]->getAdministrateur()) {
    $default = "
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        Professeurs
      </h1>
      <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-dashboard'></i> Acceuil</a></li>
        <li><a href='#'>Professeurs</a></li>
        <li class='active'>Data tables</li>
      </ol>
    </section>
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Ajout Professeur</h3>


             <div class='box-tools'>
                                
                                <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
                               
                            </div>
            <div class='box-body'>
              <div class='row'>
                <div class='col-xs-3'>
                    <h4>Matricule</h4>
                  <input type='text' class='form-control' placeholder='Matricule'>
                </div>
                <div class='col-xs-3'>
                  <h4>Nom</h4>
                  <input type='text' class='form-control' placeholder='Nom'>
                </div>
                <div class='col-xs-3'>
                  <h4>Prenom</h4>
                  <input type='text' class='form-control' placeholder='Prenom'>
                </div>
                <div class='col-xs-3'>
                <h4>Programme</h4>
                <select class='form-control select2'  data-placeholder='Choisissez un programme'>
                  <option disabled selected value>Choisissez un programme</option>
                  <option>Cuisine</option>
                  <option>Mécanique</option>
                  <option>Électricité</option>
                  <option>Charpenterie</option>
                  <option>Infographie</option>
                  <option>Coiffure</option>
                </select>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
                <div class='box-footer'>
                <button type='cancel' class='btn btn-primary'>Annuler</button>
                <button type='submit' class='btn btn-primary'>Ajouter</button>
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
 <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste Professeur</h3>


             <div class='box-tools'>
                                
                               <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
                               
                            </div>
            <!-- /.box-header -->
            <div class='box-body'>
              <table class='table table-bordered table-hover'>
             <thead>
                <tr>
                  <th>Matricule</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Programme</th>
                  <th>Supprimer</th>
                </tr>
            <thead>
            <tbody>
                <tr>
                  <td>183</td>
                  <td>Doe</td>
                  <td>John</td>
                  <td>Cuisine</td>
                  <td><a href='#'><i class='fa fa-times text-red'></i></a></td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Pierce</td>
                  <td>Alexander </td>
                  <td>Charpenterie</td>
                  <td><a href='#'><i class='fa fa-times text-red'></i></a></td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Doe</td>
                  <td>Bob</td>
                  <td>Électricité</td>
                 <td><a href='#'><i class='fa fa-times text-red'></i></a></td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Doe</td>
                  <td>Mike</td>
                  <td>Mécanique</td>
                  <td><a href='#'><i class='fa fa-times text-red'></i></a></td>
                </tr>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->";
    
    echo $default;
} // if session is set (user logged in)
