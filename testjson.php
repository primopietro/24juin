
<?php 
    session_start();
    $_SESSION["year"] = "2017-2018";
    require_once "system/header.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
    
	$aBuilding = new Building();
	$aTeacher = new Teacher();
	$aClassroom = new Classroom();
	$aQualificationTeached = new QualificationTeached();
	
	echo "<form>
	<div class='col-xs-3'>
	   <h4>Bâtiments</h4>
	   <select id='buildingSelect'>";
	$aBuilding->getObjectAsSelect("name");
    echo "</select>
	</div>
	
	<div class='col-xs-3'>
	   <h4>Enseignant</h4>
	   <select id='teacherSelect' >";
    $aTeacher->getObjectAsSelect("first_name,family_name");
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
	
    <div class='col-xs-3'>
	   <h4>Compétence enseignée</h4>
	   <select id='qualificationTeachedSelect' disabled>";
	   $aQualificationTeached->getObjectAsSelect("code,name");
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

