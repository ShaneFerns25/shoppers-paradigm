<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Select</title>
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
			width: 25%;
			border-radius: 5px;
			margin: 30px 30px 0;
            padding: 5px;
            cursor: pointer;
            background-color: black;
            border: 2px solid goldenrod;
		}


		img {
			border-radius: 5px 5px 0 0;
		}

		.container {
			padding: 2px 16px;
        }

        #h1 {
            margin-top: 50%;
        }
        
        #h2 {
            font-family: cursive;
            padding-top: 25px; 
            text-transform: uppercase; 
            color: aliceblue;
        }
        
        
        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 10px;
            background-color: whitesmoke;
            color: black
        }


    </style>
</head>

<body style="margin: 0;" id="back2">
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
        <h1 class="title font-change" style="color: aliceblue; text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
    </div>
    <div style="padding-bottom: 30px;">
            <h2 id="h2">
                <center>Select a particular category</center>
            </h2>
            <div class="wrap">
                <div class="card" style="box-shadow: 1px 1px 5px 1px grey;">
                    <a href="shop.php"><img src="images/shop.jpg" alt="shop" style="width:100%"></a>
                    <div class="container">
                        <h4 style="color: white;"><b>
                                <center>Locate Shop</center>
                            </b></h4>
                    </div>
                </div>
                <div class="card" style="box-shadow: 1px 1px 5px 1px grey;">
                    <a href="category.php"><img src="images/categories.jpeg" alt="Product" style="width:100%;"></a>
                    <div class="container">
                        <h4 style="color: white;"><b>
                                <center>Locate Product</center>
                            </b></h4>
                    </div>
                </div>
            </div>
        </div>

    <div class="Footer">
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>