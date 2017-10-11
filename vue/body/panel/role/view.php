<?php
if (! isset ( $_SESSION )) {
    session_start ();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_role.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "role";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );

if (isset ( $rights ['view'] )) {
    
    $aRole = new Role();
    $aListOfRole = $aRole->getActiveRole();
    
    $default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste des rôles</h3>";
    
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
    if ($aListOfRole != null) {
        if (sizeof ( $aListOfRole ) > 0) {
		    $default .= "<table class='table table-bordered table-hover'>
             <thead>
                <tr>
                  <th>Nom</th>";
                if (isset ( $rights ['update'] )) {
				    $default .= "<th>Modifier</th>";
			    }
			    if (isset ( $rights ['delete'] )) {
				    $default .= "<th>Supprimer</th>";
			    }
			    $default .= "</tr>
            <thead>
            <tbody>";
			    $default .= $aRole->printRoleList($aListOfRole, isset ( $rights ['update'] ), isset ( $rights ['delete'] ));
            
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
