

<?php
require_once '../movies/includes/db.php';
$errors = array();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$dino_name = filter_input(INPUT_POST, 'movie_title', FILTER_SANITIZE_STRING);
$loves_meat = filter_input(INPUT_POST, 'release_date', FILTER_SANITIZE_NUMBER_INT);
$in_jurassic_park = (isset($_POST['director'])) ? 1 :0;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(strlen($movie_title)< 1 || strlen($movie_title)> 256) {
		$errors['movie_title']=true;
	}
	if(!in_array($release_date, array(0,1))) {
		$errors['release_date']=true;
	}
	if(empty($errors)) {
		//require_once '../dinosaurs/includes/db.php';	Taken out because we only need it once and we have addet it below.
		//do DB stuff
		$sql = $db->prepare('
			UPDATE movies
			SET movie_title = :movie_title
				, release_date = :release_date
				, director = :director
			WHERE id = :id
		');
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':movie_title', $movie_title, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_INT);
		$sql->bindValue(':director', $director, PDO::PARAM_INT);
		$sql->execute();
//var_dump($sql->errorInfo());
		header('location: index.php');
		exit;
	}
} else {
	//require_once '../dinosaurs/includes/db.php';
	$sql = $db->prepare('
	SELECT movie_title, release_date, director
	FROM movies
	WHERE id = :id
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$movie_title = $results['movie_title'];
	$release_date = $results['release-date'];
	$director = $results['director'];
	
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<h1>Edit Movies</h1> 
    <form method="post" action="../movies/edit.php?id=<?php echo $id; ?>">
    	<div>
        	<label for="movie_title">
            	Movie Name
            	<?php if (isset($errors['movie_title'])):?>
                <strong class="error">is required</strong>
            	<?php endif; ?>
            </label>
            <input id= "movie_title" name="movie_title" required value="<?php echo $movie_title;?>">
        </div>
        <fieldset>
        	<legend>Relationship with meat
            	<?php if (isset($errors['release_date'])):?>
            	 <strong class="error">is required</strong>
            	<?php endif; ?>
            </legend>
            <input type="radio" id="date" name="release_date" value="1"
            	<?php if($release_date == 1): ?>checked<?php endif;?> > 
            
            <label for="love">Release Date</label>
            <input type="radio" id="hate" name="release_date" value="0"
            	<?php if($release_date == 0): ?>checked<?php endif;?> > 
            
            <label for="hate">Hates Meat</label>
        </fieldset>
        
        <div>
        	<input type="checkbox" id="in_jurassic_park" name="in_jurassic_park"
            	<?php if($in_jurassic_park == 1): ?>checked<?php endif;?> > 
                
           <label for="in_jurassic_park">In_jurassic_park?</label>
        </div>
        <button type="submit">Save</button>
        
        </form>
    
</body>
</html>
