function reportError(msg) {
	// Show the error in the form:
	$('#payment-errors').append('<li>' + msg + '</li>').addClass('alert alert-error');
	// re-enable the submit button:
	$('#debitSubmit').prop('disabled', false);
	return false;
}


// Function handles the Stripe response:
function stripeResponseHandler(status, response) {

	// Check for an error:
	if (response.error) {

		reportError(response.error.message);

	} else { // No errors, submit the form:

	  var debitForm = $("#debitForm");

	  // Token contains id, last4, and card type:
	  var token = response['id'];

	  // Insert the token into the form so it gets submitted to the server
	  debitForm.append('<input type="hidden" name="stripeToken" value="' + token + '" />');

	  // Submit the form:
	  debitForm.get(0).submit();

	}

} // End of stripeResponseHandler() function.



$("document").ready(function(){
	// Empty errors, if any
	$('#payment-errors').empty();

	
	$("#debitForm").on("submit", function(){
	
		var error = false;

		$("#debitSubmit").attr("disabled", "disabled");

		var ccNum    = $("#cardNumber").val();
		var cvcNum   = $("#cvcNumber").val();
		var expMonth = $("#expMonth").val();
		var expYear  = $("#expYear").val();

		// Validation
		// 1. Validate card number
		if(!Stripe.card.validateCardNumber(ccNum)){
			error = true;
			reportError('The credit card number appears to be invalid.');
		}


		// 2. Validate cvc
		if(!Stripe.card.validateCVC(cvcNum)){
			error = true;
			reportError('The CVC number appears to be invalid.');
		}

		// 3. Validate the expiration:
		if (!Stripe.card.validateExpiry(expMonth, expYear)) {
			error = true;
			reportError('The expiration date appears to be invalid.');
		}

		// Check for errors:
		if (!error) {

			// Get the Stripe token:
			Stripe.card.createToken({
				number: ccNum,
				cvc: cvcNum,
				exp_month: expMonth,
				exp_year: expYear
			}, stripeResponseHandler);

		}

		return false;
	});
});


