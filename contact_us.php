<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm contact us</title>
    <link rel="stylesheet" type="text/css" href="css1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript.js"></script>

    <style>

        #main2{
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(255, 192, 203, 0)), url("images/bg-01.jpg");
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center center;
            position: relative;

        }
        ::placeholder {
            color: rgb(77, 66, 66);
            opacity: 0.7;
        }

        #formback {
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            border-radius: 25px;
        }

        #image {
            padding: 30px;
            margin-top: 50px;
        }

        #wrapper {
            text-align: center;
            background-color: white;
            padding: 10px;
            margin: 40px 100px 100px 100px;
            border-radius: 10px;
        
        }

        #image,
        #formback {
            display: inline-block;
            vertical-align: top;
        }

        .input_field1 {
            margin: 10px 20px 8px 20px;
            padding: 10px 20px;
            text-align: center;
            border-radius: 15px;
            background-color: rgba(212, 212, 212,0.6);
            border: none;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 250px;
            background-color: whitesmoke;
            color: black
        }

        #image img{
            width:400px;
        }

        #subject{
            height: 200px; 
            width: 400px; 
            border-radius: 25px;
            padding: 20px; 
            background-color:rgba(212, 212, 212,0.6);
        }

        @media only screen and (max-width: 376px) {
            #wrapper {
                margin: 40px 29px 100px 28px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            #image {
                margin-top: unset;
                padding: 10px;
            }

            #image img{
                width:170px;
            }

             #formback {
                margin-top: unset;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            #formback h2{
                margin-top: 0px;
                margin-bottom: 8px;
            }

            #subject{
                width: 173px;
            }

            .input_field1{
                width: 173px;
            }

            .FlexibleDiv{
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .reset{
                margin: 15px 30px 5px 25px;
            }

            #main2 {
                height: 100%;
            }
        }
    </style>
</head>

<body style="margin: 0;" id="main2">
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
            <p style="color: #000000;" id="tab" onclick="openNav()">&#9776;</p>
        </div>
        <h1 class="title" style="color:black;text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
    </div>
    <div id="wrapper">
        <div id="image">
            <img src="images/img-01.png">
        </div>
        <div id="formback">
            <h2 style="color: rgb(0, 0, 0); font-weight: 900;">Contact Us</h2>
            <form action="#" method="#">
                <input id="name" type="text" placeholder="Name" class="input_field1" required></br>
                <input id="email" type="email" placeholder="Email" class="input_field1" required><br>
                <input id="number" type="number" placeholder="Contact Number" class="input_field1" required><br>
                <textarea id="subject" placeholder="Write Something"></textarea>
                <div class="FlexibleDiv">
                    <button class="reset" type="reset"><a style="text-decoration: none; color: white;">Reset</a></button>
                    <button class="login" type="submit">Submit</button><br>
                </div>
            </form>
        </div>
    </div>
    <div>
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>