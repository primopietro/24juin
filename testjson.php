
<?php 
    session_start();
    require_once "system/header.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_building.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_zone.php';
    
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
    
    
    
	$aGroup = new Group();
	$aProgram = new Program();
	
	echo "<form>

	<div class='col-xs-4'>
		<h4>Année</h4>
	    <input type='text' id='year' value='".$_SESSION['year']."' id_year='".$_SESSION['id_year']."'readonly></input>
	</div>

	<div class='col-xs-4'>
		<h4>Groupe</h4>
	    <select id='groupSelect' style='height: 26px;'>";
	$aGroup->getObjectAsSelect("code");
    echo "</select>
	</div>

	<div class='col-xs-4'>
		<h4>Programme</h4>
	    <select id='programSelect' style='height: 26px;'>";
    $aProgram->getObjectAsSelect("name");
    echo "</select>
	</div>

	<div class='col-xs-3'>
		<h4>AM1 Début</h4>
	    <input type='time' id='am1Time_start'></input>
	</div>

	<div class='col-xs-3'>
		<h4>AM1 Fin</h4>
	    <input type='time' id='am1Time_end'></input>
	</div>

	<div class='col-xs-3'>
		<h4>AM2 Début</h4>
	    <input type='time' id='am2Time_start'></input>
	</div>

	<div class='col-xs-3'>
		<h4>AM2 Fin</h4>
	    <input type='time' id='am2Time_end'></input>
	</div>



	<div class='col-xs-3'>
		<h4>PM1 Début</h4>
	    <input type='time' id='pm1Time_start'></input>
	</div>

	<div class='col-xs-3'>
		<h4>PM1 Fin</h4>
	    <input type='time' id='pm1Time_end'></input>
	</div>

	<div class='col-xs-3'>
		<h4>PM2 Début</h4>
	    <input type='time' id='pm2Time_start'></input>
	</div>

	<div class='col-xs-3'>
		<h4>PM2 Fin</h4>
	    <input type='time' id='pm2Time_end'></input>
	</div>
	<a class='addTest' id='testFirstForm'>add</a>
	</form>";
	
    
    
    
    $aBuilding = new Building();
    $aTeacher = new Teacher();
    $aClassroom = new Classroom();
    $aQualificationTeached = new QualificationTeached();
    $aWeek = new Week();
    $aZone = new Zone();
	
	echo "<form style='margin-top:150px; float:left;'>
	<div class='col-xs-3'>
		<h4> Nom de l'horaire</h4>
	    <input type='text' id='aName'></input>
	</div>
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

