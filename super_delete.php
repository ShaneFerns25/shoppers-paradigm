<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])){
        $pwd = md5($_POST['pwd']);
        $shopid = $_POST['ShopID'];

        $sql = "SELECT * FROM shop WHERE ShopID =:shopid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        foreach($results as $row){
            $cat = $row->Category;
            switch ($cat) {
                case "Shirts":{
                    $cat = "shirts";
                    break;
                }
                case "Shoes":{
                    $cat = "footwear";
                    break;
                }
                case "Smartphones":{
                    $cat = "smartphones";
                    break;
                }
            }
            if($row->Password == $pwd){
                $sql = "DELETE FROM $cat WHERE ShopID =:shopid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
                $query->execute();
                $count = $query->rowCount();
                if($count == 0){
                    $error1="Record could not be deleted from {$cat} table";
                }

                $sql = "DELETE FROM shop WHERE ShopID = :shopid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
                $query->execute();
                $count = $query->rowCount();
                if($count > 0){
                    $msg="Record deleted successfully";
                }
                else{
                    $error="Record could not be deleted from shop table";
                }
            }
            else{
                $error="Entered password is wrong.";
            }
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Delete Account</title>
    <link rel="stylesheet" type="text/css" href="css1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript.js"></script>
    <script>
        function confirmSubmit() {
            var agree=confirm("Do you really want to continue with deleting this account?");
            if (agree)
            return true ;
            else
            return false ;
        }

        function showpass() {
            var x = document.getElementById("pwd");
            if(x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }   
    </script>

    <style>

        ::placeholder{
            color: white;
        }

        #back3 {
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(255, 192, 203, 0)), url("images/blue.jpg");
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center center;
            position: relative;
        }
        #delete{           
            outline: none;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-left:15px;
            margin-bottom: 30px;
            background-color: rgba(255, 0, 0, 0.788);
            color: antiquewhite;
        }    
        
        #cancel{
            outline: none;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 30px;
            background-color: green;
            color: antiquewhite;
        }

        .input_field1 {
            margin: 30px 20px 8px 20px;
            padding: 10px 20px;
            text-align: center;
            background-color: rgb(80, 88, 114);
            border: none;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 170px;
            background-color: whitesmoke;
            color: black; 
        }
    </style>
</head>

<body style="margin: 0px;" id="back3">
    <div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="super_login_data.php">Home</a>
            <a href="Admin_account_create.php">Create account</a>
            <a href="super_delete.php">Delete account</a>
            <a href="super_change.php">Change password</a>
            <a href="super_logout.php">Logout</a>
        </div>
        <div>
            <p style="margin-top: 5px;" id="tab" onclick="openNav()">&#9776;</p>
        </div>
        <h1 style="color: aliceblue; text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
    </div>
    <div style=" text-align:center;width: 50%; margin: auto;background-color:#00004f;color:white ;border-radius: 25px; margin-top: 100px; border: 2px solid white;">
        <h1 style="padding-top: 20px;">
            Delete Account <br/>
            <?php 
                if($error){
                ?>
                    <div class="errorWrap" style="color: white;">
                        <strong>ERROR</strong>: <?php echo htmlentities($error); ?>
                    </div>
                <?php 
                } 
                else if($msg){
                ?>
                    <div class="succWrap" style="color: white;">
                        <strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> 
                    </div>
                <?php 
                }
            ?>
        </h1>
        <h4>Deleting this account will remove all the data permanantly</h4>
        <h4>Are you sure you want to delete this account?</h4>
        <form action="#" method="post">
            <input class="input_field1" type="text" id="ShopID" name="ShopID" placeholder="Enter ShopID" required><br>
            <input class="input_field1" type="password" id="pwd" name="pwd" placeholder="Enter your password" required><br>
            <input id="user" type="checkbox" onclick="showpass()">Show Password<br><br>
            <button type="reset" id="cancel" name="cancel"><a href="super_login_data.php" style="color: white;">Cancel</a></button>
            <button type="submit" id="delete" name="submit" onClick='return confirmSubmit()'>Delete</button>
        </form>
    </div>
    <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
</body>
</html>