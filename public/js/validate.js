(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#deliveryForm").validate({
                rules: {
                    address1: "required",
                    city    : "required",
                    state   : "required",
                    zip     : "required"
                
                },
                messages: {
                    address1: "Please enter your primary address",
                    city    : "Please enter your city",
                    state   : "Please enter your state",
                    zip     : "Please enter your zip code"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });


            //form validation rules
            $("#guestForm").validate({
                rules: {
                    first_name: "required",
                    last_name : "required",
                    email     : "required"
                
                },
                messages: {
                    firstName: "Please enter your first name",
                    lastName : "Please enter your last name",
                    email    : "Please enter your email"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });


            //form validation rules
            $("#logginCheckoutForm").validate({
                rules: {
                    email: "required",
                    password : "required"
                
                },
                messages: {
                    email    : "Please enter your email or username",
                    password : "Please enter your password"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);