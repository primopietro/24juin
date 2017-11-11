<?php
if (! isset ( $_SESSION )) {
    session_start ();
}
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_week.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "timeslot_week";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );
// Check if user has the right to VIEW

if (isset ( $rights ['view'] )) {
    
    
    $aTimeslotWeek = new TimeslotWeek ();
    $aListOfTimeslotWeek = $aTimeslotWeek->getTimeslotWeek();
    
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
    if ($aListOfTimeslotWeek != null) {
        if (sizeof ( $aListOfTimeslotWeek ) > 0) {
            $default .= "<table class='table table-bordered table-hover'>
			<thead>
			<tr>
			<th>Case horaire </th>
			<th>Semaine</th>";
            if (isset ( $rights ['update'] )) {
                $default .= "  <th>Modifier</th>";
            }
            
            $default .= "</tr>
            <thead>
            <tbody>";
            
            $default .= $aTimeslotWeek->printTimeslotWeekList( $aListOfTimeslotWeek, isset ( $rights ['update'] ) );
            
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
