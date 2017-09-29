<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once "settings.php";
require_once "links.php";
if(!isset($_SESSION)){session_start();}
// if session not set (user not logged in)
if (! isset($_SESSION["currentClient"]) || $_SESSION["currentUser"]->getAdministrateur()) {
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
            <a href='#'>
            <i class='fa fa-sign-out'></i> Déconnexion
            </a>
            </li>
			</ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class='main-sidebar'>
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
        <li class='header'>Menu</li>
        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-calendar'></i> <span>Horaire</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='pages/forms/general.html'><i class='fa fa-circle-o'></i> Horaire Groupe</a></li>
            <li><a href='pages/forms/advanced.html'><i class='fa fa-circle-o'></i> Horaire Professeur</a></li>
          </ul>
        </li>
        <li class='active treeview'>
        <a href='#'>
            <i class='fa fa-edit'></i> <span>Professeur</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu' navigation='prof' >
            <li class='active'><a href='#' action='add,view'><i class='fa fa-circle-o'></i>Ajout et consultation</a></li>
			 <li class='active'><a href='#' action='add'><i class='fa fa-circle-o'></i>Ajout</a></li>
			 <li class='active'><a href='#' action='view'><i class='fa fa-circle-o'></i>Consultation</a></li>
          </ul>
        </li>


        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-edit'></i>
            <span>Groupes</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu' navigation='groupe' >
             <li class='active'><a href='#' action='add,view'><i class='fa fa-circle-o'></i>Ajout et consultation</a></li>
          </ul>
        </li>
         <li class='treeview'>
          <a href='#'>
            <i class='fa fa-pie-chart'></i> <span>Compétences</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
           <ul class='treeview-menu'>
            <li><a href='pages/layout/top-nav.html'><i class='fa fa-circle-o'></i> Top Navigation</a></li>
            <li><a href='pages/layout/boxed.html'><i class='fa fa-circle-o'></i> Boxed</a></li>
            <li><a href='pages/layout/fixed.html'><i class='fa fa-circle-o'></i> Fixed</a></li>
            <li><a href='pages/layout/collapsed-sidebar.html'><i class='fa fa-circle-o'></i> Collapsed Sidebar</a></li>
          </ul>
        </li>


        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-th'></i>
            <span>Locaux</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='pages/charts/chartjs.html'><i class='fa fa-circle-o'></i> ChartJS</a></li>
            <li><a href='pages/charts/morris.html'><i class='fa fa-circle-o'></i> Morris</a></li>
            <li><a href='pages/charts/flot.html'><i class='fa fa-circle-o'></i> Flot</a></li>
            <li><a href='pages/charts/inline.html'><i class='fa fa-circle-o'></i> Inline charts</a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-th'></i>
            <span>Batiments</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='pages/UI/general.html'><i class='fa fa-circle-o'></i> General</a></li>
            <li><a href='pages/UI/icons.html'><i class='fa fa-circle-o'></i> Icons</a></li>
            <li><a href='pages/UI/buttons.html'><i class='fa fa-circle-o'></i> Buttons</a></li>
            <li><a href='pages/UI/sliders.html'><i class='fa fa-circle-o'></i> Sliders</a></li>
            <li><a href='pages/UI/timeline.html'><i class='fa fa-circle-o'></i> Timeline</a></li>
            <li><a href='pages/UI/modals.html'><i class='fa fa-circle-o'></i> Modals</a></li>
          </ul>
        </li>
        
        <li class='treeview'>
          <a href='#'>
            <i class='fa fa-folder'></i> <span>Rapports</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
          <ul class='treeview-menu'>
            <li><a href='pages/tables/simple.html'><i class='fa fa-circle-o'></i> Simple tables</a></li>
            <li><a href='pages/tables/data.html'><i class='fa fa-circle-o'></i> Data tables</a></li>
          </ul>
        </li>
         <li class='treeview'>
          <a href='#'>
            <i class='fa fa-table'></i> <span>Temps de nature</span>
            <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
          </a>
           <ul class='treeview-menu'>
            <li><a href='pages/tables/simple.html'><i class='fa fa-circle-o'></i> Simple tables</a></li>
            <li><a href='pages/tables/data.html'><i class='fa fa-circle-o'></i> Data tables</a></li>
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>";
    
    echo $default;
} // if session is set (user logged in)
