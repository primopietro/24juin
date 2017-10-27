<?php
if (! isset ( $_SESSION )) {
    session_start ();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_pedago_day_all.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "pedago_day_all";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );

if (isset ( $rights ['view'] )) {
    
    $aProgram = new PedagoDayAll();
    $aListOfProgram = $aProgram->getPedagoDayAll();
    
    $default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste des journées pédagogiques</h3>";
    
    if (isset ( $rights ['add'] )) {
        $default .= "<br>  <a class='action' action='add' objtype='" . $objName . "'>Ajouter </a>";
    }


    $default .= "<div class='box-tools'>
                                
                               <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
                               
                            </div>
            <!-- /.box-header -->
            <div class='box-body'>";
    if ($aListOfProgram != null) {
        if (sizeof ( $aListOfProgram ) > 0) {
		    $default .= "<table class='table table-bordered table-hover'>
             <thead>
                <tr>
                  <th>Jour(s)</th>";
                 
                if (isset ( $rights ['update'] )) {
				    $default .= "<th>Modifier</th>";
			    }
			    if (isset ( $rights ['delete'] )) {
				    $default .= "<th>Supprimer</th>";
			    }
			    $default .= "</tr>
            <thead>
            <tbody>";
			    $default .= $aProgram->printPedagoDayAllList($aListOfProgram, isset ( $rights ['update'] ), isset ( $rights ['delete'] ));
            
			$default .= "</tbody>
              </table>";
        }
    }
    
    
    $default .= "</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->";
    
    echo $default;
}
