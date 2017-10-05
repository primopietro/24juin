<?php 
if(!isset($_SESSION)){session_start();}

if(isset($_POST)){
	//Check if user has ADD right for THIS object
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';
	
	//Get variables
	$objType = htmlspecialchars($_POST['objType']);
	unset($_POST['objType']);
	$idobj =  htmlspecialchars($_POST['idobj']);
	unset($_POST['idobj']);
	$rights =checkUserRights($objType, $_SESSION ['rightList']);
	//If has right to add, proceed
	if(isset($rights['update'])){
		require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_".$objType.".php";
		$anObject = null;
		if($objType== "qualification"){
			$anObject = new Qualification();
			
		}//Add other objects here as "else if"
		
		
		$tempSetId = "setId_";
		$tempSetId .=$objType;
		$anObject->$tempSetId($idobj);
		
		
		//for each value in POST
		foreach($_POST as $keyName => $keyValue){
			$setter = "set";
			$temp = $keyName;
			$temp = ucfirst ($temp);
			$setter .= $temp;
			$anObject->$setter($keyValue);
		}
		
		$anObject->updateDBObject();
	}else{
		echo "forbidden";
	}
	
}

