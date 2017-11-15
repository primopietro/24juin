
<?php 
    session_start();
    require_once "system/header.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_zone.php';
    
	$aBuilding = new Building();
	$aTeacher = new Teacher();
	$aClassroom = new Classroom();
	$aQualificationTeached = new QualificationTeached();
	$aWeek = new Week();
	$aZone = new Zone();
	
	echo "<form style='float:left;'>
	<div class='col-xs-3'>
	   <h4>Bâtiments</h4>
	   <select id='buildingSelect'>";
	$aBuilding->getObjectAsSelect("name");
    echo "</select>
	</div>

    <div class='col-xs-3'>
	   <h4>Local</h4>
	   <select id='classroomSelect' multiple disabled></select>
	</div>

    <div class='col-xs-3'>
	   <h4>Zone</h4>
	   <select id='zoneSelect' multiple disabled></select>
	</div>
	
    <div class='col-xs-3'>
	   <h4>Semaine</h4>
	   <select id='weekSelect' multiple disabled>";
	   $aWeek->getObjectAsSelectWhereYear("name", $_SESSION["year"]);
	   echo "</select>
	</div>";
	
	
	
    $days = array();
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    
    echo "<div class='col-xs-3'>
	   <h4>Jour d�but</h4>
	   <select id='start_day' disabled><option value='0'>Faites un choix</option>";
       
    foreach($days as $day){
        echo "<option value='".$day."'>".$day."</option>";
    }
	   echo "</select>
	</div>

    <div class='col-xs-3'>
	   <h4>Jour fin</h4>
	   <select id='end_day' disabled><option value='0'>Faites un choix</option></select>
	</div>
    

    <div class='col-xs-12'>
        <h4>Plage</h4>
        <input type='checkbox' id='am1Check' disabled>AM1</input>
        <input type='checkbox' id='am2Check' disabled>AM2</input>
        <input type='checkbox' id='pm1Check' disabled>PM1</input>
        <input type='checkbox' id='pm2Check' disabled>PM2</input>
    </div>
   
    <div class='col-xs-3'>
	   <h4>Enseignant</h4>
	   <select id='teacherSelect' multiple disabled>";
    $aTeacher->getObjectAsSelect("first_name,family_name");
	   echo "</select>
	</div>
    <div class='col-xs-3'>
	   <h4>Compétence enseignée</h4>
	   <select id='qualificationTeachedSelect' disabled>";
	   $aQualificationTeached->getObjectAsSelect("code,name");
	   echo "</select>
	</div>
	</form>";
	    
	echo "<br><br><br><br><form style='float:left;'>
		<a class='addTest' id='testAdd'>add</a>
	</form>";
	
	
	
	    require_once "system/footer.php";
	    
	echo"
	    <script>
	        
	            
	    </script>
	        
	";
?>

