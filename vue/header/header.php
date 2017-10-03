<?php
require_once "settings.php";
require_once "links.php";
if (! isset($_SESSION)) {
    session_start();
}
// if session not set (user not logged in)
if (! isset($_SESSION["currentClient"]) || $_SESSION["currentUser"]->getAdministrateur()) {
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_object.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_right.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/24juin/MVC/model/24juin_role.php";
  
    $newMenuList = array();
  
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
                        $newMenuList[$localObj['name']]['rights'][] =  $aRight;
                     
                    }
                  
                
                }
            }
    
        
        }
    }
    
    
    
    
    
    
    $default = "<div class='wrapper'>

  <header class='main-header'>
    <!-- Logo -->
    <a href='index2.html' class='logo'>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class='logo-mini'><b>24</b>J</span>
      <!-- logo for regular state and mobile devices -->
      <span class='logo-lg'><b>24</b>Juin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class='navbar navbar-static-top'>
      <!-- Sidebar toggle button-->
      <a href='#' class='sidebar-toggle' data-toggle='push-menu' role='button'>
        <span class='sr-only'>Toggle navigation</span>
      </a>
<div class='navbar-custom-menu'>
        <ul class='nav navbar-nav'>
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
          <p>Alexander Pierce</p>
          <a > Directeur</a>
        </div>
      </div>
      <!-- search form -->
      <form action='#' method='get' class='sidebar-form'>
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class='sidebar-menu' data-widget='tree'>
        <li class='header'>Menu</li>";
    
    foreach($newMenuList as $localItem){
        $default .=" <li class='treeview'>
          <a href='#'>
            <i class='fa fa-calendar'></i> <span>".$localItem['object']['name']."</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu' navigation='".$localItem['object']['name']."'>";
      
            foreach($localItem['rights'] as $temp1){
                foreach($temp1 as $temp2){
                    $default.=" <li action='".$temp2['name']."'><a action='".$temp2['name']."' ><i class='fa fa-circle-o'></i>".$temp2['name']."</a></li> ";
                    
                }
            }
            
       
         $default.="   </ul>
        </li>";
    }
    
    $default .=" 
        
    </section>
    <!-- /.sidebar -->
  </aside>";
    
    echo $default;
} // if session is set (user logged in)
