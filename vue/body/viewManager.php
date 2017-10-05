<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
require_once 'header.php';

$navigation = "";
$actions = "";

//TODO : check if user has VIEW right for THIS object (navigation)
if (isset ( $_GET ['action'] )) {
	$navigation = htmlspecialchars ( $_GET ['navigation'] );
	$_SESSION ['current_page'] = $navigation;
	getVue ( $navigation, $actions );
} else {
	if (isset ( $_SESSION ['current_page'] )) {
		$navigation = htmlspecialchars ( $_SESSION ['current_page'] );
		$action = htmlspecialchars ( $_SESSION ['current_action'] );
		getVue ( $navigation, $actions );
	} else {
		require_once "login/login.php";
	}
}
function getVue($navigation) {
	
	echo getHeader( $navigation);
	
	require_once  $_SERVER["DOCUMENT_ROOT"] .'/24juin/vue/body/panel/'. $navigation .'/view.php';
}


?>