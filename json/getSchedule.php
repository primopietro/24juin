<?php 
if(!isset($_SESSION)){session_start();}
    
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_schedule.php';
   
    $aSchedule = new Schedule();
    $theSchedule = $aSchedule->getObjectFromDB($_POST['id_schedule']);
	
    echo $theSchedule['schedule'];
?>