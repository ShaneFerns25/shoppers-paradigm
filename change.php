<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])){
        $pwd = md5($_POST['pwd']);
        $npwd = md5($_POST['npwd']);
        $cnpwd = md5($_POST['cnpwd']);
        $shopid = $_SESSION['shopid'];

        $sql = "SELECT * FROM shop WHERE ShopID =:shopid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
        foreach($results as $row) {
            if($row->Password == $pwd){
                if($cnpwd == $npwd){
                $sql = "UPDATE shop SET Password =:npwd WHERE ShopID =:shopid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':npwd',$npwd,PDO::PARAM_STR);
                $query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
                $query->execute();
                if($query->rowCount() == 0)
                {
                    $error="Password could not be changed. Please try again.";
                }
                else{
                    $msg="Password changed successfully.";
                }
              }
              else{
              $error="Entered confirm password doesn't match";
              }
            }
            else{
            $error="Enter the current password correctly";
            }
          }
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Change Password</title>
    <link rel="stylesheet" type="text/css" href="css1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript.js"></script>
    <script>
     function showpass() {
    var x = document.getElementById("pwd");
    if(x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    var x = document.getElementById("npwd");
    if(x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    var x = document.getElementById("cnpwd");
    if(x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
   }   
    </script>

    <style>
        ::placeholder{
            color:white;
        }

        #back2 {
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url("images/super.jpg");
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center center;
            position: relative;
        }

        #formback {
            background-color: rgba(240, 240, 240, 0.986)    ;
            box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.137);
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
        }

        #submit{
            outline: none;
            border: none;
            border-radius: 10px;
            padding: 13px 25px;
            margin-bottom: 30px;
            background-color: rgba(255, 0, 0, 0.788);
            color: antiquewhite;
        } 

        #cancel{
            outline: none;
            border: none;
            border-radius: 10px;
            padding: 13px 20px;
            margin-bottom: 30px;
            margin-right:5px;
            background-color: rgb(34, 190, 60);
            color: antiquewhite;
        }

        .input_field1{
            background-color:rgba(114, 124, 156, 0.986);
            border:none;
            border-radius:10px;
            color:white;
            padding:15px;
            margin:10px;
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

<body style="margin: 0px;" id="back2">
    <div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="login_data.php">Home</a>
            <a href="#" onclick="myfun1()">Add new data</a>
            <a href="update.php">Update data</a>
            <a href="change.php">Change Password</a>
            <a href="delete.php">Delete Account</a>
            <a href="admin_login.php">Logout</a>
        </div>
        <div>
            <p style="margin-top: 5px;" id="tab" onclick="openNav()">&#9776;</p>
        </div>
        <h1 style="color: aliceblue; text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
    </div>
    <div id="formback">
        <h1 style="padding-top: 20px;">
            Change Password <br/> ShopID: 
            <?php 
                $shopid = $_SESSION['shopid'];
                echo $shopid;
                if($error){
                ?>
                    <div class="errorWrap">
                        <strong>ERROR</strong>: <?php echo htmlentities($error); ?>
                    </div>
                <?php 
                } 
                else if($msg){
                ?>
                    <div class="succWrap">
                        <strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> 
                    </div>
                <?php 
                }
            ?>
        </h1>
        <form action="#" method="post">
            <input class="input_field1" type="password" id="pwd" name="pwd" placeholder="Enter current password" required><br>
            <input class="input_field1" type="password" id="npwd" name="npwd" placeholder="Enter new password" required><br>
            <input class="input_field1" type="password" id="cnpwd" name="cnpwd" placeholder="Confirm new password" required><br>
            <input id="user" type="checkbox" onclick="showpass()">Show Password<br><br>
            <button type="reset" id="cancel" name="cancel"><a href="login_data.php" style="color: white;">Go Back</a></button>
            <button type="submit" id="submit" name="submit">Change Password</button>
        </form>
    </div>

    <?php
    $shopid = $_SESSION['shopid'];
    $sql = "SELECT Category FROM shop WHERE ShopID = $shopid";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    foreach($results as $row){
      $cat = $row->Category;
     }    
    ?>

    <script>
        function myfun1(){
            var x = "<?php echo $cat; ?>"
                if(x == "Shoes"){
                    window.location.assign('add_shoes.php');
                }
                if(x == "Shirts"){
                    window.location.assign('add_shirt.php'); 
                }
                if(x == "Smartphones"){
                    window.location.assign('add_smartphones.php');
                }

        }
    </script>

    <div style="margin-top: 200px;">
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>