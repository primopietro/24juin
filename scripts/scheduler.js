console.log("scheduler loaded");
Colors = {};
Colors.names = {
    aqua: "#00ffff",
    azure: "#f0ffff",
    beige: "#f5f5dc",
    black: "#000000",
    blue: "#0000ff",
    brown: "#a52a2a",
    cyan: "#00ffff",
    darkblue: "#00008b",
    darkcyan: "#008b8b",
    darkgrey: "#a9a9a9",
    darkgreen: "#006400",
    darkkhaki: "#bdb76b",
    darkmagenta: "#8b008b",
    darkolivegreen: "#556b2f",
    darkorange: "#ff8c00",
    darkorchid: "#9932cc",
    darkred: "#8b0000",
    darksalmon: "#e9967a",
    darkviolet: "#9400d3",
    fuchsia: "#ff00ff",
    gold: "#ffd700",
    green: "#008000",
    indigo: "#4b0082",
    khaki: "#f0e68c",
    lightblue: "#add8e6",
    lightcyan: "#e0ffff",
    lightgreen: "#90ee90",
    lightgrey: "#d3d3d3",
    lightpink: "#ffb6c1",
    lightyellow: "#ffffe0",
    lime: "#00ff00",
    magenta: "#ff00ff",
    maroon: "#800000",
    navy: "#000080",
    olive: "#808000",
    orange: "#ffa500",
    pink: "#ffc0cb",
    purple: "#800080",
    violet: "#800080",
    red: "#ff0000",
    silver: "#c0c0c0",
    white: "#ffffff",
    yellow: "#ffff00"
};

var teachers =[];
var qualifications =[];
// Call this function every time schedule is changed
function renderSchedule(elementID, scheduleObject) {

	var theDiv = document.getElementById(elementID);

	var header = "<div class='scheduleHeader'>";
	header += getScheduleHeader(scheduleObject);
	header += getSubHeader();
	header += getScheduleContent(scheduleObject);
	header += getTeachers(scheduleObject);
	header += getStaticCells(scheduleObject);
	header += "</div>";
	
	theDiv.innerHTML = header;
}

function getStaticCells(scheduleObject){
	var html ="";
	
  
    html+=getMiniCell("Evaluation module","EM");
    html+=getMiniCell("Reprise d'examen ou enseignat","REOE");
    html+=getMiniCell("Recuperation pas d'enseignant","RPE");
    html+=getMiniCell("Journee pedagogique fixe","JPF");
    html+=getMiniCell("Journee pedagogique unitaire","JPU");
    html+=getMiniCell("Journee pedagogique departementaire","JPD");
    html+=getMiniCell("Conge fixe","CF");
    html+=getMiniCell("Conge unitaire","CU");
    html+=getMiniCell("Portes ouvertes","PO");
    html+=getMiniCell("Visites guidees","VG");
    html+=getMiniCell("Stages initiation","SI");
    html+=getMiniCell("Stages accompagnement","SA");
    html+=getMiniCell("Conge departemental","CD");
    html+=getMiniCell("Strategies d'etude","SE");
    html+=getMiniCell("Journee pedagogique groupe","JPG");
    html+=getMiniCell("Travail personnel","TP");
    html+=getMiniCell("Explo de la FP","EFP");
    html+=getMiniCell("1/2 journee comites","DEMIJOURNE");
    html+=getMiniCell("Perseverance scolaire","PE");
   
    
	return html;
}

function getMiniCell(aName,aClass){
	var html ="";
	 html +="<div class='miniCell "+aClass+"' style='display:table;border:1px solid black;'>";
    
    html+=aName;
    html +="</div>";
	return html;
}

function getTeachers(scheduleObject){
	var html ="";
	for(var index in teachers)
	{
	    html +="<div class='miniCell' style='display:table;border:1px solid black;background-color:"+teachers[index].color+";'>";
	    html +=teachers[index].first_name +", "+teachers[index].family_name ;
	    html +="</div>";
	}
	return html;
}

function getScheduleContent(scheduleObject) {
	
	
	var content = "<div class='scheduleContent'>";
	console.log(scheduleObject.weeks);
	var counter =1;
	// For each week
	for ( var key in scheduleObject.weeks) {
		content += "<div class='scheduleDayBefore' style='border:1px solid black'>"+scheduleObject.weeks[key].name;
		content += "</div>";
		content += "<div class='scheduleDayBefore' style='border:1px solid black'>"+counter ;
		content += "</div>";
		content += getScheduleHtmlForDay(scheduleObject.weeks[key], "monday");
		content += getScheduleHtmlForDay(scheduleObject.weeks[key], "tuesday");
		content += getScheduleHtmlForDay(scheduleObject.weeks[key], "wednesday");
		content += getScheduleHtmlForDay(scheduleObject.weeks[key], "thursday");
		content += getScheduleHtmlForDay(scheduleObject.weeks[key], "friday");
		counter++;
	}

	content += "</div>";
	return content;
}

function getScheduleHtmlForDay(aScheduleDay, aDay) {
	$dayHtml = "";

	if (aScheduleDay[aDay] != undefined) {
		$dayHtml += getTimeSlotsForADay(aScheduleDay[aDay]);
	} else {
		$dayHtml += "<div class='scheduleCell'>&nbsp;</div>";
		$dayHtml += "<div class='scheduleCell'>&nbsp;</div>";
		$dayHtml += "<div class='scheduleCell'>&nbsp;</div>";
		$dayHtml += "<div class='scheduleCell'>&nbsp;</div>";
	}

	return $dayHtml;
}

function getTimeSlotsForADay(aDay) {
	var aTimeslot = "";
	var tempPeriods = ["am1","am2","pm1","pm2"];
	
	for(var j=0;j<tempPeriods.length;++j){
		if (aDay[tempPeriods[j]] != undefined) {
			aTimeslot += getTimeSlotForAPeriod(aDay[tempPeriods[j]],j);
		} else {
			aTimeslot += "<div class='scheduleCell'>&nbsp;</div>";
		}
	}
	
	
	return aTimeslot;
}

function getTimeSlotForAPeriod(aPeriod,colorIndex) {

	var colors = Object.values(Colors.names);
	var localTeacher = 0;
	var localIndex = 0;
	if(aPeriod.teachers != null){
		teachers[aPeriod.teachers[0].id_teacher] = aPeriod.teachers[0];
		localTeacher = aPeriod.teachers[0].id_teacher;
		for(var index in teachers)
		{
		    if(teachers[index]==localTeacher)
		    	localIndex = index;
		}
		aPeriod.teachers[0].color = colors[localIndex];
		teachers[aPeriod.teachers[0].id_teacher] = aPeriod.teachers[0];
	}
	if(aPeriod.qualifications != null){
		qualifications[aPeriod.qualifications[0].id_qualification] = aPeriod.qualifications[0];
	}
	
	
	
	//teachers[aPeriod.teachers[0]]
	var timeSlotForAPeriod = "<div class='scheduleCell ";
	timeSlotForAPeriod +=comparerForTimeslot(aPeriod,"isExam","EM");
	timeSlotForAPeriod +=comparerForTimeslot(aPeriod,"isSpecialEvent","EM");
	timeSlotForAPeriod +=comparerForTimeslot(aPeriod,"isStageAccompanied","SA");
	timeSlotForAPeriod +=comparerForTimeslot(aPeriod,"isStageIndividual","SI");
	
	
	
	
	timeSlotForAPeriod+=" ' style='background-color:"+colors[localIndex]+";'>";
	var temp =aPeriod['qualifications'];
	if(temp!= undefined){
		if(temp.length>0){
			var temp2 = temp[0];
			timeSlotForAPeriod +=temp2["code"];
		}
		
	}
	
	timeSlotForAPeriod += "<br>";
	var tempClassroom =aPeriod['classrooms'];
	if(tempClassroom!= undefined){
		if(tempClassroom.length>0){
			var tempClassroom2 = tempClassroom[0];
			timeSlotForAPeriod +=tempClassroom2["code"];
		}
		
	}
	
	timeSlotForAPeriod += "</div>";
	
	return timeSlotForAPeriod;
}
function comparerForTimeslot(aPeriod,propertyName,className){
	if(aPeriod[propertyName] != 1){
		return " "+className+" ";
	}
	return "";
}


function getScheduleHeader(scheduleObject) {
	var header = "";

	header += "<div class='headerContainer'>";

	header += "<div style='width:50%;float:left;'> AM";
	header += "<div > ";
	header += scheduleObject.am.am1.time_start + " - "
			+ scheduleObject.am.am1.time_end;
	header += " / ";
	header += scheduleObject.am.am2.time_start + " - "
			+ scheduleObject.am.am2.time_end;
	header += "</div>";
	header += "</div>";
	header += "<div style='width:50%;float:left;'> PM";
	header += "<div > ";
	header += scheduleObject.pm.pm1.time_start + " - "
			+ scheduleObject.pm.pm1.time_end;
	header += " / ";
	header += scheduleObject.pm.pm2.time_start + " - "
			+ scheduleObject.pm.pm2.time_end;
	header += "</div>";

	header += "</div>";
	return header;
}

function getSubHeader() {
	var subheader = "";
	var days = [ "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi" ];
	var times = [ "am", "pm" ];

	subheader += "<div class='scheduleHeader'>";
	subheader += "<div class='scheduleDayBefore'>&nbsp;";
	subheader += "</div>";
	subheader += "<div class='scheduleDayBefore'>&nbsp;";
	subheader += "</div>";
	for (var i = 0; i < days.length; i++) {

		subheader += "<div class='scheduleDay'>";
		subheader += days[i];
		subheader += "</div>";
	}
	subheader += "<div class='scheduleDayBefore'>&nbsp;";
	subheader += "</div>";
	subheader += "<div class='scheduleDayBefore'>&nbsp;";
	subheader += "</div>";
	for (var j = 0; j < 5; ++j) {
		for (var i = 0; i < times.length; i++) {

			subheader += "<div class='scheduleCell'>";
			subheader += times[i];
			subheader += "</div>";
			subheader += "<div class='scheduleCell'>";
			subheader += times[i];
			subheader += "</div>";
		}
	}

	subheader += "</div>";

	return subheader;
}