<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// When the is no id we immediately revert back to index.php
if (empty($id)) {
	header('Location: index.php');
	exit;
}

$sql = $db->prepare('
	DELETE FROM dinosaurs
	WHERE id = :id
');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: index.php');
exit;

