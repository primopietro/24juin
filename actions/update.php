<?php
if (! isset($_SESSION)) {
    session_start();
}

if (isset($_POST)) {
    // Check if user has ADD right for THIS object
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';
    
    // Get variables
    $objType = htmlspecialchars($_POST['objType']);
    unset($_POST['objType']);
    $idobj = htmlspecialchars($_POST['idobj']);
    unset($_POST['idobj']);
    $rights = checkUserRights($objType, $_SESSION['rightList']);
    // If has right to add, proceed
    if (isset($rights['update'])) {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_" . $objType . ".php";
        $anObject = null;
        if ($objType == "qualification") {
            $anObject = new Qualification();
        } else if ($objType == "group") {
            $anObject = new Group();
        } else if ($objType == "program") {
            $anObject = new Program();
        } else if ($objType == "teacher") {
            $anObject = new Teacher();
        } else if ($objType == "classroom") {
            $anObject = new Classroom();
        } else if ($objType == "customer") {
            $anObject = new Customer();
        } else if ($objType == "user") {
            $anObject = new User();
        } else if ($objType == "right") {
            $anObject = new Right();
        } else if ($objType == "role") {
            $anObject = new Role();
        } else if ($objType == "building") {
            $anObject = new Building();
        } else if ($objType == "nature_time") {
        	$anObject = new NatureTime();
        } else if ($objType== "pedago_day_all"){
            $anObject = new PedagoDayAll();
        } else if ($objType == "year") {
        	$anObject = new Year();
        }else if ($objType == "week") {
        	$anObject = new Week();
        }else if ($objType == "zone") {
        	$anObject = new Zone();
        }else if ($objType == "teacher_qualification") {
            
            $anObject = new TeacherQualification();
            // Delete old values
            $anObject->deleteFromDBWhere("id_teacher", " = ", $idobj);
            
            if (isset($_POST['qualifications'])) {
                $qualifications = $_POST['qualifications'];
                // Re-insert new ones
                foreach ($qualifications as $aQualification) {
                    $anObject->setId_teacher($idobj);
                    $anObject->setId_qualification($aQualification);
                    $anObject->addDBObject();
                }
            }
            
            echo "success";
            exit();
        } else if ($objType == "building_classroom") {
            
            $anObject = new BuildingClassroom();
            // Delete old values
            $anObject->deleteFromDBWhere("id_building", " = ", $idobj);
            
            if (isset($_POST['classrooms'])) {
                $classrooms = $_POST['classrooms'];
                // Re-insert new ones
                foreach ($classrooms as $aClassroom) {
                    $anObject->setId_building($idobj);
                    $anObject->setId_classroom($aClassroom);
                    $anObject->addDBObject();
                }
            }
            
            echo "success";
            exit();
        } else if ($objType == "program_qualification") {
            
            $anObject = new ProgramQualification();
            
            $anObject->deleteFromDBWhereAndProgram($idobj, $_SESSION['year']);
            
            if (isset($_POST['qualifications'])) {
                $qualifications = $_POST['qualifications'];
                if ($qualifications != null) {
                    if (sizeof($qualifications) > 0) {
                        // Re-insert new ones
                        foreach ($qualifications as $aQualification) {
                            $anObject->setId_program($idobj);
                            $anObject->setId_qualification($aQualification);
                            $anObject->addDBObject();
                        }
                    }
                }
            }
            
            echo "success";
            exit();
        } else if ($objType == "group_teacher") {
            
            $anObject = new GroupTeacher();
            // Delete old values
            $anObject->deleteFromDBWhere("id_teacher", " = ", $idobj);
            
            if (isset($_POST['groups'])) {
                $groups = $_POST['groups'];
                
                if ($groups != null) {
                    if (sizeof($groups) > 0) {
                        // Re-insert new ones
                        foreach ($groups as $aGroup) {
                            $anObject->setId_teacher($idobj);
                            $anObject->setId_group($aGroup);
                            $anObject->addDBObject();
                        }
                    }
                }
            }
            echo "success";
            
            exit();
        } else if ($objType == "pedago_day") {
        	require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_program_pedago_day.php";
        	$anObject = new ProgramPedagoDay();
        	// Delete old values
        	$anObject->deleteFromDBWhere("id_pedago_day", " = ", $idobj);
        	if (isset($_POST['programs'])) {
        		$programs= $_POST['programs'];
        		// Re-insert new ones
        		foreach ($programs as $aProgram) {
        			$anObject->setId_program($aProgram);
        			$anObject->setId_pedago_day($idobj);
        			$anObject->addDBObject();
        		}
        	}
        	
        	echo "success";
        	exit();
        }else if ($objType == "classroom_zone") {
        	require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_classroom_zone.php";
        	$anObject = new ClassroomZone();
        	// Delete old values
        	$anObject->deleteFromDBWhere("id_classroom", " = ", $idobj);
        	if (isset($_POST['zones'])) {
        		$zones= $_POST['zones'];
        		// Re-insert new ones
        		foreach ($zones as $aZone) {
        			$anObject->setId_zone($aZone);
        			$anObject->setId_classroom($idobj);
        			$anObject->addDBObject();
        		}
        	}
        	
        	echo "success";
        	exit();
        }
        
        // Add other objects here as "else if"
        
        $tempSetId = "setId_";
        $tempSetId .= $objType;
        $anObject->$tempSetId($idobj);
        
        $year = array();
        // for each value in POST
        foreach ($_POST as $keyName => $keyValue) {
            $setter = "set";
            $temp = $keyName;
            $temp = ucfirst($temp);
            $setter .= $temp;
            $anObject->$setter($keyValue);
            if($objType == "year" && ($keyName == "start_date" || $keyName == "end_date")){
            	array_push($year, $keyValue);
            }
        }
        
        if ($objType== "year"){
        	$start = date("Y", strtotime($year[0]));
        	$end = date("Y", strtotime($year[1]));
        	
        	$anObject->setYear($start . "-" . $end);
        }
        
        $anObject->updateDBObject();
    } else {
        echo "forbidden";
    }
}

