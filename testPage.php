
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
$aSchedule = $aSchedule->getObjectFromDB(13);
$dataForSchedule = $aSchedule['schedule'];

echo "<pre>";
print_r(json_decode($dataForSchedule));
echo "</pre>";
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
        $aTimeslotWeek = new TimeslotWeek();
        
        $aWeek = $aWeek->getObjectFromDB($aLocalWeek['id_week']);
        
        $timeslotListForWeek = $aTimeslotWeek->getListOfAllDBObjectsWhere("id_week", " = ", $aLocalWeek['id_week']);
        $timeslotsForWeekTemporary = array();
        if($timeslotListForWeek != null){
            foreach ($timeslotListForWeek as $localTimeslot) {
                $aTimeslot = new Timeslot();
                $aTimesloTeacher = new TimeslotTeacher();
                $aTimeslotQualificationTeached = new TimeslotQualificationTeached();
                $aTeacher = new Teacher();
                $aQualificationTeached = new QualificationTeached();
                
                $aTimeslotClassroom = new TimeslotClassroom();
                $aClassroom = new Classroom();
                
                $aTimeslotTeacherList = $aTimesloTeacher->getListOfAllDBObjectsWhere("id_timeslot", " = ", $localTimeslot['id_timeslot']);
                $aTimeslotQualificationTeachedList =  $aTimeslotQualificationTeached->getListOfAllDBObjectsWhere("id_timeslot", " = ", $localTimeslot['id_timeslot']);
                $aTimeslotClassroomList =  $aTimeslotClassroom->getListOfAllDBObjectsWhere("id_timeslot", " = ", $localTimeslot['id_timeslot']);
                
                
                
                $aTimeslot = $aTimeslot->getObjectFromDB($localTimeslot['id_timeslot']);
                $timeslotsForWeekTemporary[$localTimeslot['id_timeslot']] = $aTimeslot;
                
                
                
                if($aTimeslotTeacherList!= null){
                    if(sizeof($aTimeslotTeacherList)>0){
                        foreach($aTimeslotTeacherList as $tempItem){                          
                            $aTempTeacher =$aTeacher->getObjectFromDB($tempItem['id_teacher']);
                            $timeslotsForWeekTemporary[$localTimeslot['id_timeslot']]['teachers'][] = $aTempTeacher;
                        }
                    }
                }
                
                
                if($aTimeslotQualificationTeachedList!= null){
                    if(sizeof($aTimeslotQualificationTeachedList)>0){
                        foreach($aTimeslotQualificationTeachedList as $tempItem){
                           
                            $aTempQT =$aQualificationTeached->getObjectFromDB($tempItem['id_qualification_teached']);
                            $timeslotsForWeekTemporary[$localTimeslot['id_timeslot']]['qualifications'][] = $aTempQT;
                        }
                    }
                }
                
                if($aTimeslotClassroomList!= null){
                    if(sizeof($aTimeslotClassroomList)>0){
                        foreach($aTimeslotClassroomList as $tempItem){
                            $aClassroomZone = new ClassroomZone();
                            $aZone = new Zone();
                            $aClassroomZoneList =  $aClassroomZone->getListOfAllDBObjectsWhere("id_classroom", " = ", $tempItem['id_classroom']);
                            
                            $aTempClassroom =$aClassroom->getObjectFromDB($tempItem['id_classroom']);
                            
                            if($aClassroomZoneList!= null){
                                if(sizeof($aClassroomZoneList)>0){
                                    foreach($aClassroomZoneList as $tempItem2){
                                        $aZoneTemp = $aZone->getObjectFromDB($tempItem2['id_zone']);
                                        $aTempClassroom['zones'][] = $aZoneTemp;
                                    }
                                }
                            }
                            
                            
                           
                            $timeslotsForWeekTemporary[$localTimeslot['id_timeslot']]['classrooms'][] = $aTempClassroom;
                        }
                    }
                }
            }
        }
        
        
        // Correctly order timeslots based on day and time
        
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
        //TODO : timeslot_teacher et timeslot_local, timeslot_qualification teached
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