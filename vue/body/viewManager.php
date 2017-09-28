<?php

$fixedPath ="panel/";
$navigation = htmlspecialchars($_GET['navigation']);

if(isset($_GET['actions'])){	
	require_once $finalString = $fixedPath . $navigation . '/header.php';
	$actualActions = explode(",", $_GET['actions'] );
	
	for($i=0;$i<sizeof($actualActions); $i++){
		//TODO : REGLER LES ROLES
		//VERIFY USER ROLES DANS LA SESSION 
		//POUR LA VERSION DE DEVELOPPEMENT
	
		$anAction = htmlspecialchars($actualActions[$i]);
		$finalString = $fixedPath . $navigation . "/". $anAction. ".php";
		require_once $finalString;
	}
}

?>