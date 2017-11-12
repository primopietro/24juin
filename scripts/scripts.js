//testerino
$(document).on('click', '#testAdd', function() {
            var eventsholded = [];

            //ajout object global
            var global = new Object();
            global.id_year = '1';           //ajout id_year
            global.id_group = '1';          //ajout id_group
            global.id_program = '1';        //ajout id_program

            //ajout am
            global.am = {'am1': {'time_start': '08:15', 'time_end': '10:15'}, 'am2': {'time_start': '10:30', 'time_end': '11:30'}};
            
            //ajout pm
            global.pm = {'pm1': {'time_start': '12:30', 'time_end': '14:30'}, 'pm2': {'time_start': '14:45', 'time_end': '15:45'}};
    
            //ajout des semaines
            //global.weeks = new Object();
            var toFillWeeks = "[";
            var weeks = ['1', '2'];
            var teachers = ['1', '2'];
            var classrooms = ['1', '2'];
            var zones = ['1', '2'];
            var days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            
        	var id_timeslotToUse = 1;
            var comptWeek = 1;
            var comptTeacher = 1;
            var comptClassroom = 1;
            var comptZone = 1;
        	
        	//pour chaque jour de la semaine
        	if(weeks != null){
	        	$.each(weeks, function(indexWeek, valueWeek) {
	        		toFillWeeks += '{"id_week": "'+valueWeek+'",';
		            $.each(days, function(index, value) {
		            	toFillWeeks += ' "' + value + '": {"am1": {"timeslot": {"id_timeslot": "' + id_timeslotToUse + '", "id_qualification_teached": "1",';
		            	
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
		            	
		            	toFillWeeks += '"isExam": "false", "isPedagoDayProgram": "false", "isPegadoDayAll": "false", "isFixedHoliday": "false", "isStageIndividual": "false", "isStageAccompanied": "false", "isSpecialEvent": "false"}}, "am2": null, "pm1": null, "pm2": null}';
		               
		            	if(value != "Friday"){
		                	toFillWeeks += ', ';
		                }
		            	
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
        	
            
            global.weeks = $.parseJSON(toFillWeeks);
            
            eventsholded.push(global);

            //ajax pour créé le fichier JSON
            $.ajax
            ({
                type: 'POST',
                dataType : 'json',
                async: false,
                url: 'http://localhost/24juin/jsonwriteTest.php',
                data: { data: JSON.stringify(eventsholded) },
                success: function () {alert('Thanks!'); },
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


//Variables
var ajaxPath = "http://localhost/24juin/";

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
$(document).ready(function(){
	var password = $("#passwordNew");
	if(password != null){
		document.getElementById("passwordNew", "usernameNew").addEventListener("keyup",
				function(event) {
					event.preventDefault();
					if (event.keyCode == 13) {
						document.getElementById("loginButton").click();
					}
				});

	}
	
});





