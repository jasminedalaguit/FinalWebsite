<?php
if (isset($_GET["id"])){
   $id = $_GET["id"]; 

   $servername = "localhost";
   $username = "jasmine";
   $password = "JP@ssw0rd";
   $database = "librarysystem";
 
   // Create connection
   $con = new mysqli($servername,$username,$password,$database);

   $sql = "DELETE FROM books WHERE id=$id";
   $con->query($sql);
}

header("location: /NewUsingPHP/admin/books/books.php");
exit;
?>