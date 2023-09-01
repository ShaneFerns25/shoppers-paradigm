<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Shoppers Paradigm about us</title>
	<link rel="stylesheet" type="text/css" href="css1.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="javascript.js"></script>


	<style>

		.wrap {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
		}

		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			transition: 0.3s;
			width: 50%;
			border-radius: 5px;
			margin: 30px 30px 0;
			padding: 5px;

		}

		.card img:hover {
			transform: translate(0,-10px);
			transition: 0.3s; 
		}

		img {
			border-radius: 5px 5px 0 0;
		}

		.container {
			padding: 2px 16px;
		}

		
		footer {
			font-weight: bold;
			padding-bottom: 10px; 
			padding-top: 10px; 
			margin-top: 20px;
			background-color: lightgrey;
			color: black
		}

		#back2 {
			height: 110px;
		}

		.MovingImg{
			width:900px;
		}

		.MallInfo{text-align: center;}

		.OwnerInfo{
			width: 50%;
			padding-bottom: 40px;
		}

		.OwnerInfo p{
			padding: 30px 20px 0px 20px;
		}

		@media only screen and (max-width: 376px) {
            #back2{height: 95px;}

			.MovingImg{
				width: 328px;
				height: auto;
			} 

			.flexible{
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				position: relative;
    			top: 25px;
				overflow-x: clip;
			}

			.MallInfo{
				font-size: 3.4vw;
			}

			.OwnerInfo{
				width: 95%;
				padding-bottom: 0px;
			}

			.OwnerInfo p{
				padding: 0px 20px 0px 20px;
			}

			.NoWidth{
				width: unset;
				border-radius: 5px;
				height: 100%;
			}

			.wrap{
				position: relative;
    			top: -30px;
			}

			.Foot {
				width: 100%;
				background-color: lightgrey;
			}
        }

	</style>
</head>

<body style="margin: 0px;" id="back2">
	<div>
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
		<h1 class="title" style="color: aliceblue; text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
	</div>
    <div class="flexible" style="background-color: snow;">
        <h2 style="color: black; text-align: center; padding-top: 20px; font-family: alternate gothic; font-size: 3.5vw;">About Us</h2>
        <center><img class="MovingImg" src="images/m.jpg" height="500px" style="margin: 10px;" alt="Mall"></center>
        <p class="MallInfo" style="margin: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">A mall or shopping centre is a large building that is full of many smaller shops and stores.<br> It is different from earlier markets or bazaars because most of the shops are not little booths or stalls in one big open area.<br> Each store has its own space with walls. 
            Most of their entrances face a central walking area inside the building.</p>
            <div class="OwnerInfo" style="background-color: black; margin: auto; border-radius: 10px;">
            <p style="color: white; text-align: center; font-size: 3vw;">Owner Info</p>
            <div class="wrap">
                    <div style="background-color: rgb(98, 236, 128);" class="NoWidth card">
                       <center> <img src="images/user2.png" alt="Owner Info" style="width:150px;"></center>
                        <div class="container">
                            <h3 style="color: black;"><b><center>Name: Omkar Savoikar</center> </b></h3>
                            <h3 style="color: black;"><b><center>Phone No: 9922113627</center> </b></h3>
                            <h3 style="color: black;"><b><center>Email: omg123@gmail.com</center> </b></h3>

                        </div>
                    </div>
                    </div>

        </div>
        <footer class="Foot">Copyright &COPY;2021 Shoppers Paradigm</footer>

        </div>
    
	
</body>

</html>