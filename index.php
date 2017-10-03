
<?php 
if(!isset($_SESSION)){session_start();}
require_once "system/header.php";
if(isset($_GET['actions']) ||isset( $_SESSION['current_page'])){
    require_once "vue/header/header.php";
}

?>


<div class="content-wrapper" id='mainContent' style="min-height: 100vh; ">
<?php 
//TODO: temporary
//Default routing when get in the index
/*
if(!isset($_SESSION['current_page'] ) || $_SESSION['current_page']  == ""){
	$_SESSION['current_page'] = "Professeur";
	$_SESSION['current_actions'] = "add,view";
}
*/

require_once "vue/body/viewManager.php";
?>
</div>

<?php 
require_once "system/footer.php";
?>

