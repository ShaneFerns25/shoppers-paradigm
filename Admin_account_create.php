<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$shopname=$_POST['ShopName'];
$floor=$_POST['Floor'];   
$category=$_POST['Category']; 
$password=md5($_POST['Password']); 

$sql1 = "SELECT * FROM shop WHERE ShopID = (SELECT max(ShopID) FROM shop WHERE FloorNo =:floor)";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':floor',$floor,PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row){  
$shopid = $row->ShopID;
$shopid = $shopid + 1;
}

$sql="INSERT INTO shop(ShopID,ShopName,Password,FloorNo,Category) VALUES(:shopid,:shopname,:password,:floor,:category)";
$query = $dbh->prepare($sql);
$query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
$query->bindParam(':shopname',$shopname,PDO::PARAM_STR);
$query->bindParam(':floor',$floor,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Admin record added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Shop Owner Account</title>
    <link rel="stylesheet" type="text/css" href="css2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="javascript.js"></script>
    <script type="text/javascript">
    $(document).ready(function(e) {
      $('#ShopName').keyup(function(){
        var ShopName = $(this).val();
        var output = $('#output');

        var phpfile= 'check.php';

        if(ShopName != '') {
            $.post(phpfile, {checkShopName: ShopName}, function(data){
                 $('#output').html(data);
            });
        }
      });
    });

    function showpass() {
    var x = document.getElementById("Password");
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

        .input_field1 {
            margin: 10px 20px 8px 20px;
            padding: 10px 20px;
            text-align: center;
            background-color: rgb(80, 88, 114);
            border: none;
        }
        #formback {
            background-color: black;
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            border-radius: 25px;
            border: 1px solid white;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 250px;
            background-color: whitesmoke;
            color: black
        }

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        
        #tab{
            margin-top: 5px;
        }
    </style>

    
</head>

<body style="margin: 0;" id="back3">
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="super_login_data.php">Home</a>
            <a href="Admin_account_create.php">Create account</a>
            <a href="super_delete.php">Delete account</a>
            <a href="super_change.php">Change password</a>
            <a href="super_logout.php">Logout</a>
        </div>

        <div>
            <p id="tab" onclick="openNav()">&#9776;</p>
        </div>
    <h1 style="color:aliceblue;text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>

    <div style="background-color: #00003f;" id="formback">
        <h2 style="background-color: rgb(80, 88, 114);">
            Create Account <br/>
            <?php   
             echo ("ShopID: ");  echo ($shopid);   
            ?>  
             <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
        </h2>
        <form style="background-color: #00003f;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <input id="ShopName" type="text" name="ShopName" placeholder="Enter Shop Name" class="input_field1" required><br>
            <span id="output" style="color: white;"></span>
            <br>
            <label style="color:white;"> Floor Number</label>
            <select style="padding: 8px; margin: 10px; background-color:rgb(80, 88, 114); color:white;" id="Floor" name="Floor">
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>
            <label style="color:white;">Select Category</label><br>
            <select style="padding: 8px; margin: 10px; background-color:rgb(80, 88, 114);color:white; " id="Category" name="Category">
                <option value="Shirts">Shirts</option>
                <option value="Shoes">Shoes</option>
                <option value="Smartphones">Smartphones</option>
            </select><br>
            <input id="Password" type="password" name="Password" placeholder="Enter Password" class="input_field1" required><br>
            <input id="user" type="checkbox" onclick="showpass()"><span style="color:white;">Show Password</span><br>
            <button class="reset" type="reset">Reset</button>
            <button class="login" name="submit" id="submit" type="submit" onclick="myfunction()">Create</button><br>
        </form>
    </div>
    <div>
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>