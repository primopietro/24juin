<?php
if (! isset ( $_SESSION ))
	session_start ();
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building_classroom.php';
	
	$id_building = $_GET['id_building'];
	
	$aClassroom = new BuildingClassroom();
	$aClassroom->getObjectAsSelectWhere("code", $id_building);
	
?>