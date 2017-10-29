<?php
require_once '/../translator.php';
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_year.php";

if (! isset ( $_SESSION )) {
	session_start ();
}

/*function fixObject (&$object)
{
    if (!is_object ($object) && gettype ($object) == 'object')
        return ($object = unserialize (serialize ($object)));
        return $object;
}*/

$user = new User();
$user = unserialize($_SESSION['current_user']);

$default = "<div class='wrapper'>


  <header class='main-header'>
    <!-- Logo -->
    <a href='index.php' class='logo'>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class='logo-mini'><b>24</b>J</span>
      <!-- logo for regular state and mobile devices -->
      <span class='logo-lg'  style='color:white;'><b>24</b>Juin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class='navbar navbar-static-top'>

<div class='navbar-custom-menu'>
        <ul class='nav navbar-nav'><li class='yearHeader'>".$_SESSION['year']."</li>
          <li>
            <a id='logout'>
            <i class='fa fa-sign-out'></i> Déconnexion
            </a>
 
            
            </li>
			</ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class='main-sidebar' style='background-color: #222d32;'>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class='sidebar'>
      <!-- Sidebar user panel -->
      <div class='user-panel'>
        <div class='pull-left image'>
          <img src='dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>
        </div>
        <div class='pull-left info'>
          <p style='    color: white;padding-top: 10px;font-size: 25px;'>".$user->getName()."</p>
       
        </div>
      </div>
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class='sidebar-menu' data-widget='tree'>";
if (isset ( $_SESSION ["rightList"] )) {
    
    
	$tempRights =  $_SESSION ["rightList"] ;
	foreach ($tempRights as $localItem ) {
	    
	    if($localItem ['object'] ['name'] != "teacher_qualification" && $localItem ['object'] ['isMenu'] != 0){
	        $default .= " <li class='treeview ";
	        if($localItem ['object'] ['name'] == $_SESSION['current_page'] ){
	            $default .=" active ";
	        }
	        $objectName=frenchTranslator ($localItem ['object'] ['name']);
	        
	        $default .="'>
          <a href='#'>
         ".   $localItem ['object'] ['icon']."<span>" . $objectName . "</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
      </a>
          <ul class='treeview-menu' >";
	        //TODO: add ACTIVE page based off session variable
	        foreach ( $localItem ['rights'] as $aLocalRight ) {
	            $right=frenchTranslator ($aLocalRight['name']);
	            
	            if($aLocalRight['name'] == "view"  ){
	                
	                $default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>" .$right . "</a>";
	                
	                if($localItem ['object'] ['name'] == "year"){
	                	$aYear = new Year();
	                	$aListOfYear = $aYear->getActiveYear();
	                	
	                	if($aListOfYear != null){
	                		foreach($aListOfYear as $theYear){
	                			$default .= "<a class='action' action='session' idobj='".$theYear['id_year']."' objtype='year'><i class='fa fa-circle-o'></i>" .$theYear['year']. "</a>";
	                		}
	                	}
	                	
	                }
	                
	                $default .= "</li> ";
	                
	                  
	             
	            }
	        }
	        
	        
	        
	        
	        $default .= getSubMenuItem($localItem,$tempRights);
	      
	        
	        $default .= "   </ul>
        </li>";
	    }
	    
		
	}
}

$default .= " 
        
    </section>
    <!-- /.sidebar -->
  </aside>";

echo $default;

function getSubMenuItem($localItem,$tempRights){
    $default ="";
    if($localItem ['object'] ['name'] == "classroom"){
    	
    	foreach ($tempRights as $localItem ) {
    		if($localItem ['object'] ['name'] == "classroom_zone"){
    			foreach ( $localItem ['rights'] as $aLocalRight ) {
    				$right=frenchTranslator ($aLocalRight['name']);
    				if($aLocalRight['name'] == "view"  ){
    					
    					$default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>Assigner des  zones</a></li> ";
    					
    					
    				}
    			}
    		}
    		
    	}
    }
    if($localItem ['object'] ['name'] == "teacher"){
        foreach ($tempRights as $localItem ) {
            
            if($localItem ['object'] ['name'] == "teacher_qualification"){
                foreach ( $localItem ['rights'] as $aLocalRight ) {
                    $right=frenchTranslator ($aLocalRight['name']);
                    if($aLocalRight['name'] == "view"  ){
                        
                        $default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>Assigner à une compétence</a></li> ";
                        
                        
                    }
                }
            }
            if($localItem ['object'] ['name'] == "group_teacher"){
                foreach ( $localItem ['rights'] as $aLocalRight ) {
                    $right=frenchTranslator ($aLocalRight['name']);
                    if($aLocalRight['name'] == "view"  ){
                        
                        $default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>Assigner à un groupe</a></li> ";
                        
                        
                    }
                }
            }
            
        }
    }
    if($localItem ['object'] ['name'] == "building"){
        foreach ($tempRights as $localItem ) {
            
            if($localItem ['object'] ['name'] == "building_classroom"){
                foreach ( $localItem ['rights'] as $aLocalRight ) {
                    $right=frenchTranslator ($aLocalRight['name']);
                    if($aLocalRight['name'] == "view"  ){
                        
                        $default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>Assigner à des locaux</a></li> ";
                        
                        
                    }
                }
            }
            
        }
    }
   
    if($localItem ['object'] ['name'] == "program"){
        foreach ($tempRights as $localItem ) {
            
            if($localItem ['object'] ['name'] == "program_qualification"){
                foreach ( $localItem ['rights'] as $aLocalRight ) {
                    $right=frenchTranslator ($aLocalRight['name']);
                    if($aLocalRight['name'] == "view"  ){
                        
                        $default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>Assigner des compétences</a></li> ";
                        
                        
                    }
                }
            }
            
        }
    }
    if($localItem ['object'] ['name'] == "pedago_day_all"){
        foreach ($tempRights as $localItem ) {
            
            if($localItem ['object'] ['name'] == "pedago_day"){
                foreach ( $localItem ['rights'] as $aLocalRight ) {
                    $right=frenchTranslator ($aLocalRight['name']);
                    if($aLocalRight['name'] == "view"  ){
                        
                        $default .= " <li navigation='" . $localItem ['object'] ['name'] . "'><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>Par programme</a></li> ";
                        
                        
                    }
                }
            }
            
        }
    }
    return $default;
}

