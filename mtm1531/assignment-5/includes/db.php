<?php

// Opens a connection to the MySQL database
// Shared between all the PHP files in our application

// Our username and password are kept in Environment Variables, in .htaccess
//This is for security, so they are never publicly visible on GitHub

$user = getenv('DB_USER'); //The MySQL username //'root';	//we do not want this information available in our git repository so we replace 'root' with getenv('DB_USER') check the .htaccess file!.
$pass = getenv('DB_PASS'); // The MySQL password 		getenv is get environmental variable.  In this case the Database user and password.
$data_source = getenv('DATA_SOURCE');	//'mysql:host=localhost;dbname=andr0182';



// PDO: PHP Data objects
// Allows us to connect to many different kinds of databases
$db = new PDO($data_source, $user, $pass);	//PDO is PHP Data Objects. "Defines an interface for accessing databases in PHP."

// Force the connection to communicate in UTF-8
//  and support many human languages
$db->exec('SET NAMES utf8');	//"exec" = Execute an external program.