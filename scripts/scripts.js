//Variables
var ajaxPath = "http://localhost/24juin/";

$(document).on('click', '#addHoraire', function(){
	var eventsholded = [];

    //ajout object global
    var global = new Object();
    
    var name = $("#aName").val();
    var year = $('#year').attr('id_year');
    var group = $('#groupSelect').val();
    var program = $('#programSelect').val();
    
    var am1Start = $('#am1Time_start').val();
    var am1End = $('#am1Time_end').val();
    var am2Start = $('#am2Time_start').val();
    var am2End = $('#am2Time_end').val();
    
    var pm1Start = $('#pm1Time_start').val();
    var pm1End = $('#pm1Time_end').val();
    var pm2Start = $('#pm2Time_start').val();
    var pm2End = $('#pm2Time_end').val();
    
    if(name != "" && year != "" && group != "" && program != "" 
    	&& am1Start != "" && am1End != "" && am2Start != "" 
    		&& am2End != "" && pm1Start != "" && pm1End != "" 
    			&& pm2Start != "" && pm2End != ""){
    	
	    global.id_year = year;           //ajout id_year
	    global.id_group = group;          //ajout id_group
	    global.id_program = program;        //ajout id_program
	    
	    //ajout am
	    global.am = {'am1': {'time_start': am1Start, 'time_end': am1End}, 'am2': {'time_start': am2Start, 'time_end': am2End}};
	    
	    //ajout pm
	    global.pm = {'pm1': {'time_start': pm1Start, 'time_end': pm1End}, 'pm2': {'time_start': pm2Start, 'time_end': pm2End}};
	
	    eventsholded.push(global);
	    
	    $.ajax
	    ({
	        type: 'POST',
	        dataType : 'json',
	        url: 'http://localhost/24juin/json/jsonwriteTest.php?name=' + name,
	        data: { data: JSON.stringify(eventsholded) },
	        success: function (response) {
	        },
	        failure: function() {alert('Error!');}
	    }).always(function(data){
	    	getFormTimeSlot(data);
		});
    } else {
    	alert("Tout les champs sont requis pour la création d'un horaire");
    }
});

$(document).on('click', '#addTimeslot', function() {
	
    //ajout object global
    var global = new Object();
    
    var id_schedule = $("#id_schedule").text();
    
    var dataToSend = "id_schedule=" + id_schedule;
    
    $.ajax
    ({
        type: 'POST',
        url: 'http://localhost/24juin/json/getSchedule.php',
        data: dataToSend,
        success: function (response) {

        	//JSONParsed = $.parseJSON(response);
        	JSONResponse = response.slice(0, -2);
        	//console.log(JSONParsed);
        
        	var toFillWeeks = ',"weeks":[';
        	
            var weeks =$( "#weekSelect" ).val();
            var teachers = $( "#teacherSelect" ).val();
            var classrooms =$( "#classroomSelect" ).val();
            var zones =$( "#zoneSelect" ).val();
        	var startDay =$( "#start_day" ).val();
            var endDay =$( "#end_day" ).val();
            var allDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                            	
            var qualificationT = $( "#qualificationTeachedSelect" ).val();
    	  
            var days=[];
            var boolDay = 0;
             	
            var	index = 0;
         	$.each(allDays, function( index, value ) {
         		if(value == startDay){
         			boolDay = 1;
         		}
         		 
         		if(boolDay == 1){
         			days.push(value);
         		}
         		 
         		if(value == endDay){
    					return false;
    				}
     		});
            	
         	
           if($('#am1Check').is(":checked")) {
            	 var am1="check";
        	} else {
        	   var am1=null;
         	}
        	if($('#am2Check').is(":checked")) {
        	    var am2="check";
        	  
        	} else {
        	   var am2=null;
        	          	}
        	if($('#pm1Check').is(":checked")) {
        		 var pm1="check";
        	    
        	} else {
        	   var pm1=null;	        	
        	          	}
        	if($('#pm2Check').is(":checked")) {
        	    var pm2="check";

        	} else {
        	   var pm2=null;		        	        
        	}
        	
        	var period=[];
        	period.push(am1);
        	period.push(am2);
        	period.push(pm1);
        	period.push(pm2);
       
        	var id_timeslotToUse = 1;
            var comptWeek = 1;
            var comptTeacher = 1;
            var comptClassroom = 1;
            var comptZone = 1;
        	
        	//pour chaque jour de la semaine
        	if(weeks != null){
            	$.each(weeks, function(indexWeek, valueWeek) {
            		toFillWeeks += '{"id_week": "'+valueWeek+'"';
            		console.log(valueWeek);
    	            $.each(days, function(index, value) {
    	            	$.each(period, function(indexPeriod, valuePeriod) {
    	            		if(valuePeriod=="check"){
           	            			 
    					           if(indexPeriod==0) {
    					        	   toFillWeeks += ', "' + value + '": {"am1": {"timeslot": {"id_timeslot": "' + id_timeslotToUse + '", "id_qualification_teached":  "' + qualificationT + '",';
    					        	}
    					           if(indexPeriod==1){
    					        	   toFillWeeks += ', "' + value + '": {"am2": {"timeslot": {"id_timeslot": "' + id_timeslotToUse + '", "id_qualification_teached":  "' + qualificationT + '",';
    					        	}
    					           if(indexPeriod==2) {  	
    	            					toFillWeeks += ', "' + value + '": {"pm1": {"timeslot": {"id_timeslot": "' + id_timeslotToUse + '", "id_qualification_teached":  "' + qualificationT + '",';
    					        	}
    	            				if(indexPeriod==3) {		        	   
    	            					toFillWeeks += ', "' + value + '": {"pm2": {"timeslot": {"id_timeslot": "' + id_timeslotToUse + '", "id_qualification_teached":  "' + qualificationT + '",';
    					        	}
    			            	
    			            	
    			            	if(teachers != null){
    			            		toFillWeeks += '"teacher": [';
    			            		comptTeacher = 1;
    				            	$.each(teachers, function(index, value) {
    				            		toFillWeeks += '{"id_teacher": "'+value+'"}';
    				            		
    				            		if(comptTeacher != teachers.length){
    					        			toFillWeeks += ', ';
    					        		}
    				            		
    				            		comptTeacher++;
    				            	});
    				            	toFillWeeks += '],';
    			            	}
    			            	
    			            	if(classrooms != null){
    			            		toFillWeeks += '"classroom": [';
    			            		comptClassroom = 1;
    				            	$.each(classrooms, function(index, value) {
    				            		toFillWeeks += '{"id_classroom": "'+value+'", ';
    				            		
    				            		
    				            		if(zones != null){
    					            		toFillWeeks += '"zone": [';
    					            		comptZone = 1;
    						            	$.each(zones, function(indexZone, valueZone) {
    						            		toFillWeeks += '{"id_zone": "'+valueZone+'"}';
    						            		
    						            		if(comptZone != zones.length){
    							        			toFillWeeks += ', ';
    							        		}
    						            		console.log(comptZone + ' ' + zones.length);
    						            		comptZone++;
    						            	});
    						            	toFillWeeks += ']';
    					            	}
    				            		
    				            		
    				            		toFillWeeks += '}';
    				            		
    				            		if(comptClassroom != classrooms.length){
    					        			toFillWeeks += ', ';
    					        		}
    				            		
    				            		comptClassroom++;
    				            	});
    				            	toFillWeeks += '],';
    			            	}
    			            	
    			            	toFillWeeks += '"isExam": "false", "isPedagoDayProgram": "false", "isPegadoDayAll": "false", "isFixedHoliday": "false", "isStageIndividual": "false", "isStageAccompanied": "false", "isSpecialEvent": "false"}}';
    	            		}
    		            });
    			           if(am1==null) {
    			        	   toFillWeeks += ', "am1": ' + am1 ;
    			        	}
    			        	if(am2==null){
    			        	   toFillWeeks += ', "am2": ' + am2 ;
    			        	}
    			        	if(pm1==null) {  	
    			        	   toFillWeeks += ', "pm1": ' + pm1 ;
    			        	}
    			        	if(pm2==null) {		        	   
    			        	   toFillWeeks += ', "pm2": ' + pm2 ;
    			        	}
    				        	 
    			        	toFillWeeks += '}';
    			            
    	            	
    	            	id_timeslotToUse++;
    	            });
    	            
            		toFillWeeks += '}';
            		
            		if(comptWeek != weeks.length){
            			toFillWeeks += ', ';
            		}
            		
            		comptWeek++;
            	});
        	}
        	
        	toFillWeeks += ']';
        	
        	JSONResponse +=  toFillWeeks;
        	JSONResponse += "}]";
        	JSONParsed = $.parseJSON(JSONResponse);
        	console.log(JSONParsed);
            
            //ajax pour créé le fichier JSON
            $.ajax
            ({
                type: 'POST',
                dataType : 'json',
                async: false,
                url: 'http://localhost/24juin/json/jsonUpdate.php?id_schedule=' + id_schedule,
                data: { data: JSON.stringify(JSONParsed) },
                success: function () {alert('Thanks!'); },
                failure: function() {alert('Error!');}
            });
        },
        failure: function() {alert('Error!');}
        
    });
    
});

$(document).on('change', '#buildingSelect', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#classroomSelect').removeAttr('disabled');
		$('#classroomSelect').load("vue/body/panel/classroom/select.php?id_building=" + self.val());
	} else{
		$('#classroomSelect').attr('disabled', 'disabled');
	}
	
});

$(document).on('change', '#classroomSelect', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#zoneSelect').removeAttr('disabled');
		$('#zoneSelect').load("vue/body/panel/zone/select.php?id_classroom=" + self.val());
	} else{
		$('#zoneSelect').attr('disabled', 'disabled');
	}
	
});

$(document).on('change', '#zoneSelect', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#weekSelect').removeAttr('disabled');
	} else{
		$('#weekSelect').attr('disabled', 'disabled');
	}
	
});

$(document).on('change', '#teacherSelect', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#qualificationTeachedSelect').removeAttr('disabled');
		$('#qualificationTeachedSelect').load("vue/body/panel/qualification_teached/select.php?id_teacher=" + self.val());

	} else{
		$('#qualificationTeachedSelect').attr('disabled', 'disabled');
	}
	
});

$(document).on('change', '#weekSelect', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#start_day').removeAttr('disabled');
	} else{
		$('#start_day').attr('disabled', 'disabled');
		$('#start_day').val("0").trigger("change");
	}
	
});

$(document).on('change', '#start_day', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#end_day').removeAttr('disabled');
		$('#end_day').load("vue/body/panel/days/select_end.php?day=" + self.val());

	} else{
		$('#end_day').attr('disabled', 'disabled');
		$('#end_day')
	    .find('option')
	    .remove()
	    .end()
	    .append('<option value="0">Faites un choix</option>');
	}
	
});

$(document).on('change', '#end_day', function() {
	self = $(this);
	
	if(self.val() != 0){
		$('#teacherSelect').removeAttr('disabled');
		
		$('#am1Check').removeAttr('disabled');
		$('#am2Check').removeAttr('disabled');
		$('#pm1Check').removeAttr('disabled');
		$('#pm2Check').removeAttr('disabled');

	} else{
		$('#teacherSelect').attr('disabled', 'disabled');

		$('#am1Check').prop('checked', false);
		$('#am2Check').prop('checked', false);
		$('#pm1Check').prop('checked', false);
		$('#pm2Check').prop('checked', false);
		
		$('#am1Check').attr('disabled', 'disabled');
		$('#am2Check').attr('disabled', 'disabled');
		$('#pm1Check').attr('disabled', 'disabled');
		$('#pm2Check').attr('disabled', 'disabled');
		
	}
	
});





$(document).on('click', '#consultSchedule', function(){
	getFormTimeSlot($(this).attr("idschedule"));
});

function getFormTimeSlot(id_schedule){
	var div = $(".box-header");
	div.html('');
	div.append("<label id='id_schedule' style='display:none'>"+id_schedule+"</label>");
	$.ajax
    ({
        type: 'POST',
        url: 'http://localhost/24juin/json/formTimeslot.php',
        data: "",
        success: function (response) {
        	div.append(response);
        }
    });
}

$("form").submit(function(e) {
	e.preventDefault();
});

$(function() {
	$('#example1').DataTable()
	$('#example2').DataTable({
		'paging' : true,
		'lengthChange' : false,
		'searching' : false,
		'ordering' : true,
		'info' : true,
		'autoWidth' : false
	})
})
$(document).on("click", "#closeModal", function() {
	$("#objModal").modal("hide");
	
	setTimeout(function() {
		$("#objModal").remove();
		$(".modal-backdrop.fade.in").remove();
	}, 700);

});

// filter teacher nature time
$(document).on("change", "#teacher_nature_time", function() {
	$.ajax({
		url : ajaxPath + "actions/session.php?",
		data : "fk_teacher=" + $(this).val(),
		type : "post",
		beforeSend : function() {
			enableLoader();
			console.log("getting new body started");
		}
	}).done(function(data) {
		getNewView();

	})
});

//filter program pedagoDay
$(document).on("change", "#program_pedago_day", function() {
	$.ajax({
		url : ajaxPath + "actions/session.php?",
		data : "fk_program=" + $(this).val(),
		type: "post",
		beforeSend : function() {
			enableLoader();
			console.log("getting new body started");
		}
	}).done(function(data) {
		getNewView();

	})
});

// check if qualification teached exist, if it does remove if not add
$(document).on("click", "#clickQualificationTeached ", function() {
	var objType = $(this).attr("objtype");
	var id_qualification = $(this).val();
	$.ajax({
		url : ajaxPath + "actions/exist.php?",
		data : "idobj=" + id_qualification + "&objtype=" + objType,
		type : "post",
		beforeSend : function() {
			enableLoader();
			console.log("getting new body started");
		}
	}).done(function(response) {
		if (response.includes("success") && !response.includes("fail")) {
			removeQualificationTeached(objType, id_qualification);
		} else {
			addQualificationTeached(objType, id_qualification);
		}

	})
});

function addQualificationTeached(objType, id_qualification) {
	dataToBeSent = "objType=" + objType + "&id_qualification="
			+ id_qualification;
	$.ajax({
		url : ajaxPath + "actions/add.php",
		data : dataToBeSent,
		type : 'POST',
		beforeSend : function() {
			enableLoader();
			console.log("Beginning of add object ");
		}
	}).done(function(response) {
		if (response.includes("success") && !response.includes("fail")) {
			toastr.success('Création d\élélment a reussi', 'Succès');
			console.log("Add object success");

		} else {
			toastr.error('Création d\'élélment n\'a pas reussi', 'Erreur!');
			console.log("Add object failed");
		}

	})
}

function removeQualificationTeached(objType, id_qualification) {

	var dataToBeSent = "&idobj=" + id_qualification + "&objtype=" + objType;
	$.ajax({
		url : ajaxPath + "actions/delete.php",
		data : dataToBeSent,
		type : 'POST',
		beforeSend : function() {
			enableLoader();
			console.log("Beginning of delete object ");
		}
	}).done(function(response) {
		if (response.includes("success") && !response.includes("fail")) {
			console.log("Delete object success");
			toastr.success('Suppresion d\'élélment a reussi', 'Succès');

		} else {
			toastr.error('Suppresion d\'élélment n\'a pas reussi', 'Erreur!');
			console.log("Delete object failed");
		}

	}).always(function() {
		disableLoader();
		getNewView();
		console.log("End of delete object ");
	});
}

$(document).on("click", ".treeview ", function() {
	$(".treeview ").removeClass("active");
	$(this).addClass("active");
});

$(document).on("click", ".treeview-menu a", function() {
	// Variables
	var actionName = $(this).attr("action");
	var navigation = $(this).closest("li").attr("navigation");
	console.log(actionName);
	console.log(navigation);
	var actions = "navigation=" + navigation + "&action=" + actionName;
	if (actionName == "view") {
		getNewView(actions);
	}
	
});

function getNewView(actions) {
	$.ajax({
		url : ajaxPath + "vue/body/viewManager.php",
		data : actions,
		beforeSend : function() {
			enableLoader();
			console.log("getting new body started");
		}
	}).done(function(data) {
		console.log(" getting new body success");
		// $("#mainContent").fadeOut(200, function() {
		// $(this).html(data).fadeIn(200);
		// });

		$("#mainContent").animate({
			opacity : '0.2'
		}, 200, function() {
			$(this).html(data).animate({
				opacity : '1'
			}, 200);
		});

	}).always(function() {
		disableLoader();
		console.log(" getting new body finished");
		
	});
}

$(document).on("click", "#logout", function() {
	$.ajax({
		url : ajaxPath + "actions/logout.php",
		beforeSend : function() {
			enableLoader();
			console.log("Logout started");
		}
	}).done(function(data) {

		console.log("Logout success");
		location.reload();

	}).always(function() {
		disableLoader();
		console.log("Logout finished");
	});
});

// Get new body
function getBody() {
	$.ajax({
		url : ajaxPath + "components/body/body.php",
		beforeSend : function() {
			enableLoader();
			console.log("getting new body started");
		}
	}).done(function(data) {
		console.log(" getting new body success");
		$("#mainContent").html(data);

	}).always(function() {
		disableLoader();
		console.log(" getting new body finished");
	});
}

$(document).on('DOMNodeInserted', function(e) {
	if ($(e.target).hasClass('modal-backdrop')) {
		$(".wrapper").addClass("modalBlur");
	}
});
$(document).on('DOMNodeRemoved', function(e) {
	if ($(e.target).hasClass('modal-backdrop')) {
		$(".wrapper").removeClass("modalBlur");
	}
});

// Action handler
$(document)
		.on(
				"click",
				".action",
				function() {

					var actionName = $(this).attr("action");

					if (actionName == "login") {
						var dataToBeSent = "";
						var username = $("#usernameNew").val();
						var password = $("#passwordNew").val();
						dataToBeSent += "username=" + username + "&password="
								+ password;

						$.ajax({
							url : ajaxPath + "actions/login.php",
							data : dataToBeSent,
							type : 'POST',
							beforeSend : function() {
								enableLoader();
								console.log("Starting login started");
							}
						}).done(
								function(response) {
									if (response.includes("success")
											&& !response.includes("fail")) {
										console.log("Login success");
										location.reload();
									} else {
										console.log("Login failed");
									}

								}).always(function() {
							disableLoader();
							console.log("Login finished");

						});
					} else if (actionName == "add") {
						var objType = $(this).attr("objtype");
						var dataToBeSent = "action=" + actionName + "&objType="
								+ objType;
						$("#objModal").remove();
						$
								.ajax(
										{
											url : ajaxPath
													+ "vue/modal/modal.php",
											data : dataToBeSent,
											type : 'POST',
											beforeSend : function() {
												enableLoader();
												console
														.log("Starting to get modal to add object ");
											}
										}).done(function(response) {
									$("body").append(response);
									
									console.log("Modal obtained successfully");

								}).always(function() {
									disableLoader();
									console.log("End of modal to add object ");
								});
					} else if (actionName == "update") {
						var objType = $(this).attr("objtype");
						var dataToBeSent = "action=" + actionName + "&objType="
								+ objType + "&idobj=" + $(this).attr("idobj");
						$("#objModal").remove();
						$
								.ajax(
										{
											url : ajaxPath
													+ "vue/modal/modal.php",
											data : dataToBeSent,
											type : 'POST',
											beforeSend : function() {
												enableLoader();
												console
														.log("Starting to get modal to update object ");
											}
										})
								.done(function(response) {
									$("body").append(response);
									console.log("Modal obtained successfully");

								})
								.always(
										function() {
											disableLoader();
											console
													.log("End of modal to update object ");
										});
					} else if (actionName == "addObj") {
						var form = $(this).closest(".modal-footer").prev();

						var noBlanks = true;
						form.find('input').each(function(index, el) {

							if (noBlanks == true) {
								if ($(el).val().length == 0)
									noBlanks = false;
							}

						});
						if (noBlanks) {
							console.log(noBlanks);
							var dataToBeSent = form.serialize();
							console.log(dataToBeSent);
							dataToBeSent += "&objType="
									+ $(this).attr("objtype");
							$
									.ajax(
											{
												url : ajaxPath
														+ "actions/add.php",
												data : dataToBeSent,
												type : 'POST',
												beforeSend : function() {
													enableLoader();
													console
															.log("Beginning of add object ");
												}
											})
									.done(
											function(response) {
												if (response
														.includes("success")
														&& !response
																.includes("fail")) {
													toastr
															.success(
																	'Création d\élélment a reussi',
																	'Succès');
													console
															.log("Add object success");

												} else {
													toastr
															.error(
																	'Création d\'élélment n\'a pas reussi',
																	'Erreur!');
													console
															.log("Add object failed");
												}

											}).always(function() {
										disableLoader();
										$(".modal").remove();
										$(".modal-backdrop").remove();
										getNewView();
										console.log("End of add object ");
									});
						} else {
							toastr.error('Champ(s) vide(s) dans le formulaire',
									'Erreur!');
						}

					} else if (actionName == "updateObj") {
						var form = $(this).closest(".modal-footer").prev();
						var noBlanks = true;
						form.find('input').each(function(index, el) {

							if (noBlanks == true) {
								if ($(el).val().length == 0)
									noBlanks = false;
							}

						});
						if (noBlanks) {
							var idobj = form.attr('idobj');
							var dataToBeSent = form.serialize();
							console.log(dataToBeSent);
							dataToBeSent += "&objType="
									+ $(this).attr("objtype") + "&idobj="
									+ idobj;
							$
									.ajax(
											{
												url : ajaxPath
														+ "actions/update.php",
												data : dataToBeSent,
												type : 'POST',
												beforeSend : function() {
													enableLoader();
													console
															.log("Beginning of update object ");
												}
											})
									.done(
											function(response) {
												if (response
														.includes("success")
														&& !response
																.includes("fail")) {
													toastr
															.success(
																	'Élément mis à jour avec succès',
																	'Succès');
													console
															.log("Update object success");

												} else {
													console
															.log("Update object failed");
													toastr
															.error(
																	'Echec de la mise à jour',
																	'Erreur!');
												}

											}).always(function() {
										disableLoader();
										$(".modal").remove();
										$(".modal-backdrop").remove();
										getNewView();
										console.log("End of update object ");
									});
						} else {
							toastr.error('Champ(s) vide(s) dans le formulaire',
									'Erreur!');
						}

					} else if (actionName == "delete") {
						var r = confirm("Confirmer suppresion");
						if (r == true) {
							var idobj = $(this).attr("idobj");
							var objType = $(this).attr("objtype");
							var dataToBeSent = "&idobj=" + idobj + "&objtype="
									+ objType;
							$
									.ajax(
											{
												url : ajaxPath
														+ "actions/delete.php",
												data : dataToBeSent,
												type : 'POST',
												beforeSend : function() {
													enableLoader();
													console
															.log("Beginning of delete object ");
												}
											})
									.done(
											function(response) {
												if (response
														.includes("success")
														&& !response
																.includes("fail")) {
													console
															.log("Delete object success");
													toastr
															.success(
																	'Suppresion d\'élélment a reussi',
																	'Succès');

												} else {
													toastr
															.error(
																	'Suppresion d\'élélment n\'a pas reussi',
																	'Erreur!');
													console
															.log("Delete object failed");
												}

											}).always(function() {
										disableLoader();
										getNewView();
										console.log("End of delete object ");
									});
						}

					} else if (actionName == "session") {
						var idobj = $(this).attr("idobj");
						var objType = $(this).attr("objtype");
						var dataToBeSent = "&idobj=" + idobj + "&objtype="
								+ objType + "&value=" + $(this).text();
						$
								.ajax(
										{
											url : ajaxPath
													+ "actions/session.php",
											data : dataToBeSent,
											type : 'POST',
											beforeSend : function() {
												// enableLoader();
												console
														.log("Beginning of session change ");
											}
										})
								.done(
										function(response) {
											if (response.includes("success")
													&& !response
															.includes("fail")) {
												console
														.log("Session change success");
												toastr
														.success(
																"Changement d'année réussi",
																'Succès');

											} else {
												toastr
														.error(
																"Changement d'année n'a pas réussi",
																'Erreur!');
												console
														.log("Session change failed");
											}

										})
								.always(
										function() {

											getNewView();

											$
													.ajax(
															{
																url : ajaxPath
																		+ "vue/header/header.php",
																beforeSend : function() {
																	console
																			.log("getting new header started");
																}
															})
													.done(
															function(data) {
																$(
																		".main-header")
																		.html(
																				data);
																console
																		.log(" getting new header success");

															})
													.always(
															function() {
																console
																		.log(" getting new header finished");
															});
										});

					}
					 $.material.init();
				});
function getHeader() {
	$.ajax({
		url : ajaxPath + "vue/header/header.php",
		beforeSend : function() {
			enableLoader();
			console.log("getting new header started");
		}
	}).done(function(data) {
		$(data).insertBefore($("#mainContent"));
		console.log(" getting new header success");

	}).always(function() {
		disableLoader();
		console.log(" getting new header finished");
	});
}

// Enable loader
function enableLoader() {
	$("#loader-3").css("display", "table");
}

// Disable loader
function disableLoader() {
	$("#loader-3").css("display", "none");
}

// press enter to login
document.getElementById("passwordNew", "usernameNew").addEventListener("keyup",
		function(event) {
			event.preventDefault();
			if (event.keyCode == 13) {
				document.getElementById("loginButton").click();
			}
		});


