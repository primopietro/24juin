<?php 
if(!isset($_SESSION)){session_start();}

$objType = htmlspecialchars($_POST['objtype']);
unset($_POST['objType']);
$idobj = htmlspecialchars($_POST['idobj']);
unset($_POST['idobj']);
$value = htmlspecialchars($_POST['value']);
unset($_POST['value']);

if($objType == "year"){
	$_SESSION['id_year'] = $idobj;
	$_SESSION['year'] = $value;
	echo "success";
}else if(isset($_POST['fk_teacher'])){
	
	$fk_teacher = $_POST['fk_teacher'];
	
	
	$_SESSION['filter'] = $fk_teacher;
}else if(isset($_POST['fk_program'])){
    
    $fk_program = $_POST['fk_program'];
    
    
    $_SESSION['filterPedago'] = $fk_program;
    
}
