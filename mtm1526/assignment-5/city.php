Do I need this file at all for the city?  All I want to do is post the value of $('city') to : city in the database?

<?php

require_once 'includes/db.php';

$username = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

$email = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

$sql = $db->prepare('
	SELECT id
	FROM users
	WHERE city = :city
');
$sql->bindValue(':city', $city, PDO::PARAM_STR);
$sql->execute();
$results = $sql->fetch();
