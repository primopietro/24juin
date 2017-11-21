<?php
if (! isset ( $_SESSION )) {
    session_start ();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$objName = "schedule";
$rights = checkUserRights ( $objName, $_SESSION ['rightList'] );

if (isset ( $rights ['view'] )) {
    
    $aProgram = new Program();
    $aListOfProgram = $aProgram->getActiveProgram();
    
    $default = "
   <section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Ajout horaire</h3>";
    
			    if (isset ( $rights ['add'] )) {
			    	$aGroup = new Group();
			    	$aProgram = new Program();
			    	$default .= "<form>
			    	
			    	<div class='col-xs-2'>
			    	<h4>Année</h4>
			    	<input type='text' id='year' value='".$_SESSION['year']."' id_year='".$_SESSION['id_year']."'readonly></input>
			    	</div>
			    	
			    	<div class='col-xs-2'>
			    	<h4>Groupe</h4>
			    	<select id='groupSelect' style='height: 26px;'>";
			    	$default .= $aGroup->getObjectAsSelect("code");
			    	$default .= "</select>
				    </div>
				    
				    <div class='col-xs-8'>
				    <h4>Programme</h4>
				    <select id='programSelect' style='height: 26px;'>";
			    	$default .= $aProgram->getObjectAsSelect("name");
				    $default .= "</select>
				    </div>
				    
				    <div class='col-xs-1'>
				    <h4>AM1 Début</h4>
				    <input type='time' id='am1Time_start'></input>
				    </div>
				    
				    <div class='col-xs-1'>
				    <h4>AM1 Fin</h4>
				    <input type='time' id='am1Time_end'></input>
				    </div>
				    
				    <div class='col-xs-1'>
				    <h4>AM2 Début</h4>
				    <input type='time' id='am2Time_start'></input>
				    </div>
				    
				    <div class='col-xs-9'>
				    <h4>AM2 Fin</h4>
				    <input type='time' id='am2Time_end'></input>
				    </div>
				    
				    
				    
				    <div class='col-xs-1'>
				    <h4>PM1 Début</h4>
				    <input type='time' id='pm1Time_start'></input>
				    </div>
				    
				    <div class='col-xs-1'>
				    <h4>PM1 Fin</h4>
				    <input type='time' id='pm1Time_end'></input>
				    </div>
				    
				    <div class='col-xs-1'>
				    <h4>PM2 Début</h4>
				    <input type='time' id='pm2Time_start'></input>
				    </div>
				    
				    <div class='col-xs-1'>
				    <h4>PM2 Fin</h4>
				    <input type='time' id='pm2Time_end'></input>
				    </div>
				    <a class='btn btn-app action'  style='margin-left: 36px; margin-top: -15px;' id='addHoraire' objtype='" . $objName . "'>
			                		<i class='fa fa-plus'></i> Ajouter
			              		<div class='ripple-container'></div></a>
				    </form>";
			    }

        $default .= "</div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->";
    
    echo $default;
}
