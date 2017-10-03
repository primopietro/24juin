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

$(document).on("click", ".treeview ", function() {
	$(".treeview ").removeClass("active");
	$(this).addClass("active");
});

$(document).on("click", ".treeview-menu a", function() {
	// Variables
	var actionName = $(this).attr("action");
	var navigation = $(this).closest("ul").attr("navigation");
	console.log(actionName);
	console.log(navigation);
	var actions = "navigation=" + navigation + "&actions=" + actionName;
	getNewView(actions);

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
		$("#mainContent").html(data);

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

// Action handler
$(document).on("click", ".action", function() {

	var actionName = $(this).attr("action");

	if (actionName == "login") {
		var dataToBeSent = "";
		var username = $("#usernameNew").val();
		var password = $("#passwordNew").val();
		dataToBeSent += "username=" + username + "&password=" + password;

		$.ajax({
			url : ajaxPath + "actions/login.php",
			data : dataToBeSent,
			type : 'POST',
			beforeSend : function() {
				enableLoader();
				console.log("Starting login started");
			}
		}).done(function(response) {
			if (response == "success") {
				console.log("Login success");
				location.reload();
			} else {
				console.log("Login failed");
			}

		}).always(function() {
			disableLoader();
			console.log("Login finished");

		});
	}

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
