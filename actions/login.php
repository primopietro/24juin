<?php 
if(!isset($_SESSION)){session_start();}


require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";

require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user_role.php";
//Get variables
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);


$aUser = new User();
$aUser->setName($username);
$aUser->setPassword($password);

if($aUser->checkPassword()) {      
    
    
	require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_right_object_role.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_object.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_right.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_role.php";
    
    //Set up environment variables
    $userRole = new UserRole();
    $userRoles = $userRole->getListOfAllDBObjectsWhere("id_user","=",$aUser->getId_user());
    if($userRoles != null){
    	foreach ($userRoles as $localUserRole){
    		
    		$localRightObjectRole = new RightObjectRole();
    		$localRightObjectRoleList = $localRightObjectRole->getListOfAllDBObjectsWhere("id_role","=",$localUserRole['id_role']);
    		$_SESSION['rights'][] = $localRightObjectRoleList;
    	}
    }
   
   
    $counterObject =0;
    $tempActions ="";
    $newMenuList = array();
    if(isset($_SESSION["rights"])){
    	if($_SESSION["rights"] != null){
    		foreach ($_SESSION["rights"] as $aLocalRights) {
    			if ($aLocalRights != null) {
    				if (sizeof($aLocalRights) > 0) {
    					foreach ($aLocalRights as $aLocalRight) {
    						$anObject = new Object();
    						$aRight = new Right();
    						
    						$anObject = $anObject->getListOfAllDBObjectsWhere("id_object", "=", $aLocalRight['id_object']);
    						
    						
    						$aRight = $aRight->getListOfAllDBObjectsWhere("id_right", "=", $aLocalRight['id_right']);
    						
    						
    						
    						foreach($anObject as $localObj){
    							$newMenuList[$localObj['name']]['object'] = $localObj;
    							
    							foreach($aRight as $tempRight){
    								$newMenuList[$localObj['name']]['rights'][] =  $tempRight;
    								
    								if($counterObject == 0){
    									$_SESSION['current_page'] = $localObj['name'];
    									
    									$tempActions.= $tempRight['name'].",";
    									
    								}
    							}
    								
    							
    						}
    						$counterObject++;
    						
    					}
    				}
    			}
    		}
    	}
    }
    if (substr($tempActions, -1, 1) == ',')
    {
    	$string = substr($tempActions, 0, -1);
    }
    $_SESSION['current_actions'] = $tempActions;
    $_SESSION['rightList'] = $newMenuList;
    $_SESSION['current_user'] = $aUser;
   
    //print_r($_SESSION);
    echo "success";
}else{
    echo "fail";
}