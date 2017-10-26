<?php 
if(!isset($_SESSION)){session_start();}

$objType = htmlspecialchars($_POST['objtype']);
unset($_POST['objType']);
$idobj = htmlspecialchars($_POST['idobj']);
unset($_POST['idobj']);

require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_".$objType.".php";

if($objType == "qualification_teached"){
	$anObject = new QualificationTeached();
	$aQualificationTeached = $anObject->getObjectWhereYearAndIdQualification($_SESSION['year'], $idobj);
	
	if($aQualificationTeached != null){
		echo "success";
	} else{
		echo "fail";
	}
}
