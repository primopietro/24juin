<?php
    $myFile = $_GET['name'] . ".json";
    
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = $_POST["data"];
    fwrite($fh, $stringData);
    fclose($fh);
    
    include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
    
    $query = "INSERT INTO `schedule` (`id_schedule`, `code`, `year`, `schedule`) VALUES (NULL, '" . $myFile . "'," . $_SESSION['year'] . ", $stringData)";
    
    $result = $conn->query ( $sql );
    
    echo "success";
?>