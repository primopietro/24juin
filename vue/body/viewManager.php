<?php
require_once 'header.php';
$fixedPath ="panel/";
$navigation = htmlspecialchars($_GET['navigation']);

if(isset($_GET['actions'])){	
	
	echo getHeader($navigation,$_GET['actions']);
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