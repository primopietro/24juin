<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "building";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
	
	
    $aBuilding = new Building ();
    $aListOfBuilding = $aBuilding->getActiveBuilding ();
	
	$default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste des bâtiments</h3>";
	
	if (isset ( $rights ['add'] )) {
	    $default .="<br><a class='btn btn-app action'  action='add' objtype='" . $objName . "'>
                <i class='fa fa-plus'></i> Ajouter
              <div class='ripple-container'></div></a>";}
	$default .= "<div class='box-tools'>
			
                               <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
			
                            </div>
            <!-- /.box-header -->
            <div class='box-body'>";
	if ($aListOfBuilding != null) {
	    if (sizeof ( $aListOfBuilding ) > 0) {
			$default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>
			<th>Nom</th>
			<th>Adresse</th>
			<th>Nombre de locaux</th>";
			if (isset ( $rights ['update'] )) {
				$default .= "  <th>Modifier</th>";
			}
			if (isset ( $rights ['delete'] )) {
				$default .= "  <th>Supprimer</th>";
			}
			
			$default .= "</tr>
            <thead>
            <tbody>";
			
			$default .= $aBuilding->printBuildingList ( $aListOfBuilding, isset ( $rights ['update'] ), isset ( $rights ['delete'] ) );
			
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

   