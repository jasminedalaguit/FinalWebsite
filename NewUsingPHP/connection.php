<?php

$conn = "";

try {
	$servername = "localhost";
	$dbname = "librarysystem";
	$username = "jasmine";
	$password = "JP@ssw0rd";

	$conn = new PDO(
		"mysql:host=$servername; dbname=librarysystem",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>