<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
    $default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste groups</h3>


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
                  <th>Code group</th>
                  <th>Année</th>
                  <th>Supprimer</th>
                </tr>
            <thead>
            <tbody>";
    
    $agroup = new Group();
    $aListOfGroup = $agroup->getActiveGroup();
    $default .= $agroup->printGroupList($aListOfGroup);
    
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
