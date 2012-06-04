<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = $db->prepare('

	SELECT id, movie_title, release_date, director
	FROM movies
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
//var_dump($db->errorInfo());
$results = $sql->fetch();

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>><?php echo $results['movie_title']; ?> &middot; Movies</title>
</head>

<body>

	<h1><?php echo $results['movie_title']; ?></h1>
	<dl>
		<dt>Release Date: </dt>
		<dd><?php echo $results['release_date']; ?></dd>
		<dt>Director: </dt>
		<dd><?php echo $results['director']; ?></dd>
	</dl>
	
	<a href="delete.php?id=<?php echo $id; ?>">Delete</a>

</body>
</html>