<!DOCTYPE html>
<html>
<head>
	<title> Final Website </title> 
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</head>
<body>
<section id="banner"/>
	<div class="login">
	<img src="images/j-lib-logos_white.png" class="logo"/>
	<ul>
		<li> <a href="signup.php"> <button> SIGN UP </button> </a> </li>
		<li> <a href="login.php"> <button> LOGIN </button> </a> </li>
	</ul>
</div>
	<div class="banner-text"/>
 		<h1> THE LIBRARY </h1>
		<p>Book Recommendations For Free </p>
		<div class="banner-btn"/> 
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
					<a href='academic/index.php?category_id=$row[id]'><span></span>$row[category_name]</a>
                    ";
                }
                ?>
		</div>
	</div>
</section>

<div id="sideNav"/>
	<nav>
	<ul>
		<li><a href="#banner">HOME</a></li>
		<li><a href="#inquiry">ASK US</a></li>
		<li><a href="#about">ABOUT</a></li>
		<li><a href="#developer">DEVELOPER</a></li>
		<li><a href="#contacts">CONTACTS</a></li>
	</ul>
	</nav>
</div>
<div id="menuBtn">
	<img src="images/menu.png" id="menu">
</div>

<!--Inquiries-->

<section id="inquiry">
<div class="title-text">
<p> INQUIRIES</p>
<h1>What Seems To Be The Problem?</h1>
</div> 
<div class="inquiries-box">
	<div class="inquiries">
		<h1> Downloadable Application</h1>
		<div class="inquiries-desc">
			<div class="inquiries-icon">
				<i class="fa fa-download"></i> 
			</div>
			<div class="inquiries-text">
				<p> As of the moment, there is no downloadable application 
			        for this website. The developer is still working on it.
			        We will let you know if it's available.</p>
			</div>
		</div>
		<h1> Sign Up Feature</h1>
		<div class="inquiries-desc">
			<div class="inquiries-icon">
				<i class="fa fa-sign-in"></i>  
			</div>
			<div class="inquiries-text">
				<p> As of the moment, there is no sign up feature on this website.
				    The developer is still working on it.
			            We will let you know if it's available. </p>
			</div>
		</div>
		<h1> Technical Error</h1>
		<div class="inquiries-desc">
			<div class="inquiries-icon">
				<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
			</div>
			<div class="inquiries-text">
				<p> Technical errors may occur from time to time. The developer is still working on it. We will let you know if it's finished.</p>
			</div>
		</div>
	</div>
	<div class="inquiries-img">
		<img src="images/apps.jpg"> 
		<div class="overlays"></div>
	</div>
</div>
</section>

<!--About-->

<section id="about">
	<div class="title">
  	<p> ABOUT</p>
	<h1>Know More About The Library</h1>
	</div> 
	<div class="about-box">
		<div class="single-about">
			<img src="images/pic1.jpg">
			<div class="overlay"></div>
			<div class="about-desc">
			     <h2>READING</h3>
			     <hr>
			     <p> You can read more books in this j-library in a pdf file for free, it comes with different genres: academic, romance, fantasy, suspense, and horror.
			</div>
		</div>
		<div class="single-about">
			<img src="images/pic2.jpg">
			<div class="overlay"></div>
			<div class="about-desc">
			     <h2>LEARNING</h3>
			     <hr>
			     <p> Through reading books in the j-lib, you can also learn life lessons and experiences. It will help you grow as an individual, this website offers so much more than you expect.
			</div>
		</div>
		<div class="single-about">
			<img src="images/pic3.jpg">
			<div class="overlay"></div>
			<div class="about-desc">
			     <h2>EXPLORING</h3>
			     <hr>
			     <p> By reading, you can explore in your imagination. It will help your mind in critical thinking and creative aspects of life. So what are you waiting for? Explore j-lib now!! 
			</div>
		</div>
		<div class="single-about">
			<img src="images/pic4.jpg">
			<div class="overlay"></div>
			<div class="about-desc">
			     <h2>SHARING</h3>
			     <hr>
			     <p> You can also share this website to your friends, family, and loved ones. By sharing this you are giving them new knowlege and excitement. So keep sharing and enjoy!!  
			</div>
		</div>
	</div>

</section>

<!--Developer-->

<section id="developer">
	<div class="header">
  	<p> DEVELOPER</p>
	<h1>Facts About The Developer</h1>
	</div> 
	<div class="developer-row">
	     <div class="developer-col">
 		  <p>Her name is Jasmine S. Dalaguit, she's taking up Bachelor of Science in Computer Engineering at Cebu Technological University Danao Campus.</p>
	     </div>
	     <div class="developer-col">
		  <p>A 21 year old woman, who dreams to be a life doctor but gets to find bugs instead. So she just thought that maybe, just maybe, in another life. </p>
	     </div>
	     <div class="developer-col">
		  <p> She is now in her 3rd year of college, however, felt so lost, still keeps going with the flow of how life would turn out to be.  </p>
	     </div>
	     <div class="developer-col">
		  <p>Can sing and dance but not too good. Can write a poem but loses inspiration. Can think out loud yet never heard. Char أ‿أ</p>
	     </div>
	     <div class="developer-col">
		  <p>Fascinated about serial killer documentaries, investigatory movies and books, and all suspense thrill genre. </p>
	     </div>
	     <div class="developer-col">
		  <p>Loves raisins. Hates macaroni. Loves black pepper on any dish. Hates gumbo. Loves nori, pasta, and chicken. </p>
	     </div>
	</div>
</section>

<!--Contacts-->

<section id="contacts">
	<div class="headers">
  	<p> CONTACTS</p>
	<h1>Message Us Today</h1>
	</div> 
		<div class="contacts-center">
			<h1> Get In Touch</h1>
			<p><i class="fa fa-map-marker"></i> Tulay, Guinsay, Danao City, Cebu</p>
			<p><i class="fa fa-phone"></i> 0935-991-3744</p>
		</div>
		<div class="social-links">
			<i class="fa fa-envelope"></i>
			<i class="fa fa-facebook"></i>
			<i class="fa fa-instagram"></i>
			<i class="fa fa-youtube-play"></i>
			<p> Copyright The Library: J-Lib</p>
		</div>
</section>

<script>
var menuBtn = document.getElementById("menuBtn")
var sideNav = document.getElementById("sideNav")
var menu = document.getElementById("menu")

sideNav.style.right = "-250px";

menuBtn.onclick = function(){
	if(sideNav.style.right == "-250px"){
		sideNav.style.right = "0";
		menu.src = "images/close.png";
	}
	else{
		sideNav.style.right = "-250px";
		menu.src = "images/menu.png";
	}
}

var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1000,
	speedAsDuration: true
});

</script>
</body>
</html>

