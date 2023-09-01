<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Shoppers Paradigm shops</title>
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
			height: 380px;
			border-radius: 5px;
			margin: 30px 30px 0;
			padding: 5px;
			background-color: black;
		}
		.card img:hover {
			transform: translate(0,-10px);
			transition: 0.3s; 
			border-radius: 5px;
		}

		img {
		display: block;
        width: 60%;
        border-radius: 5px;
        margin-left: auto;
        margin-right: auto;
		}

		@media only screen and (max-width: 376px) {
			.card {
				width: 100%;
			}
		}

		p {
           font-size: 20px;
        }

        h4 {
           font-size: 20px;
        }

		.container {
			padding: 2px 16px;
		}

		footer {
			font-weight: bold;
			padding-bottom: 10px; 
			padding-top: 10px; 
			margin-top: 20px;
			background-color: whitesmoke; 
			color: black
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
	<div id="choice" style="padding-bottom: 30px;">
        <?php
            $sql = "SELECT * FROM shop";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $output='';
            if($query->rowCount() > 0){
                $output  .='
                    <div class="wrap">
                    ';
                foreach($results as $row){
                    $output  .='
                        <div style="background-color: rgb(47, 173, 231);" class="card">
                            <a href="S'. $row->ShopID .'.html"><img src="images/'. $row->ShopName .'.png" alt="'. $row->ShopName .'" style="width:100%;height: 80%"></a>
                            <div class="container">
                                <h4 style="color: black;"><b>
                                    <center>'. $row->ShopName .'</center>
                                </b></h4>
                            </div>
                        </div>    
                    ';
                }
                $output  .='
                    </div>
                    ';
            }                    
            else {
                $output = '<h3>No Data Found</h3>';
            }
            echo $output;
        ?>
    </div>
	<div>
		<footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
	</div>

</body>

</html>