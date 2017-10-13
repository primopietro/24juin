<?php
require_once '/../translator.php';
require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/MVC/model/24juin_user.php";
if (! isset ( $_SESSION )) {
	session_start ();
}

function fixObject (&$object)
{
    if (!is_object ($object) && gettype ($object) == 'object')
        return ($object = unserialize (serialize ($object)));
        return $object;
}
fixObject($_SESSION['current_user']);

$default = "<div class='wrapper'>


  <header class='main-header'>
    <!-- Logo -->
    <a href='index.php' class='logo'>
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
          <p>".$_SESSION['current_user']->getName()."</p>
       
        </div>
      </div>
      <!-- search form -->
      <form action='#' method='get' class='sidebar-form'>
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class='sidebar-menu' data-widget='tree'>
        <li class='header'>Menu</li>";
if (isset ( $_SESSION ["rightList"] )) {
	$tempRights =  $_SESSION ["rightList"] ;
	foreach ($tempRights as $localItem ) {
		$default .= " <li class='treeview ";
		if($localItem ['object'] ['name'] == $_SESSION['current_page'] ){
			$default .=" active ";
		}
		$objectName=frenchTranslator ($localItem ['object'] ['name']);
		
		$default .="'>
          <a href='#'>
            <i class='fa fa-edit'></i> <span>" . $objectName . "</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu' navigation='" . $localItem ['object'] ['name'] . "'>";
		//TODO: add ACTIVE page based off session variable
		foreach ( $localItem ['rights'] as $aLocalRight ) {
		    $right=frenchTranslator ($aLocalRight['name']);
			if($aLocalRight['name'] == "view"  ){
			
			    $default .= " <li ><a class='action' action='" . $aLocalRight['name'] . "' ><i class='fa fa-circle-o'></i>" .$right . "</a></li> ";
				
			}
		}
		
		$default .= "   </ul>
        </li>";
	}
}

$default .= " 
        
    </section>
    <!-- /.sidebar -->
  </aside>";

echo $default;

