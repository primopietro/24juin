
<?php 
require_once "system/header.php";
require_once "vue/header/header.php";
?>


<div class="content-wrapper" id='mainContent' style="min-height: 100vh; ">
<?php 
//TODO: temporary
//Make something that calls viewManager.php with user settings
require_once "vue/body/header.php";
echo getHeader("prof","add,view");
require_once "vue/body/panel/prof/add.php";
require_once "vue/body/panel/prof/view.php";
?>
</div>

<?php 
require_once "system/footer.php";
?>

