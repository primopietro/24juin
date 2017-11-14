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
// Call this function every time schedule is changed
function renderSchedule(elementID, scheduleObject) {

	var theDiv = document.getElementById(elementID);

	var header = "<div class='scheduleHeader'>";
	header += getScheduleHeader(scheduleObject);
	header += getSubHeader();
	header += getScheduleContent(scheduleObject);
	header += "</div>";
	theDiv.innerHTML = header;
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
	var timeSlotForAPeriod = "<div class='scheduleCell' style='background-color:"+colors[colorIndex]+";'>";
	var temp =aPeriod['qualifications'];
	if(temp!= undefined){
		if(temp.length>0){
			var temp2 = temp[0];
			timeSlotForAPeriod +=temp2["code"];
		}
		
	}
	
	timeSlotForAPeriod += "</div>";
	
	return timeSlotForAPeriod;
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