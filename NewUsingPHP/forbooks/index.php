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
	?>

	<?php
		$sql = "SELECT * FROM categories where id = ".$_GET['category_id']." limit 1 ";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
	?>

	<title><?php echo $row['category_name']; ?></title>
	<link rel="stylesheet" href="styles.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section id="academic"/>
	<!--<img src="academic-logos.png" class="logo"/> -->
	<div class="academic-text"/>
		<?php
		$sql = "SELECT * FROM categories where id = ".$_GET['category_id']." limit 1 ";
		$result = $con->query($sql);
		$row = $result->fetch_assoc();

		?>
		<h1> <?php echo $row['category_name']; ?> </h1>
		
		<?php
		$sql = "SELECT * FROM books where category_id = ".$_GET['category_id'];
        $result = $con->query($sql);
		$count = mysqli_num_rows($result);
		if($count > 0 ){
			while($row = $result->fetch_assoc()){
		?>
			<div class="banner-btn"/> 
				<a target="_blank" href='<?php echo $row['pdf']; ?>'><span></span><?php echo $row['book_title']; ?></a>
			</div>
		<?php
			}
		}
		else{
		?>
			<div class="xyz"/> 
				<p>No books available</p>
			</div>
		<?php
		}
		?>
</section>
</body>
</html>