<?php 
if(!isset($_SESSION)){session_start();}

if(isset($_POST)){
	//Check if user has ADD right for THIS object
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';
	
	//Get variables
	$objType = htmlspecialchars($_POST['objType']);
	unset($_POST['objType']);
	$rights =checkUserRights($objType, $_SESSION ['rightList']);
	//If has right to add, proceed
	if(isset($rights['add'])){
		require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_".$objType.".php";
		$anObject = null;
		if($objType== "qualification"){
			$anObject = new Qualification();
		} else if ($objType== "group"){
		    $anObject = new Group();
		}else if ($objType== "program"){
		    $anObject = new Program();
		} else if ($objType== "teacher"){
		    $anObject = new Teacher();
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
		}
		//Add other objects here
		
		
		//for each value in POST
		foreach($_POST as $keyName => $keyValue){
			$setter = "set";
			$temp = $keyName;
			$temp = ucfirst ($temp);
			$setter .= $temp;
			$anObject->$setter($keyValue);
		}
		
		$id = 0;
		$id = $anObject->addDBObject();
		
		if($objType== "nature_time"){
			require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_teacher_nature_time.php";
			$aTeacherNatureTime = new TeacherNatureTime();
			$aTeacherNatureTime->setId_nature_time($id);
			$aTeacherNatureTime->setId_teacher(1);
			$aTeacherNatureTime->addDBObject();
		}
	}else{
		echo "forbidden";
	}
	
}

