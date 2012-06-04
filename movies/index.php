<?php

require_once 'includes/db.php';

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
</head>

<body>

	<?php foreach ($results as $movie) : ?>
	
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