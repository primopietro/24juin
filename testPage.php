
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
$dataForSchedule = '[{
	"id_year": 1,
	"group": "18",
	"program": "1",
	"am": {
		"am1": {
			"time_start": "08:15",
			"time_end": "10:15"

		},
		"am2": {
			"time_start": "10:30",
			"time_end": "11:30"
		}
	},
	"pm": {
		"pm1": {
			"time_start": "12:30",
			"time_end": "14:30"

		},
		"pm2": {
			"time_start": "14:45",
			"time_end": "15:45"
		}
	},
	"weeks": [{
		"id_week": "1",
		"monday": {
			"am1": {
				"timeslot": {
					"id_timeslot": "1",
					"id_qualification_teached": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			},
			"am2": null,
			"pm1": null,
			"pm2": null
		},
		"tuesday": null,
		"wednesday": null,
		"thursday": null,
		"friday": null
	}, {
		"id_week": "2",
		"monday": {
			"am1": {
				"timeslot": {
					"id_timeslot": "1",
					"id_qualification_teached": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			},
			"am2": {
				"timeslot": {
					"id_timeslot": "1",
					"id_qualification_teached": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			},
			"pm1": null,
			"pm2": {
				"timeslot": {
					"id_timeslot": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"id_qualification_teached": "1",
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			}
		},
		"tuesday": null,
		"wednesday": null,
		"thursday": null,
		"friday": {
			"am1": {
				"timeslot": {
					"id_timeslot": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"id_qualification_teached": "1",
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			},
			"am2": {
				"timeslot": {
					"id_timeslot": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"id_qualification_teached": "1",
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			},
			"pm1": null,
			"pm2": {
				"timeslot": {
					"id_timeslot": "1",
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"id_qualification_teached": "1",
					"classroom": [{
						"id_classroom": "1",
						"zone": [{
								"id_zone": "1"
							},
							{
								"id_zone": "2"
							}
						]
					}],
					"isExam": "false",
					"isPedagoDayProgram": "false",
					"isPegadoDayAll": "false",
					"isFixedHoliday": "false",
					"isStageIndividual": "false",
					"isStageAccompanied": "false",
					"isSpecialEvent": "false"
				}
			}
		}
	}]
}]';

function transformDBScheduleToMemory($dataForSchedule)
{
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_year.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot.php';
    
    
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
    $aGroup = $aGroup->getObjectFromDB($localSchedule['group']);
    $newSchedule['group'] = $aGroup;
    
    // Set program
    $aProgram = new Program();
    $aProgram = $aProgram->getObjectFromDB($localSchedule['program']);
    $newSchedule['program'] = $aProgram;
    
    // For each week
    $aWeekList = array();
    foreach ($localSchedule['weeks'] as $aLocalWeek) {
        $aWeek = new Week();
        $aTimeslotWeek = new TimeslotWeek();
        
        $aWeek = $aWeek->getObjectFromDB($aLocalWeek['id_week']);
        
        $timeslotListForWeek = $aTimeslotWeek->getListOfAllDBObjectsWhere("id_week", " = ", $aLocalWeek['id_week']);
        $timeslotsForWeekTemporary = array();
        if($timeslotListForWeek != null){
            foreach ($timeslotListForWeek as $localTimeslot) {
                $aTimeslot = new Timeslot();
                $aTimeslot = $aTimeslot->getObjectFromDB($localTimeslot['id_timeslot']);
                $timeslotsForWeekTemporary[$localTimeslot['id_timeslot']] = $aTimeslot;
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