
<?php 
if(!isset($_SESSION)){session_start();}
require_once "system/header.php";
if(isset($_GET['actions']) ||isset( $_SESSION['current_page'])){
	require_once "vue/header/header.php";
	echo "<div class='content-wrapper' id='mainContent' style='min-height: 100vh;'>";
} else{
	echo "<div class='content-wrapper' id='mainContent' style='min-height: 100vh; margin: auto; width: 1000px;'>";
}

?>

<?php 

//require_once "vue/body/viewManager.php";

$dataForSchedule ='[{
	"year": "2017-2018",
	"group": "1",
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
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
					"teacher": [{
							"id_teacher": "1"
						},
						{
							"id_teacher": "2"
						}
					],
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
					"qualification_teached": [

						{
							"id_qualification_teached": "1"
						},
						{
							"id_qualification_teached": "2"
						}

					],
					"id_week": 1,
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
$dataForSchedule = json_decode($dataForSchedule, true);
print_r ($dataForSchedule);



?>

</div>
<?php 
require_once "system/footer.php";
?>

