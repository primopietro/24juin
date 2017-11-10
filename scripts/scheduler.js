console.log("scheduler loaded");



//Call this function every time schedule is changed
function renderSchedule(elementID, scheduleObject){
	
	var theDiv = document.getElementById(elementID);
	
	var header = "<div class='scheduleHeader'>";
	header+=	getScheduleHeader(scheduleObject);
	header+= getSubHeader();
	
	header +="</div>";
	theDiv.innerHTML =header;	
}

function getScheduleHeader(scheduleObject){
	var header = "";
	
	
	header +="<div class='headerContainer'>";
		
		header +="<div style='width:50%;float:left;'> AM";
			header +="<div > ";
			header +=scheduleObject.am.am1.time_start + " - " + scheduleObject.am.am1.time_end; 
			header +=" / ";
			header +=scheduleObject.am.am2.time_start + " - " + scheduleObject.am.am2.time_end; 	
			header +="</div>";
		header +="</div>";
		header +="<div style='width:50%;float:left;'> PM";
			header +="<div > ";
			header +=scheduleObject.pm.pm1.time_start + " - " + scheduleObject.pm.pm1.time_end; 
			header +=" / ";
			header +=scheduleObject.pm.pm2.time_start + " - " + scheduleObject.pm.pm2.time_end; 	
			header +="</div>";
		header +="</div>";
	
	header +="</div>";
	return header;	
}

function getSubHeader(){
	var subheader="";
	var days = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi"];
	var times = ["am","pm"]; 
	
	
	subheader+="<div class='scheduleHeader'>";
	subheader+="<div class='scheduleDayBefore'>&nbsp;";
	subheader+="</div>";
	subheader+="<div class='scheduleDayBefore'>&nbsp;";
	subheader+="</div>";
	 for(var i=0; i < days.length; i++) {
	       
	    	subheader+="<div class='scheduleDay'>";
			subheader+=days[i];
			subheader+="</div>";
	}
	subheader+="<div class='scheduleDayBefore'>&nbsp;";
	subheader+="</div>";
	subheader+="<div class='scheduleDayBefore'>&nbsp;";
	subheader+="</div>";
	for(var j=0;j<5;++j){
		 for(var i=0; i < times.length; i++) {
		      
				subheader+="<div class='scheduleCell'>";
				subheader+=times[i];
				subheader+="</div>";
				subheader+="<div class='scheduleCell'>";
				subheader+=times[i];
				subheader+="</div>";
		}
	}
	
	
	subheader+="</div>";
	
	return subheader;
}