<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


// ->prepare() allows us to have variables in our SQL
// We can create placeholders and later fill them with some content
// By using parepare we are protecting against SQL injuection attacks

$sql = $db->prepare('

	SELECT id, dino_name, loves_meat, in_jurassic_park
	FROM dinosaurs
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT); // bind value is taking our ... and puting it into our...?
$sql->execute();
//var_dump($db->errorInfo());
$results = $sql->fetch();

// To create an SQL variable we put a ':' before it. As in  = :id used above.  The various "id" things above could be anmed something different but T uses id over again to preserve sanity.
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>><?php echo $results['dino_name']; ?> &middot; Dinosaurs</title>
</head>

<body>

	<h1><?php echo $results['dino_name']; ?></h1>
	<dl>
		<dt>Loves Meat</dt>
		<dd><?php echo $results['loves_meat']; ?></dd>
		<dt>In Jurassic Park</dt>
		<dd><?php echo $results['in_jurassic_park']; ?></dd>
	</dl>
	
	<a href="delete.php?id=<?php echo $id; ?>">Delete</a>

</body>
</html>