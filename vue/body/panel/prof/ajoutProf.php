<?php




    $default = "
    
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

    </section>";
 
    
    echo $default;

