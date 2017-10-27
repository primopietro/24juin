<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_nature_time.php';
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user_role.php";
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "nature_time";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
	
	
	$aNatureTime = new NatureTime ();
	
	$user = new User();
	$user = unserialize($_SESSION['current_user']);
	
	$userRoles = array();
	$userRoles = unserialize($_SESSION['current_user_role']);
	
	$aTeacher = new Teacher();
	$aTeacherList = $aTeacher->getListOfAllDBObjects();
	
	
	$default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Liste des temps de nature</h3>";
	
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
			$default .= "<select class='selectTeacher' name='fk_teacher' id='teacher_nature_time'><option";
			if($_SESSION['filter'] == 0){
				$default .= " selected ";
			}
			$default .= " value='0'>Tous</option>";
			if($aTeacherList!= null){
				if(sizeof($aTeacherList)>0){
					foreach($aTeacherList as $theTeacher){
						$default .= "   <option   value='". $theTeacher['id_teacher'] ."'";
						
						if($_SESSION['filter'] == $theTeacher['id_teacher']){
							$default .= " selected ";
						}
						
						$default .= ">" . $theTeacher['code'] ." - " . $theTeacher['first_name'] . " " . $theTeacher['family_name'];
						$default .= "   </option> ";
					}
					
				}
			}
			$default .= "</select>";
			$role = $localUserRole['id_role'];
			break;
		}
	}
	
	$aListOfNatureTime = array();
	
	if($role == 2){
		$aListOfNatureTime = $aNatureTime->getNatureTime($user->getFk_teacher());
	} else{
		$aListOfNatureTime = $aNatureTime->getNatureTime($_SESSION['filter']);
		if($_SESSION['filter'] == 0){
			$default .= "<script id='thisScript'>$('#tempAdd').remove();$('#thisScript').remove();</script>";
		}
	}
	
	if ($aListOfNatureTime != null) {
		if (sizeof ( $aListOfNatureTime ) > 0) {
			$default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>";
			if($role != 2 && $_SESSION['filter'] == 0){
				$default .= "<th>Professeur</th>";
			}
			$default .= "<th>Heure(s)</th>
			<th>Jour</th>";
			
			if (isset ( $rights ['update'] )) {
				$default .= "  <th>Modifier</th>";
			}
			if (isset ( $rights ['delete'] )) {
				$default .= "  <th>Supprimer</th>";
			}
			
			$default .= "</tr>
            <thead>
            <tbody>";
			
			$default .= $aNatureTime->printNatureTimeList ( $aListOfNatureTime, isset ( $rights ['update'] ), isset ( $rights ['delete'] ), $_SESSION['filter'], $role);
			
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

   