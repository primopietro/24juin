<?php 
    require_once "system/header.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
    
	$aBuilding = new Building();
	$aTeacher = new Teacher();
	$aClassroom = new Classroom();
	
	echo "<form>
	<div class='col-xs-3'>
	   <h4>Bâtiments</h4>
	   <select id='buildingSelect'>";
	$aBuilding->getObjectAsSelect("name");
    echo "</select>
	</div>
	
	<div class='col-xs-3'>
	   <h4>Enseignant</h4>
	   <select id='teacherSelect' disabled>";
    $aTeacher->getObjectAsSelect("code");
	   echo "</select>
	</div>
	
	<br>
	<br>
	<br>
	<div class='col-xs-3'>
	   <h4>Local</h4>
	   <select id='classroomSelect' disabled>";
	   $aClassroom->getObjectAsSelect("code");
	   echo "</select>
	</div>
	
	</form>";
	    
	echo "<br><br><br><br><form>
		<a class='addTest' id='testAdd'>add</a>
	</form>";
	
	
	
	    require_once "system/footer.php";
	    
	echo"
	    <script>
	        
	            
	    </script>
	        
	";
?>

