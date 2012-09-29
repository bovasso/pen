// Clear input on focus
$.fn.clearInput = function() {
	return this.focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
};

$(document).ready(function() {

	$('#sign-up-tabs').tabs({
		select: function(event, ui){
			tabIndex = ui.index + 1;
			// console.log(tabIndex);
			$('.sign-up-tab-'+tabIndex).removeClass('tab-valid');
		}
	});

  // $('.nav-link').on('click', function(event) {
  //   event.preventDefault();
  // });
  
	$('.field-box select').customSelect({
		fixedWidth: true
	});

	// Form Element Javascript
	$('.radio-lines').find('input[type="radio"]').each(function() {
		var radio = $(this); 
		if (radio.attr('checked'))
			radio.parent().addClass('checked');
	});
	$('.radio-lines').find('li').live('click',function() {
		$(this).parent().find('li').removeClass('checked');
		$(this).addClass('checked');
		$(this).find('input[type="radio"]').attr('checked','checked');
	});
	$('.custom-checkbox').find('input[type="checkbox"]').each(function() {
		var checkbox = $(this); 
		if (checkbox.attr('checked'))
			checkbox.parent().addClass('checked');
	});
	$('.custom-checkbox').live('click', function() {
		if($(this).hasClass('checked')) {
			$(this).removeClass('checked');
			$(this).find('input[type="checkbox"]').removeAttr('checked');
		} else {
			$(this).addClass('checked');
			$(this).find('input[type="checkbox"]').attr('checked','checked');
		}
	});	
	$('.custom-radio').find('input[type="radio"]').each(function() {
		var radio = $(this);
		if (radio.attr('checked'))
			radio.parent().addClass('checked');
	});
	$('.custom-radio').find('li').live('click',function() {
		$(this).parent().find('li').removeClass('checked');
		$(this).addClass('checked');
		$(this).find('input[type="radio"]').attr('checked','checked');
	});

	// Signup Form Teacher
	$("#sign-up-teacher-tab-1").validate({
		rules: {
			sessionId: "required"
		},
		messages: {
			sessionId: "Please select a session date to continue"
		},
		errorElement: "span",
		errorPlacement: function(error, element) { 
			if ( element.is(":radio") ) 
				error.appendTo( element.parents('div').children('legend') ); 
			else if ( element.is(":checkbox") ) 
				error.appendTo ( element.next() ); 
			else 
				error.appendTo( element.parent() ); 
		},
		// specifying a submitHandler prevents the default submit, good for the demo 
		submitHandler: function() {
			$('.sign-up-tab-1').addClass('tab-valid');
			$('#sign-up-tabs').tabs('select',1);
		}, 
		// set this class to error-labels to indicate valid fields 
		success: function(label) {
			
		}
	});
	$("#sign-up-teacher-tab-2").validate({
		rules: {
			school: "required",
			state: "required",
			area: "required",
			name: "required",
			age_range_start: {
				required: true,
				minlength: 1,
				maxlength: 2
			},
			age_range_end: {
				required: true,
				minlength: 1,
				maxlength: 2
			},
			class_size: {
				required: true,
				minlength: 1,
				maxlength: 2
			}
		},
		messages: {
			school: "Please enter your school name",
			state: "Please choose your state",
			area: "Please characterize the area in which you teach",
			name: "Please enter your first class",
			age_range_start: "Please enter a low for your student&rsquo;s age range",
			age_range_end: "Please enter a high for your student&rsquo;s age range",
			class_size: "Please enter the amount of students in your class"
		},
		errorElement: "span",
		highlight: function(element, errorClass) {
			$(element).parents('.field-box').addClass(errorClass);
		},
		errorPlacement: function(error, element) { 
			error.appendTo( element.parents('.field-box') );
		},
		unhighlight: function(element, errorClass) {
			$(element).parents('.field-box').removeClass(errorClass);
		},
		// specifying a submitHandler prevents the default submit, good for the demo 
		submitHandler: function() {
			$('.sign-up-tab-2').addClass('tab-valid');
			$('#sign-up-tabs').tabs('select',2);
		}, 
		// set this class to error-labels to indicate valid fields 
		success: function(label) {
			
		}
	});
	$("#sign-up-teacher-tab-3").validate({
		rules: {
			suffix: "required",
			first_name: "required",
			last_name: "required",
			email: {
				required: true,
				email: true,
				remote: {
					url: "/register/verify_email",
					type: "get"
				}
			},
			confirm_email: {
				required: true,
				equalTo: "#email"
			},
			phone: {
				required: true,
				minlength: 10,
				maxlength: 10
			},
			username: {
				required: true,
				remote: {
					url: "/signup/verify/username",
					type: "post"
				}
			},
			password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				equalTo: "#password"
			}
		},
		messages: {
			suffix: "Please enter an appropriate suffix",
			first_name: "Please enter your first name",
			last_name: "Please enter your last name",
			email: {
				required: "Please enter your email address",
				email: "Please enter a valid email address",
				remote: "There is already an account associated with this email address"
			},
			confirm_email: {
				required: "Please re-enter your email address",
				equalTo: "Please enter the same email address as the email field"
			},
			phone: {
				required: "Please enter a phone number",
				minlength: "You must enter a 10 digit phone number",
				maxlength: "Please enter a 10 digit phone number"
			},
			username: {
				required: "Please enter a username",
				remote: "There is already an account with this username"
			//	minlength: jQuery.format("Your username must contain at least {0} characters")
			},
			password: { 
				required: "Please provide a password"
			//	minlength: jQuery.format("Your password must contain at least {0} characters")
			}, 
			confirm_password: { 
				required: "Please re-enter your password",
				equalTo: "Please enter the same password as the password field"
			}
		},
		// debug: true,
		errorElement: "span",
		highlight: function(element, errorClass) {
			$(element).parents('.field-box').addClass(errorClass);
		},
		errorPlacement: function(error, element) { 
			error.appendTo( element.parents('.field-box') );
		},
		unhighlight: function(element, errorClass) {
			$(element).parents('.field-box').removeClass(errorClass);
		},
		// specifying a submitHandler prevents the default submit, good for the demo 
		submitHandler: function() {
			$('.sign-up-tab-3').addClass('tab-valid');
			$('#sign-up-teacher-tab-1 :input, #sign-up-teacher-tab-2 :input').not(':submit').clone().hide().insertBefore('#suffix');
//			$('#sign-up-teacher-tab-3').submit();
			var form3 = $('#sign-up-teacher-tab-3');
			var formData = form3.serialize();
			$.ajax( {
				type: "POST",
				url: form3.attr('action'),
				data: formData,
				success: function(response) {
					console.log(form3.serialize());
				}
			});
			/*$.post(
				form3.attr("action"),
				formData,
				function(data) {
					alert("Response: " + data);
				}
			);*/
		}, 
		// set this class to error-labels to indicate valid fields 
		success: function(label) {
		}
	});

	// Add a class to your session
	var sessionClassNumber = $('#sign-up-teacher-tab-2 .session-class').size();
	console.log('There are '+sessionClassNumber+' session classes present');
	$('#sign-up-teacher-tab-2').on('click', '.add-session-class', function(){
		var cloneId = $('#session-class-'+sessionClassNumber);
		cloneId.clone().attr('id', 'session-class-'+(++sessionClassNumber)).insertAfter(cloneId);
		console.log('There are '+sessionClassNumber+' session classes present');
		return false;
	});
	// Remove class from session
	$('#sign-up-teacher-tab-2').on('click', '.remove-session-class', function(){
		var itemId = $(this).parent('.session-class').attr('id');
		var lastChar = itemId.substr(itemId.length - 1);
		$(this).parent('#session-class-'+lastChar).remove();
		console.log('clicked remove on '+lastChar);
		return false;
	});

	$("#sign-up-student-tab-1").validate({
		rules: {
			firstName: "required",
			lastName: "required",
			username: {
				required: true
			},
			password: {
				required: true,
				minlength: 6
			},
			passwordConfirm: {
				required: true,
				equalTo: "#password"
			},
			termsAndConditions: "required"
		},
		messages: {
			firstName: "Please enter your first name",
			lastName: "Please enter your last name",
			username: {
				required: "Please enter a username"
			//	minlength: jQuery.format("Your username must contain at least {0} characters")
			},
			password: { 
				required: "Please provide a password"
			//	minlength: jQuery.format("Your password must contain at least {0} characters")
			}, 
			passwordConfirm: { 
				required: "Please re-enter your password",
				equalTo: "Please enter the same password as the password field"
			},
		},
		debug: true,
		errorElement: "span",
		highlight: function(element, errorClass) {
			$(element).parents('.field-box').addClass(errorClass);
		},
		errorPlacement: function(error, element) { 
			error.appendTo( element.parents('.field-box') );
		},
		unhighlight: function(element, errorClass) {
			$(element).parents('.field-box').removeClass(errorClass);
		},
		// specifying a submitHandler prevents the default submit, good for the demo 
		submitHandler: function() {
			//alert("submitted!");
		}, 
		// set this class to error-labels to indicate valid fields 
		success: function(label) {
			//alert("success!");
		}
	});

}); // Document Ready End