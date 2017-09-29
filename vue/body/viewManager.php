<?php
if(!isset($_SESSION)){session_start();}
require_once 'header.php';


$navigation = "";
$actions = "";
if(isset($_GET['actions'])){	
	$navigation = htmlspecialchars($_GET['navigation']);
	$actions = $_GET['actions'];
	$_SESSION['curret_page'] = $navigation;
	$_SESSION['current_actions'] = $actions;
}
else{
	$navigation = htmlspecialchars($_SESSION['curret_page']);
	$actions = htmlspecialchars($_SESSION['current_actions']);
}
getVue($navigation,$actions);

function getVue($navigation,$actions){
	//Variables
	$fixedPath ="panel/";
	
	echo getHeader($navigation,$actions);
	$actualActions = explode(",", $actions);
	
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