<?php 
if(!isset($_SESSION)){session_start();}

if(isset($_POST)){
	//Check if user has ADD right for THIS object
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';
	
	//Get variables
	$objType = htmlspecialchars($_POST['objtype']);
	$idObj =  htmlspecialchars($_POST['idobj']);
	$rights = checkUserRights($objType, $_SESSION ['rightList']);
	//If has right to add, proceed
	if(isset($rights['delete'])){
		require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_".$objType.".php";
		$anObject = null;
		if($objType== "qualification"){
			$anObject = new Qualification();
		} else if ($objType== "group"){
		    $anObject = new Group();
		}else if ($objType== "program"){
		    $anObject = new Program();
		} else if ($objType== "teacher"){
			require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
		    $anObject = new Teacher();
		    $aUser = new User();
		    $aUser->deleteFromDBWhere("fk_teacher", "=", $idObj);
		} else if ($objType== "classroom"){
		    $anObject = new Classroom();
		} else if ($objType== "customer"){
		    $anObject = new Customer();
		} else if ($objType== "user"){
		    $anObject = new User();
		} else if ($objType== "right"){
		    $anObject = new Right();
		} else if ($objType== "role"){
		    $anObject = new Role();
		} else if ($objType== "building"){
		    $anObject = new Building();
		} else if ($objType== "nature_time"){
			$anObject = new NatureTime();
		} else if ($objType== "pedago_day"){
		    $anObject = new PedagoDay();
		} else if ($objType == "week") {
			$anObject = new Week();
		}else if ($objType== "pedago_day_all"){
		    $anObject = new PedagoDayAll();
		} else if ($objType== "zone"){
			$anObject = new Zone();
		}else if ($objType== "holiday"){
			    $anObject = new Holiday();
			
		} else if ($objType== "qualification_teached"){
			$anObject = new QualificationTeached();
			$aQualificationTeached = $anObject->getObjectWhereYearAndIdQualification($_SESSION['year'], $idObj);
			if($aQualificationTeached != null){
				$idObj = $aQualificationTeached['id_qualification_teached'];
			}
		}
	
		echo $anObject->deleteFromDB($idObj);
	}else{
		echo "Right forbidden";
	}
	
}

