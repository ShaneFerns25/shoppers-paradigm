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
            margin-top: 15px;
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
            margin-top: 250px;
            background-color: whitesmoke;
            color: black
        }

        #tab{
            margin-top: 5px;
        }
    </style>
</head>

<body style="margin: 0;" id ="main2">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="login_data.php">Home</a>
        <a href="#" onclick="myfun1()">Add new data</a>
        <a href="update.php">Update data</a>
        <a href="change.php">Change Password</a>
        <a href="delete.php">Delete Account</a>
        <a href="logout.php">Logout</a>
    </div>
    <div>
        <p id="tab" onclick="openNav()">&#9776;</p>
    </div>
    <h1 style="color:black;text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>
    <div id="formback">
        <h2>Update Data</h2>
        <form action="#" method="post">
            <input id="pid" name="pid" type="number" placeholder="Enter Product ID" class="input_field" required></br>
            <button class="reset" type="reset">Reset</button>
            <button class="login" name="submit" type="submit">Get Details</button><br>
            <?php
                if(isset($_POST['submit']))
                {   
                    $shopid = $_SESSION['shopid'];
                    $cat = $_SESSION['category'];
                    $pid = $_POST['pid'];
                    $sql = "SELECT ProductID FROM $cat WHERE shopid=:shopid";
                    $query = $dbh->prepare($sql);
                    $query-> bindParam(':shopid', $shopid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0){
                        foreach($results as $row){
                            if($row->ProductID == $pid){
                                $_SESSION['pid'] = $pid;
                                if($cat == "footwear"){
                                header("location:update_shoes.php");
                                }
                                if($cat == "shirts"){
                                header("location:update_shirt.php");         
                                }
                                if ($cat == "smartphones"){
                                header("location:update_smartphones.php");
                                }   
                            }
                        }        
                    } 
                    else{
                        echo "Entered Product ID is wrong. Enter proper Product ID.";
                    }
                }
            ?>
        </form>
    </div>
    <div style="margin-top: 380px;">
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
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

    <script type="text/javascript">
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
</body>

</html>