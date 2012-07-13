<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); //Get the variable $id from the query string.  (not an array).

$sql = $db->prepare('

	SELECT id, movie_title, release_date, director
	FROM movies
	WHERE id = :id	
');
//Inside sql the variables have ':' in fromt of them.
$sql->bindValue(':id', $id, PDO::PARAM_INT);	//bindValue = "Binds the value of $id to :id in the SQL statement that was used to prepare the statement."  See other conditions as well. takes the $id variable and positions it into :id in the sql query
$sql->execute();
$results = $sql->fetch();

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>><?php echo $results['movie_title']; ?> &middot; Movies</title> <!--This appears in the page tab.-->
</head>

<body>
	<!--<a href="edit.php">Edit This Content</a>-->

	<h1><?php echo $results['movie_title']; ?></h1>
	<dl>
		<dt>Release Date: </dt>
		<dd><?php echo $results['release_date']; ?></dd>
		<dt>Director: </dt>
		<dd><?php echo $results['director']; ?></dd>
	</dl>
	
	<a href="delete.php?id=<?php echo $id; ?>">Delete This Entry</a>
</body>
</html>