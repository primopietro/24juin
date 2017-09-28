//Variables
var ajaxPath = "http://localhost/24juin/";

$("form").submit(function(e){
    e.preventDefault();
});

$(function () {
  $('#example1').DataTable()
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
})

$(document).on("click",".treeview ",function(){
	$(".treeview ").removeClass("active");
	$(this).addClass("active");
});
	
$(document).on("click",".treeview-menu a",function(){
	//Variables
	var actionName = $(this).attr("action");
	var navigation = $(this).closest("ul").attr("navigation");
	console.log(actionName);
	console.log(navigation);
	var actions = "navigation="+navigation+"&actions="+actionName;
	$.ajax({
		url : ajaxPath + "vue/body/viewManager.php",
		data:actions,
		beforeSend : function() { enableLoader() ;
			console.log("getting new body started");
		}
	}).done(function(data) {
		console.log(" getting new body success");
		$("#mainContent").html(data);
		
	}).always(function() { disableLoader();
		console.log(" getting new body finished");
	});
	
	
});
//Get new body
function getBody(){
	$.ajax({
		url : ajaxPath + "components/body/body.php",
		beforeSend : function() { enableLoader() ;
			console.log("getting new body started");
		}
	}).done(function(data) {
		console.log(" getting new body success");
		$("#mainContent").html(data);
		
	}).always(function() { disableLoader();
		console.log(" getting new body finished");
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

