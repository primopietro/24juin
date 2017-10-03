<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_groupe.php';
    $default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste Groupes</h3>


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
                  <th>Code Groupe</th>
                  <th>Année</th>
                  <th>Supprimer</th>
                </tr>
            <thead>
            <tbody>";
    
    $aGroupe = new Groupe();
    $aListOfGroupe = $aGroupe->getActiveGroupe();
    $default .= $aGroupe->printGroupe($aListOfGroupe);
    
    $default .= "</tbody>
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
