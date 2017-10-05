<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "qualification";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
	
	$aQualification = new Qualification ();
	$aListOfQualifications = $aQualification->getActiveQualifications ();
	
	$default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste " . $objName . "</h3>";
	
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
	if ($aListOfQualifications != null) {
		if (sizeof ( $aListOfQualifications ) > 0) {
			$default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>
			<th>Code </th>
			<th>Nom</th>
			<th>Quantite d'heures</th>";
			if (isset ( $rights ['update'] )) {
				$default .= "  <th>Modifier</th>";
			}
			if (isset ( $rights ['delete'] )) {
				$default .= "  <th>Supprimer</th>";
			}
			
			$default .= "</tr>
            <thead>
            <tbody>";
			
			$default .= $aQualification->printQualificationsList ( $aListOfQualifications, isset ( $rights ['update'] ), isset ( $rights ['delete'] ) );
			
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

   