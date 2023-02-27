<!DOCTYPE html>
<html>
<head>
	<?php 
                $servername = "localhost";
                $username = "jasmine";
                $password = "JP@ssw0rd";
                $database = "librarysystem";
                
                // Create connection
                $con = new mysqli($servername,$username,$password,$database); # or it can be mysqli_connect($servername, $username, $password, $database);

                // Check connection
                if ($con->connect_error){
                    die("Failed to connect: " . $con->connect_error);
                }

                //read all row from database table 
                $sql = "SELECT * FROM categories"; // categories = table name in the database librarysystem
                $result = $con->query($sql); # or it can be mysqli_query($con,$sql); 

                if (!$result){
                    die("Invalid query: " . $con->error);
                }

                //read data of each row 
                while($row = $result->fetch_assoc()){
                    echo"
		?>
	<title> $category_name </title>
	<link rel="stylesheet" href="styles.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section id="$category_name"/>
	<img src="academic-logos.png" class="logo"/>
	<div class="academic-text"/>
		// <h1> Engineering Books </h1>
		<div class="banner-btn"/> 
		<?php
		$book_title = "";
		$pdf = "";
		$sql = "SELECT * FROM books (book_title, pdf) VALUES ('$book_title', '$pdf')";
                $result = $con->query($sql);
			<a href="differential_equation.html"/><span></span> DIFFERENTIAL EQUATIONS AND INTEGRAL EQUATIONS </a>
			<a href="volume1.html"/><span></span> ENGINEERING MATHEMATICS VOLUME 1 by GILLESANIA </a>
			<a href="volume2.html"/><span></span> ENGINEERING MATHEMATICS VOLUME 2 by GILLESANIA </a>
			<a href="advanced.html"/><span></span> ADVANCED ENGINEERING MATHEMATICS (Sixth Edition) </a>
			<a href='academic/index.php?category_id=$row[id]'><span></span>$row[book_title]</a>
		?>
		</div>
</section>
</body>
</html>
