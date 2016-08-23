$(function(){
	// Confirm mass deletion o all_events.php page
	$("#allEvents").on("submit", function(){
		if($("#allEvents select[name=bulk_action] option[value=4]").get(0).selected){
			if(!confirm("Are you sure you want to delete these events?")){
				return false;
			}
		}
	});

	// Add ticket package row
	$("button.addRow").on("click", function(evt){
		var row = $("#addTicketTable tbody tr:last").clone(true);
		$(this).remove();
		$(row).insertAfter("#addTicketTable tbody tr:last").find("input").val("");
	});

	// Remove ticket package row
	$("button.removeRow").on("click", function(evt){
		$("#addTicketTable tbody tr").has($(this)).find("input").val("");		
	});


	$(".target").dropper({
		action: "upload.php"
	});

	// Append 'link-opens-on-external-tab' icon from the font-awesome icons
	$("a[target=_blank]").append(' <span class="small fa fa-external-link"></span>');

});

