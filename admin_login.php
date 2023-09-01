<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers Paradigm Admin</title>
    <link rel="stylesheet" type="text/css" href="css1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript.js"></script>
    <script>
     function showpass() {
    var x = document.getElementById("Pword");
    if(x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
   }   
    </script>

    <style>

        #main2{
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(255, 192, 203, 0)), url("images/bg-01.jpg");
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center center;
            position: relative;

        }

        #tab {
            font-size: 35px;
            cursor: pointer;
            color: black;
            margin-left: 40px;
            position: absolute;
            margin-top: 5px;
        }
        #formback {
            background-color: white;;
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            border-radius: 25px;

        }
        ::placeholder{
            color: black;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 150px;
            background-color: whitesmoke;
            color: black
        }

        @media only screen and (max-width: 376px) {
            #tab {
                margin-top: 25px;
            }

            #formback{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 80%;
            }

            .Foot{
                bottom: 0px;
                position: absolute;
                width: 100%;
            }
        }
    </style>
</head>

<body style="margin: 0;" id ="main2">
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
    <h1 class="title" style="color:black;text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
    <div id="formback">
        <h2>Shop Owner Login Form</h2>
        <form action="#" method="post">
            <input id="ShopID" name="ShopID" type="text" placeholder="Enter Shop Id" class="input_field" required></br>
            <input id="Pword" name="Pword" type="password" placeholder="Enter Password" class="input_field" required><br>
            <input id="user" type="checkbox" onclick="showpass()">Show Password<br>
            <button class="reset" type="reset">Reset</button>
            <button class="login" name="submit" type="submit">Login</button><br>
        <?php
        if(isset($_POST['submit']))
        {
          $shopid = $_POST['ShopID'];
          $pwd = md5($_POST['Pword']);
          $sql = "SELECT Password FROM shop WHERE ShopID=:shopid";
          $query = $dbh -> prepare($sql);
          $query-> bindParam(':shopid', $shopid, PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          if($query->rowCount() == 0){
            echo "Entered details are wrong. Enter proper details";
          }
          else{
            foreach($results as $row){
                if($row->Password == $pwd){
                      $_SESSION['shopid'] = $_POST['ShopID'];
                      echo "<script> window.location.assign('login_data.php'); </script>";
                }
                else{
                      echo "Entered details are wrong. Enter proper details.";
                    }
              }
            }
        }
        ?>    
        <h3>Dont have an account?</h3>
        <h3>Talk to the Supervisor</h3>
           <button id="acc"><a style="color: white;" href="contact_us.php">Contact Us</a></button>
        </form>
    </div>
    <div>
        <footer class="Foot">Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>