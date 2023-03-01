<?php
$dbhost = "localhost";
$dbuser = "jasmine";
$dbpass = "JP@ssw0rd";
$dbname = "librarysystem";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Failed to connect!" . mysqli_connect_error());
}
?>