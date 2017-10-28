<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_pedago_day.php';
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user_role.php";
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "pedago_day";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
	
	
	$aPedagoDay = new PedagoDay ();
	
	$user = new User();
	$user = unserialize($_SESSION['current_user']);
	
	$userRoles = array();
	$userRoles = unserialize($_SESSION['current_user_role']);
	
	$aProgram = new Program();
	$aProgramList = $aProgram->getListOfAllDBObjects();
	
	
	
	$default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste des journées pédagogiques </h3>";
	
	if (isset ( $rights ['add'] )) {
	    $default .="<br><a class='btn btn-app action'  action='add' objtype='" . $objName . "'>
                <i class='fa fa-plus'></i> Ajouter
              <div class='ripple-container'></div></a>";}
	if($user)
	$default .= "<div class='box-tools'>
			
                               <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
			
                            </div>
            <!-- /.box-header -->
            <div class='box-body'>";
	
	$role = 2;
	foreach($userRoles as $localUserRole){
		if($localUserRole['id_role'] == 1 || $localUserRole['id_role'] == 3){
			$default .= "<select class='selectProgram' name='fk_program' id='program_pedago_day'><option";
			if($_SESSION['filterPedago'] == 0){
				$default .= " selected ";
			}
			$default .= " value='0'>Tous</option>";
			if($aProgramList!= null){
				if(sizeof($aProgramList)>0){
					foreach($aProgramList as $theProgram){
						$default .= "   <option   value='". $theProgram['id_program'] ."'";
						
						if($_SESSION['filterPedago'] == $theProgram['id_program']){
							$default .= " selected ";
						}
						
						$default .= ">" .$theProgram['name'] ;
						$default .= "   </option> ";
					}
					
				}
			}
			$default .= "</select>";
			$role = $localUserRole['id_role'];
			break;
		}
	}
	
	$aListOfPedagoDay = array();
	
	if($role == 2){
	  
		$aListOfPedagoDay = $aPedagoDay->getPedagoDay($user->getFk_program());
	} else{
		$aListOfPedagoDay = $aPedagoDay->getPedagoDay($_SESSION['filterPedago']);
		if($_SESSION['filterPedago'] == 0){
		    $default .= "<script id='thisScript'>$('#tempAdd').remove();$('#thisScript').remove();</script>";
		}
	}
	
	if ($aListOfPedagoDay != null) {
	    
		if (sizeof ( $aListOfPedagoDay ) > 0) {
			$default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>";
			if($role != 2 && $_SESSION['filterPedago'] == 0){
				$default .= "<th>Programme</th>";
			}
			$default .= "<th>Jour(s)</th>";
			
			if (isset ( $rights ['update'] )) {
				$default .= "  <th>Modifier</th>";
			}
			if (isset ( $rights ['delete'] )) {
				$default .= "  <th>Supprimer</th>";
			}
			
			$default .= "</tr>
            <thead>
            <tbody>";
			
			$default .= $aPedagoDay->printPedagoDayList ( $aListOfPedagoDay, isset ( $rights ['update'] ), isset ( $rights ['delete'] ), $_SESSION['filterPedago'], $role);
			
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

   