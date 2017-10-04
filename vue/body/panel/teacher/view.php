<?php

    $default = "
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
                  <td ><a href='#'><i class='fa fa-times text-red'></i></a></td>
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

