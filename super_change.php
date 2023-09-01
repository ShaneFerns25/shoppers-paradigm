<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])){
        $pwd = md5($_POST['pwd']);
        $npwd = md5($_POST['npwd']);
        $rpwd = md5($_POST['rpwd']);

    $sql = "SELECT * FROM admin WHERE AdminID ='1'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
     foreach($results as $row) {
       if($row->Password == $pwd){ 
        if($rpwd == $npwd){
            $sql = "SELECT * FROM admin WHERE AdminID ='1'";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
                foreach($results as $row) {
                    if($row->Password == $pwd){
                        $sql = "UPDATE admin SET Password =:npwd WHERE AdminID ='1'";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':npwd',$npwd,PDO::PARAM_STR);
                        $query->execute();
                        if($query->rowCount() == 0)
                        {
                            $error="Password could not be changed. Please try again.";
                        }
                        else{
                            $msg="Password changed successfully.";
                        }
                    }
                }
            }
            else{
                $error="Entered password is wrong.";
            }
         }
         else{
            $error="Entered confirm password doesn't match";
         }
       }
       else {
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
        var x = document.getElementById("Pword1");
        var y = document.getElementById("Pword2");
        var z = document.getElementById("Pword3");
        if(x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if(y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
        if(z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
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
    <div id="formback">
        <h1 style="padding-top: 20px;">
            Change Password <br/>
            <?php
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
            <input id="Pword1" class="input_field1" type="password" name="pwd" placeholder="Enter current password" required><br>
            <input id="Pword2" class="input_field1" type="password" name="npwd" placeholder="Enter new password" required><br>
            <input id="Pword3" class="input_field1" type="password" name="rpwd" placeholder="Confirm new password" required><br>
            <input id="user" type="checkbox" onclick="showpass()">Show Password<br><br>
            <button type="reset" id="cancel" name="cancel"><a href="super_login_data.php" style="color: white;">Go Back</a></button>
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>
    </div>
    <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
</body>

</html>