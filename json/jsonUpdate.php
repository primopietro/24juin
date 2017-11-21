<?php
if(!isset($_SESSION)){session_start();}

    
    include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    
    
    $stringData = $_POST["data"];
    $id_schedule = $_GET['id_schedule'];
    
    $query = "UPDATE `schedule` 
              SET schedule = " . $stringData . "WHERE id_schedule = " . $id_schedule;
    
    $result = $conn->query ($query);
    
    $conn->close();
?>