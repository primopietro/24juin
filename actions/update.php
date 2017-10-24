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
        } else if ($objType == "teacher_qualification") {
            
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
            // Delete old values
            $anObject->deleteFromDBWhere("id_program", " = ", $idobj);
            
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
        }
        
        // Add other objects here as "else if"
        
        $tempSetId = "setId_";
        $tempSetId .= $objType;
        $anObject->$tempSetId($idobj);
        
        // for each value in POST
        foreach ($_POST as $keyName => $keyValue) {
            $setter = "set";
            $temp = $keyName;
            $temp = ucfirst($temp);
            $setter .= $temp;
            $anObject->$setter($keyValue);
        }
        
        $anObject->updateDBObject();
    } else {
        echo "forbidden";
    }
}

