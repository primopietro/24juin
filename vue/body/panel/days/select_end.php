<?php
if (! isset ( $_SESSION ))
	session_start ();
	
	$start_day = $_GET['day'];
	
	$days = array();
	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
	
	$bool = 0;
	$compt = 0;
	
	echo "<option value='0'>Faites un choix</option>";
	foreach($days as $day){
	    if($start_day == $day && $compt == 0){
	        $bool = 1;
	        $compt++;
	    }
	    if($bool == 1){
	       echo "<option value='".$day."'>".$day."</option>";
	    }
	}
	
?>