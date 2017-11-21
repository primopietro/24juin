<?php
if (! isset ( $_SESSION ))
	session_start ();
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom_zone.php';
	
	$id_classroom = $_GET['id_classroom'];
	
	$arraOfID = explode(",", $id_classroom);
	
	$aZone = new ClassroomZone();
	foreach($arraOfID as $id){
	    echo $aZone->getObjectAsSelectWhere("code", $id);
	}
	
	
?>