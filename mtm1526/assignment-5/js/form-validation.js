$(document).ready(function() {
	
	var userAvailable = $('.user-available');
	var emailAvailable = $('.email-available')
	var passwordReq = 0;

	$('#username').on('change', function (ev) {
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
						.html('Available');
				} else {
					userAvailable
						.attr('data-status', 'unavailable')
						.html('Unavailable');
				}
			});
		} else {
				userAvailable
					.attr('data-status', 'unavailable')
					.html('Unavailable');
		}
		
	});
		
		$('#password').on('keyup', function (ev) {
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
					.html('Available');
			} else {
				emailAvailable
					.attr('data-status', 'unavailable')
					.html('Unavailable');
			}
		});
			} else {
			emailAvailable
				.attr('data-status', 'unavailable')
				.html('Unavailable');
			}
		
	});
	
	$('#city').on('change', function() {  //Thomas, why is ".on('keyup', function()" better.
		var city = $(this).val();
		
		//if (city.match(/[^'~!@#$%^&*()+={}[]|":;?<>0-9]/)) {		//Thomas I would like to know if this would work?
			//var ajax = $.post('city.php', {	//Post this to the database?
				//'city' : city			//This casts 'city' variable in js to ": city" variable in sql.  Thomas I want to load city to the database?
		
		if (city.match(/['~!@#$%^&*()+={}[]|":;?<>0-9]/)) {			//This could also be "if (city.match(/[a-zA-Z]/))?"
			$('.city-invalid').attr('data-status', 'not-a-city')	
			.html('Please enter a valid city name');
		}
	});
	
	$('#canada').on('click', function () {
		$('#countryhere').load('canada.html');		//Where do I load this to.  Can I load it to the current page. Also, how do I load this info with ajax? To database?
	});
	
	$('#usa').on('click', function () {
		$('').load('usa.html');
	});

	$('form').on('submit', function (ev) {
		if (userAvailable.attr('data-status') == 'unchecked'
			||userAvailable.attr('data-status') =='unavailable'
			||passwordReq < 5
			)
		{
		ev.preventDefault();
		}
		
	});

});











