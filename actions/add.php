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
		} else if ($objType== "pedago_day"){
		    $anObject = new PedagoDay();
		}  else if ($objType== "pedago_day_all"){
		    $anObject = new PedagoDayAll();
		} else if ($objType== "year"){
			$anObject = new Year();
		} else if ($objType== "qualification_teached"){
			$anObject = new QualificationTeached();
		} else if ($objType== "week"){
			$anObject = new Week();
		}else if ($objType== "zone"){
			$anObject = new Zone();
		}else if ($objType== "fixed_holiday"){
		    $anObject = new FixedHoliday();
		}
		//Add other objects here
		
		$year = array();
		//for each value in POST
		foreach($_POST as $keyName => $keyValue){
			$setter = "set";
			$temp = $keyName;
			$temp = ucfirst ($temp);
			$setter .= $temp;
			$anObject->$setter($keyValue);
			if($objType == "year" && ($keyName == "start_date" || $keyName == "end_date")){
				array_push($year, $keyValue);
			}
		}
		
		if ($objType == "year"){
			$start = date("Y", strtotime($year[0]));
			$end = date("Y", strtotime($year[1]));
			
			$anObject->setYear($start . "-" . $end);
		} else if($objType == "qualification_teached"){
			$anObject->setYear($_SESSION['year']);
		} 
		
		$id = 0;
		$id = $anObject->addDBObject();
		
		if($objType== "nature_time"){
			require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_teacher_nature_time.php";
			require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
			$aTeacherNatureTime = new TeacherNatureTime();
			$aTeacherNatureTime->setId_nature_time($id);
			
			$user = new User();
			$user = unserialize($_SESSION['current_user']);
			
			if($_SESSION['filter'] == 0){
				$aTeacherNatureTime->setId_teacher($user->getFk_teacher());
			} else{
				$aTeacherNatureTime->setId_teacher($_SESSION['filter']);
			}
			$aTeacherNatureTime->addDBObject();
			
			$aYearNatureTime = new YearNatureTime();
			$aYearNatureTime->setId_year($_SESSION['id_year']);
			$aYearNatureTime->setId_nature_time($id);
			
			$aYearNatureTime->addDBObject();
		}
		if($objType== "pedago_day"){
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_program_pedago_day.php";
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
		    $aProgramPedagoDay = new ProgramPedagoDay();
		    $aProgramPedagoDay->setId_pedago_day($id);
		    
		    $user = new User();
		    $user = unserialize($_SESSION['current_user']);
		    
		    if($_SESSION['filterPedago'] == 0){
		        $aProgramPedagoDay->setId_program($user->getFk_program());
		    } else{
		        $aProgramPedagoDay->setId_program($_SESSION['filterPedago']);
		    }
		    $aProgramPedagoDay->addDBObject();
		}
		
		if($objType== "fixed_holiday"){
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_fixed_holiday.php";
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_year_fixed_holiday.php";
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
		   
		    $aYearFixedHoliday = new YearFixedHoliday();
		    $aYearFixedHoliday->setId_year($_SESSION['id_year']);
		    $aYearFixedHoliday->setId_fixed_holiday($id);
		    
		    $aYearFixedHoliday->addDBObject();
		}
		if($objType== "pedago_day_all"){
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_pedago_day_all.php";
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_year_pedago_day_all.php";
		    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
		    
		    $aYearPedagoDayAll = new YearPedagoDayAll();
		    $aYearPedagoDayAll->setId_year($_SESSION['id_year']);
		    $aYearPedagoDayAll->setId_pedago_day_all($id);
		    
		    $aYearPedagoDayAll->addDBObject();
		}
	}else{
		echo "forbidden";
	}
	
}

