<?php 
if(!isset($_SESSION)){session_start();}



require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";

//Get variables
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);


$aUser = new User();
$aUser->setName($username);
$aUser->setPassword($password);

if($aUser->checkPassword()) {      
    
    
    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user_role.php";
    require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_right_object_role.php";
    
    $userRole = new UserRole();
    $userRoles = $userRole->getListOfAllDBObjectsWhere("id_user","=",$aUser->getId_user());
    
    foreach ($userRoles as $localUserRole){
        
        $localRightObjectRole = new RightObjectRole();
        $localRightObjectRoleList = $localRightObjectRole->getListOfAllDBObjectsWhere("id_role","=",$localUserRole['id_role']);
        $_SESSION['rights'][] = $localRightObjectRoleList;
    }
    
    $_SESSION['current_user'] = $aUser;
    $_SESSION['current_page'] = "Professeur";
    $_SESSION['current_actions'] = "add,view";
    echo "success";
}else{
    echo "fail";
}