
<?php
if (! isset($_SESSION)) {
    session_start();
}
require_once "system/header.php";
if (isset($_GET['actions']) || isset($_SESSION['current_page'])) {
    require_once "vue/header/header.php";
    echo "<div class='content-wrapper' id='mainContent' style='min-height: 100vh;'>";
} else {
    echo "<div class='content-wrapper' id='mainContent' style='min-height: 100vh; margin: auto; width: 1000px;'>";
}

?>

<?php

// require_once "vue/body/viewManager.php";

// This is returned from database
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_schedule.php';
$aSchedule = new Schedule();
$aSchedule = $aSchedule->getObjectFromDB(9);
$dataForSchedule = $aSchedule['schedule'];

function transformDBScheduleToMemory($dataForSchedule)
{
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_year.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_teacher.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_qualification_teached.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_classroom.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_classroom_zone.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_zone.php';
    
    
    $newSchedule = array();
    $localSchedule = current($dataForSchedule);
    
    $WeekDays = array(
        "monday" => "1",
        "tuesday" => "2",
        "wednesday" => "3",
        "thursday" => "4",
        "friday" => "5",
        "saturday" => "6",
        "sunday" => "7"
    );
    
    $dayTimes = array(
        "am1" => "1",
        "am2" => "2",
        "pm1" => "3",
        "pm3" => "4"
    );
    
    $newSchedule['am'] = $localSchedule['am'];
    $newSchedule['pm'] = $localSchedule['pm'];
    
    // Set year
    $aYear = new Year();
    $aYear = $aYear->getObjectFromDB($localSchedule['id_year']);
    $newSchedule['year'] = $aYear;
    
    // Set group
    $aGroup = new Group();
    $aGroup = $aGroup->getObjectFromDB($localSchedule['id_group']);
    $newSchedule['group'] = $aGroup;
    
    // Set program
    $aProgram = new Program();
    $aProgram = $aProgram->getObjectFromDB($localSchedule['id_program']);
    $newSchedule['program'] = $aProgram;
    
    // For each week
    $aWeekList = array();
    if(isset($localSchedule['weeks'] ))
    foreach ($localSchedule['weeks'] as $aLocalWeek) {
        
        $aWeek = new Week();
        
        $aWeek = $aWeek->getObjectFromDB($aLocalWeek['id_week']);
        
        $timeslotsForWeekTemporary = array();
        foreach ($WeekDays as $keyDay => $valueDay){
            
            if(isset($aLocalWeek[$keyDay])){
               
                foreach ($dayTimes as $keyTime => $valueTime){
                  
                    if(isset($aLocalWeek[$keyDay][$keyTime])){
                        
                        $tempTimeslot =current($aLocalWeek[$keyDay][$keyTime]);
                        $tempTimeslot['day'] = $valueDay;
                        $tempTimeslot['AM'] = $valueTime;
                        
                        //Get teacher
                        $aTeacher = new Teacher();
                        $aTeacher = $aTeacher->getObjectFromDB($tempTimeslot['teacher'][0]['id_teacher']);
                        
                        $tempTimeslot['teacher'][0] = $aTeacher;
                        
                        //Get classroom
                        $aClassroom = new Classroom();
                        $aZone = new Zone();
                        $tempZones = $tempTimeslot['classroom'][0]['zone'];
                        $aClassroom = $aClassroom->getObjectFromDB($tempTimeslot['classroom'][0]['id_classroom']);
                        
                        //Get zone
                        $aZone = $aZone->getObjectFromDB($tempZones[0]['id_zone']);
                        $aClassroom['zone'][0] = $aZone;
                           
                            
                        //get qualification teached
                        $aQualificationTeached = new QualificationTeached();
                        $aQualificationTeached = $aQualificationTeached->getObjectFromDB($tempTimeslot['id_qualification_teached']);
                        $tempTimeslot['id_qualification_teached']=$aQualificationTeached;
                        
                        
                        $timeslotsForWeekTemporary[current($aLocalWeek[$keyDay][$keyTime])['id_timeslot']] = $tempTimeslot;
                    }
                }
                
            }
        }
       
        // For each week day
        foreach ($timeslotsForWeekTemporary as $tempTimeslot) {
            foreach ($WeekDays as $keyWeekday => $valueWeekDay) {
                // For each day time
                
                foreach ($dayTimes as $keyDayTimes => $valueDayTimes) {
                    
                    
                    if ($tempTimeslot['day'] == $valueWeekDay && $tempTimeslot['AM'] == $valueDayTimes) {
                        
                        $aWeek[$keyWeekday][$keyDayTimes] = $tempTimeslot;
                    }
                    
                }
            }
        }
        $aWeekList[$aLocalWeek['id_week']] = $aWeek;
    }
    
    $newSchedule['weeks'] = $aWeekList;
    return $newSchedule;
}

$dataForSchedule = json_decode($dataForSchedule, true);
$scheduleTransformed = transformDBScheduleToMemory($dataForSchedule);

echo "<script>  schedule=";
echo json_encode($scheduleTransformed, JSON_PRETTY_PRINT);
//echo $scheduleTransformed;
echo ";</script>";

?>
<div id="schedule"></div>

 

 
</div>
<?php
require_once "system/footer.php";
?>
 <script src="scripts/scheduler.js"></script>
 <script>
 renderSchedule("schedule",schedule);
 </script>