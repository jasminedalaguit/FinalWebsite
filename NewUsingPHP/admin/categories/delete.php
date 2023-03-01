<?php
if (isset($_GET["id"])){
   $id = $_GET["id"]; 

   $servername = "localhost";
   $username = "jasmine";
   $password = "JP@ssw0rd";
   $database = "librarysystem";
 
   // Create connection
   $con = new mysqli($servername,$username,$password,$database);

   $sql = "DELETE FROM categories WHERE id=$id";
   $con->query($sql);
}

header("location: /NewUsingPHP/admin/categories/categories.php");
exit;
?>