<?php

require_once 'includes/db.php';	//Required at the top of each of our php files to access the database file in the includes folder.  The database file opens the connection to the MySQL dtabase.

//SQL code is written in the form of a query statement and then executed against a database.
//All SQL queries perform some type of data operation such as selecting data, inserting/updating data, or creating data objects such as SQL databases and SQL tables.
//Each query statement begins with a clause such as SELECT,UPDATE, CREATE or DELETE.
$sql = $db->query('
	SELECT id, movie_title, release_date, director
	FROM movies
	ORDER BY movie_title ASC
');

$results = $sql->fetchAll();

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Movies</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<h1>My Favourite Movies & Crazy Colours Too!</h1>

<body>
	<?php foreach ($results as $movie) : ?>	<!--//foreach is a php construct that iterates over an array.  Returns each item from movies database.-->
	
	<h2>
	<a href="single.php?id=<?php echo $movie['id']; ?>">
	<?php echo $movie['movie_title']; ?>
	</a>
	</h2>
	<dl>
		<dt>Release Date: </dt>
		<dd><?php echo $movie['release_date']; ?></dd>
		<dt>Directed By: </dt>
		<dd><?php echo $movie['director']; ?></dd>
	</dl>
	<?php endforeach; ?>
</body>
</html>