<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group_teacher.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "group_teacher";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
	
	
    $aGroupTeacher = new GroupTeacher ();
    $aListOfGroupTeachers = $aGroupTeacher->getGroupTeacher();
	
	$default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Associations</h3>";
	
	$default .= "<div class='box-tools'>
			
                               <button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
			
                            </div>
            <!-- /.box-header -->
            <div class='box-body'>";
			$default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>
			<th>Teacher </th>
			<th>Groupes</th>";
			if (isset ( $rights ['update'] )) {
				$default .= "  <th>Modifier</th>";
			}
			
			$default .= "</tr>
            <thead>
            <tbody>";
			
			$default .= $aGroupTeacher->printGroupTeacherList ( $aListOfGroupTeachers, isset ( $rights ['update'] ) );
			
			$default .= "</tbody>
              </table>";
		
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

   