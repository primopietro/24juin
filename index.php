
<?php 
if(!isset($_SESSION)){session_start();}
require_once "system/header.php";
if(isset($_GET['actions']) ||isset( $_SESSION['current_page'])){
	require_once "vue/header/header.php";
	echo "<div class='content-wrapper' id='mainContent' style='min-height: 100vh;'>";
} else{
	echo "<div class='content-wrapper' id='mainContent' style='min-height: 100vh; margin: auto; width: 1000px;'>";
}

?>



<?php 

require_once "vue/body/viewManager.php";
?>
</div>

<?php 
require_once "system/footer.php";
?>

