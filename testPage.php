
<?php 
//FOr admin
$query= "INSERT INTO `right_object_role` (`id_right_object_role`, `id_right`, `id_object`, `id_role`) 
VALUES ";
//for each object
for($i=1;$i<=10;$i++){
	//for each right

	
		$query .="(NULL,'";
		$query .=3;
		$query .="','";
		$query .=$i;
		$query .="','";
		$query .="2'";
		$query .=")";
		
		
	if($i < 10){
		$query .=",";
	}
}
echo $query;
?>