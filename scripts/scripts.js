//Variables
var ajaxPath = "http://localhost/24juin/";
/Prevent defaults
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

//Menu links
$(document).on("click",".treeview-menu",function(){
	if(!$(this).hasClass("active") && !$(this).hasClass('logout')){
		$(".treeview").removeClass("active");
		$(this).addClass("active");
		var link = $(this).attr("shopLink");
		$.ajax({
			url : ajaxPath + "vue/body/"+link+".php",
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

