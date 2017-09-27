<?php

$user = "root";
$password = "";
$server = "localhost";
$dbName = "gestioncours";

$conn = new mysqli($server,$user, $password, $dbName);
$conn->set_charset("utf8");
