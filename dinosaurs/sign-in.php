<?php

require_once 'includes/db.php';
require_once 'includes/users.php';

$errors = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
var_dump($username, $password, $_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($username)) {
		$errors['username'] = true;
	}
		if (empty($password)) {
		$errors['password'] = true;
	}

	if(empty($errors)) {
		$user_id = user_get($db, $username, $password);
		echo $user_id;
		if ($user_id) {
			user_sign_in($user_id);
			header('Location: ' . $_SESSION['referrer']);
			exit;
			// redirect back to the page they came from
			//var_dump($_SESSION);	//First tried var-dump($_SERVER); which brought up a cool page with lots of info.
	} else {
			$errors['no_user'] = true;
		}
	}
}


?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sign In</title>
</head>

<body>

	<form method="post" action="sign-in.php">
		<div>
			<label for= "username">Username</label>
			<input id="username" name="username" required>
			</div>
			<div>
			<label for= "password">Password</label>
			<input id="password" name="password" required>
			</div>
			<button type="submit">Sign In</button>
			</form>
				
</body>
</html>