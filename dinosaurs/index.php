<?php

require_once 'includes/db.php';	//This opens up our connecton to the database? In actinscript we use a '.' in php we use pointer '->'

// we execute our sql...
$sql = $db->query('
SELECT id, dino_name, loves_meat, in_jurassic_park
FROM dinosaurs
ORDER BY dino_name ASC

');

//Display the last error created by out database
//var_dump[($db->errorInfo());

$results = $sql->fetchAll();

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Dinosaurs</title>
</head>

<body>
		<!--We loop through the list and bring out dino-->
	<?php foreach ($results as $dino) : ?>
	
	<h2>
	<a href="single.php?id=<?php echo $dino['id']; ?>">
	<?php echo $dino['dino_name']; ?>
	</a>
	</h2>
	<dl>
		<dt>Loves Meat</dt>
		<dd><?php echo $dino['loves_meat']; ?></dd>
		<dt>In Jurassic Park</dt>
		<dd><?php echo $dino['in_jurassic_park']; ?></dd>
	</dl>
	<?php endforeach; ?>


</body>
</html>