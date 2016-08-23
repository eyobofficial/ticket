$(function(){

	$("#deliveryForm").submit(function(){
		return false;
	});


	$("#topNav li:not(:last-child)").after("<span class='shade'>/</span>");

	$("#pageNav").stickMe();

	$("#pageNav").on("sticking", function(evt){
		$(this).addClass("sticky");
		$("a.navbar-brand, .shortcuts").css("visibility", "visible");
		$("a.navbar-brand, .shortcuts").fadeIn("normal");
		$(".navbar-default, .nav").addClass("clearfix");
		$(".nav").css("background", "transparent");
		$("#menu").css("background", "rgba(255, 255, 255, 0.8)");
	});

	$("#pageNav").on("top-reached", function(evt){
		$(this).addClass("sticky");
	});

	$(".homePage #pageNav").on("top-reached", function(evt){
		$("a.navbar-brand, .shortcuts").hide();
	});



	// Hovering recent event thumbail titles

	// Hide the event meta info
	$("section.recent div.eventMetaBody").css("display", "none");

	$("section.recent").hover(function(evt){
		$(this).find("div.eventMetaBody").slideToggle("fast");
	}, function(evt){
		$(this).find("div.eventMetaBody").slideToggle("slow");
	});
});


// Admin page events.php - Select all events at the same time




// Generate more input fields to create more ticket price packages
$("button").on("click", function(){
	var test = $("#ticketFieldset div.ticketRow:first").clone();
	
	$(test).appendTo("#ticketFieldset div.row").find("input").val("");

	// Provide unique 'name' attribute for package_title
	var i = 1, j =1, k = 1;
	var packageCount = $("#ticketFieldset :input[name*=package_title]").length;

	while(i <= packageCount){
		$("#ticketFieldset :input[name*=package_title]").each(function(){
			$(this).attr("name", "package_title" + i);

			$("#ticketFieldset :input[name=package_count]").val(i);
			i++;
		});

		$("#ticketFieldset :input[name*=package_price]").each(function(){
			$(this).attr("name", "package_price" + j);
			j++;
		});

		$("#ticketFieldset :input[name*=available_tickets]").each(function(){
			$(this).attr("name", "available_tickets" + k);
			k++;
		});
	}
});


/*$("document").ready(function(){
	// Sell_event.php toggle between seating types
	$("input :radio[name=seating]").on("click", function(evt)){
		if($(this).val() == "0"){
			$("#customSeatingInput").("disabled", true);
			$("#seat").prop("disabled", false);
		}

		if($(this).val() == "1"){
			$("#customSeatingInput").attr("disabled", "disabled");
			$("#seat").prop("disabled", true);
		}
		alert("fuck");
	}

});*/

$(function(){
	// Add external link icon to a[href="_blank"] tags
	$("a[target=_blank]").append('<span class="small fa fa-external-link"></span>');


});



$("#deliveryForm").on("submit", function(){
	return false;
});


$(function(){
	$("#deliveryForm").on("submit", function(evt){
		var error = false;

		return false;

		/*if($("#deliveryForm #address1").val() == ""){
			error = true;
		}

		if($("#deliveryForm #city").val() == ""){
			error = true;
		}

		if($("#deliveryForm #state").val() == ""){
			error = true;
		}

		if($("#deliveryForm #zip").val() == ""){
			error = true;
		}

		if(error == true){
			return false;
		}*/
	});
});