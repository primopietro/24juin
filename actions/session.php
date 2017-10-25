<?php 
if(!isset($_SESSION)){session_start();}

if(isset($_POST['fk_teacher'])){
	
	$fk_teacher = $_POST['fk_teacher'];
	
	$_SESSION['filter'] = $fk_teacher;
	
}
