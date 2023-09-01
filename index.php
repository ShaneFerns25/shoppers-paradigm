<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Shoppers Paradigm</title>
	<link rel="stylesheet" type="text/css" href="css1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="javascript.js"></script>

	<style>
		footer {
			font-weight: bold;
			padding-bottom: 10px;
			padding-top: 10px;
		}

		.fa {
			padding: 10px;
			font-size: 24px;
			width: 25px;
			text-align: center;
			text-decoration: none;
			margin: 10px 10px 20px 10px;
			border-radius: 5px;
		}

		.fa:hover {
			opacity: 0.7;
		}

		.fa-facebook {
			background: #125688;
			color: white;
		}

		.fa-twitter {
			background: #55ACEE;
			color: white;
		}

		.fa-instagram {
			background: #e6094b;
			color: white;
		}

		#button2{
			background-color: #24e092c0;
			color: white;
			outline: none;
			border: none;
			padding: 8px;
			border-radius: 5px;
			cursor: pointer;
		}

		#tab{margin-top: 25px;}
	</style>
</head>

<body style="margin: 0px;">
	<div id="main">

		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="index.php">Home</a>
			<a href="category.php">Products</a>
			<a href="shop.php">Shops</a>
			<a href="about_us.php">About Us</a>
			<a href="contact_us.php">Contact</a>
			<a href="admin_login.php">Shop Owner Login</a>
			<a href="super_login.php">Admin Login</a>
		</div>

		<div>
			<p id="tab" onclick="openNav()">&#9776;</p>
		</div>
		<h1 id="titl">
			<center style="margin-bottom: 65px;">Shoppers Paradigm</center>
		</h1>
		<h3 id="info">
			<center style="color: white;font-size: 30px;">Information and Location portal for a Mall</center>
		</h3>

		<center><button id="start" onclick="showhide()">Get Started</button></center>
	</div>

	<div tabindex="0" id="choice" style="display: none; padding-bottom: 30px;">
		<div id="se">
			<p style="font-size:2vw;">Want help knowing where you can find the products you want?</p>
			<p>Happy to Help</p>
			<button id="explore"><a style="text-decoration: none; color: white;" href="select.php">Explore</a></button>
		</div>
		<div class="slideshow-container" style="text-align: center;">

			<div class="mySlides fade">
				<div class="numbertext">1 / 5</div>
				<img src="images/m2.jpg" height="350px" style="width:800px;" alt="">
			</div>

			<div class="mySlides fade">
				<div class="numbertext">2 / 5</div>
				<img src="images/m3.jpg" height="350px" style="width:800px;" alt="">
			</div>

			<div class="mySlides fade">
				<div class="numbertext">3 / 5</div>
				<img src="images/m.jpg" height="350px" style="width:800px;" alt="">
			</div>

			<div class="mySlides fade">
				<div class="numbertext">4 / 5</div>
				<img src="images/m4.jpg" height="350px" style="width:800px;" alt="">
			</div>
			<div class="mySlides fade">
				<div class="numbertext">5 / 5</div>
				<img src="images/m5.jpg" height="350px" style="width:800px;" alt="">
			</div>

		</div>
		<br>

		<div style="text-align:center">
			<span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span><br>
		</div>
	</div>


	<div id="contact_us" style="background-color: rgb(4, 30, 66); padding-top: 10px;">
		
		<div style="text-align: center; color: white;">
			<h3>Follow Us</h3>
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-instagram"></a>
		</div>
	</div>

	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			slideIndex++;
			if (slideIndex > slides.length) {
				slideIndex = 1
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
			setTimeout(showSlides, 2000);
		}
	</script>

	<div>
		<footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
	</div>
</body>

</html>