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

        ::placeholder{
            color: black;
        }

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
        }

        #formback {
            background-color: aliceblue;
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            border-radius: 25px;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 250px;
            background-color: whitesmoke;
            color: black
        }

        @media only screen and (max-width: 376px) {
            #formback{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 90%;
                position: absolute;
                left: 8.5px;
            }

            #main2{
                overflow: hidden;
            }
            
            .Foot{
                bottom: 0px;
                position: absolute;
                width: 100%;
            }
        }
    </style>
</head>

<body style="margin: 0;"id="main2">
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
        <h2>Welcome Admin</h2>
        <form action="#" method="post">
            <input id="Pword" name="Pword" type="password" placeholder="Enter Password" class="input_field" required><br>
            <input id="user" type="checkbox" onclick="showpass()">Show Password<br>
            <button class="reset" type="reset">Reset</button>
            <button class="login" name="submit" type="submit">Login</button><br>
        <?php
        if(isset($_POST['submit']))
        {
            $pwd = md5($_POST['Pword']);
            $sql = "SELECT Password FROM admin WHERE AdminID = '1'";
            $query = $dbh -> prepare($sql);
            $query-> bindParam(':pwd', $pwd, PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
             foreach($results as $row)
             {  
              if($row->Password == $pwd){
                echo "<script> window.location.assign('super_login_data.php'); </script>";
              }
              else{
                echo "Entered details are wrong. Enter proper details";  
              }
             }
            }
            else {
                echo "Entered details are wrong. Enter proper details";
            }   
        }
        ?>    
        </form>
    </div>
    <div style="margin-top: 341px;">
        <footer class="Foot">Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>