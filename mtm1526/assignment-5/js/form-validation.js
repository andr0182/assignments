$(document).ready(function() {	//When the html doc has loaded execute this function.
	
	var userAvailable = $('.user-available');	//Create a variable that represents/holds what? All of the contents of the strong tag! More effecient than gettint the $(...; from the html over and over again(apart from the the class 'user-available')
	var passwordReq = 0;

	$('#username').on('change', function (ev) {		//When the username (via id) is changed, (Why change? and not entered?) create a variable called username that is equal to (contains) the (this)input value
		var username = $(this).val();
		
		userAvailable.attr('data-status', 'unchecked');
		
		if (username.length >=3 && username.length <= 25) {
			var ajax = $.post('check-username.php', {
				'username' : username
			});
			
			ajax.done(function (data) {
				if (data == 'available') {
					userAvailable
						.attr('data-status', 'available')
						.html('Available')
					;
				} else {
					userAvailable
						.attr('data-status', 'unavailable')
						.html('Unavailable')
						;
				}
			});
		} else {
				userAvailable
					.attr('data-status', 'unavailable')
					.html('Unavailable')
				;
		}
		
	});
	
		var emailAvailable = $('.email-available')
		
		$('#email').on('change', function (ev) {		//When the username (via id) is changed, (Why change? and not entered?) create a variable called username that is equal to (contains) the (this)input value
		var email = $(this).val();
		
		emailAvailable.attr('data-status', 'unchecked');
		
		if (email.length >=3 && username.length <= 256) {
			var ajax = $.post('check-email.php', {		//The variable Ajax contains a $.post sending this info to the check-email.php file.  ":" preceeds the content of 'email' which maps to email in the 'check-email.php' file.  ie email is the contents of 'email'.
				'email' : email
			});
			
			ajax.done(function (data) {
				if (data == 'available') {
					emailAvailable
						.attr('data-status', 'available')
						.html('Available')
					;
				} else {
					emailAvailable
						.attr('data-status', 'unavailable')
						.html('Unavailable')
						;
				}
			});
		} else {
				emailAvailable
					.attr('data-status', 'unavailable')
					.html('Unavailable')
				;
		}
		
	});
	
	$('#city').on('change', function() {
		var city = $(this).val();
		
		if (city.match(/[^'~!@#$%^&*()+={}[]|":;?<>]/)) {
			
		}
		
	});
	
		
		$('#password').on('keyup', function () {
				var password = $(this).val();
				
				passwordReq = 0;
				
				if (password.length > 5) {
					passwordReq++;
					$('.pass-length').attr('data-state', 'achieved');
				}
				
				if(password.match(/[a-z]/)) {
					passwordReq++;
					$('.pass-lower').attr('data-state', 'achieved');	<!-- /[a-z]/ is a Regular Expression-->
				}
				
				if(password.match(/[A-Z]/)) {
					passwordReq++;
					$('.pass-upper').attr('data-state', 'achieved');
				}
				
				if(password.match(/\d/)) {
					passwordReq++;
					$('.pass-num').attr('data-state', 'achieved');
				}
				
				if(password.match(/[^a-zA-Z0-9]/)) {
					passwordReq++;			<!-- /[^a-zA-Z0-9]/ not a lowercase letter or an uppercass letter or a number therefore must be a symbol. ^ is 'not'-->
					$('.pass-symbol').attr('data-state', 'achieved');
				}
		});
		
		$('form').on('submit', function (ev) {
			if (
			userAvailable.attr('data-status') == 'unchecked'	//Three attributes that could prevent the form from submitting.  Unchecked indicates that nothing has been submitted.
			||userAvailable.attr('data-status') =='unavailable'
			||passwordReq < 5	//If the password requirements ie. passwordReq++ has not reached 6
		) {
			ev.preventDefault();<!--Prevents the form from submitting-->
		}
	});
		$('#canada').on('change', function (ev) {
			//var
			
		});
			


});











