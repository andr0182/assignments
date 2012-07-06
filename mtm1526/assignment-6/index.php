<?php
	$planet ='';	//$planet creates a variable called 'earth'  We are making earth the default if there is nothing in the query string.
					//However, if there is a querry string then GET what is in the query string.
	
	if (isset($_GET['planet'])) {	//This code gets what is in the query string if there is anything there and puts it into the GET array?
	$planet = strtolower($_GET['planet']);	//Went to php.net and searched for stringtolower code.  This line converts what is in the array to a new variable $planet.
	}	//Why do we not use 'endif'?
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Planets - Tabs with query stirngs and php</title>
	<link href="css/general.css" rel="stylesheet">
	
</head>

<body>

	<nav>
		<ul>
			<li id="earth"<?php if ($planet != 'mars' && $planet !='jupiter' && $planet != 'venus') { ?> class="current"<?php } ?>><a href="?planet=earth">Earth</a></li>
			<!--<li<?php// if ($planet != 'mars' && $planet !='jupiter' && $planet != 'venus') { echo ' class="current"'; } ?>><a href="?planet=earth">Earth</a></li> this is alternate way to write this-->
			<li id="mars"<?php if ($planet == 'mars') { ?> class="current"<?php } ?>><a href="?planet=mars">Mars</a></li>
			<li id="jupiter"<?php if ($planet == 'jupiter') { ?> class="current"<?php } ?>><a href="?planet=jupiter">Jupiter</a></li>
			<li id="venus"<?php if ($planet == 'venus') { ?> class="current"<?php } ?>><a href="?planet=venus">Venus</a></li>
		</ul>	<!--What is happening here with the php blocks?  Why is the '{' where it is and why do we need the second php block in each line?
				Answer-We can't put html inside of a php block so we close the php block and then open another one. The 'class="current"' code is html inside the php if statement.
				We can also use 'echo' to output the php as in the example code Thomas added under the first <li>.-->
	</nav>
	
	<article> <!--With the switch statement} we are checking the...-->
		<?php
			switch ($planet){
				case 'mars' :
					include 'includes/mars.php';
				break;
				case 'jupiter' :
					include 'includes/jupiter.php';
				break;
				case 'venus' :
					include 'includes/venus.php';
				break;
				//case 'earth' :		Dont' need this line of code "case 'earth" :'after we make earth the default.
				default :	//default has to be at the bottom.
					include 'includes/earth.php';
				break;
			}
		?>
	</article>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/comApp.js"></script>
</body>
</html>