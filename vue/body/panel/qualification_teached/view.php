<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "qualification_teached";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
	
	
	$aQualificationTeached = new QualificationTeached ();
	$aListOfQualificationTeached = $aQualificationTeached->getActiveQualificationTeached ();
	
	$default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste des compétences</h3>";
	
	$default .= "<div class='box-tools'>
			
                               <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
			
                            </div>
            <!-- /.box-header -->
            <div class='box-body'>";
	if ($aListOfQualificationTeached != null) {
		if (sizeof ( $aListOfQualificationTeached ) > 0) {
			$default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>
			<th>Compétences</th>
			<th>Enseigné</th>";
			
			$default .= "</tr>
            <thead>
            <tbody>";
			
			$default .= $aQualificationTeached->printQualificationTeachedList ( $aListOfQualificationTeached, isset ( $rights ['update'] ), isset ( $rights ['delete'] ) );
			
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

   