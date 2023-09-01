<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])){
        $pid = $_SESSION['pid'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE shirts SET Price =:price, Size =:size, Quantity =:quantity WHERE ProductID =:pid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':price',$price,PDO::PARAM_STR);
        $query->bindParam(':size',$size,PDO::PARAM_STR);
        $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
        $query->bindParam(':pid',$pid,PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();
        if($count > 0){
            $msg="Product record updated successfully";
        }
        else{
            $error="Product record failed to update";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Update Shirt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="javascript.js"></script>  
    <style>

        ::placeholder{
            color: black;
        }
        #back2 {
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.2)), url("images/update2.jpg");
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center center;
            position: relative;
        }

        #formback {
            background-color: rgb(255, 192, 199);
            box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.137);
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
        }

        #tab {
            font-size: 35px;
            cursor: pointer;
            color: white;
            margin-left: 40px;
            position: absolute;
            margin-top: 5px;
        }

        .reset {
        padding: 10px 25px;
        margin: 15px 20px 15px 75px;
        border: none;
        background-color: rgb(204, 53, 16);
        color: white;
        cursor: pointer;
        border-radius: 5px;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 142px;
            background-color: whitesmoke;
            color: black
        }
    </style>

</head>

<body style="margin: 0;" id="back2">
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

    <h1 style="color: aliceblue;text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>

    <div id="formback">
        <h2 style="margin-left: 43px;color: black;">
        Shirts <br/> ShopID: 
            <?php 
                $shopid = $_SESSION['shopid'];
                echo $shopid;
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
        </h2>
        <?php
        $pid = $_SESSION['pid'];        
        $category = $_SESSION['category'];
        $sql = "SELECT * FROM $category WHERE ProductID = :pid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pid',$pid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
         foreach($results as $row)
         {
        ?>
        <form style="background-color: rgb(255, 192, 199); border-radius: 10px;padding-top: 10px;" action="#" method="post">
          <div style="margin-left: 50px;">
            <label for="pid">Product ID:</label>
            <b id="pid" name="pid"><?php echo($row->ProductID); ?></b><br>
            <label for="product">Product Name:</label>
            <b id="product" name="product"><?php echo($row->PName); ?></b><br>
            <label for="type">Type:</label>
            <b id="type" name="type"><?php echo($row->Type); ?></b><br>
            <label for="color">Color:</label>
            <b id="color" name="color"><?php echo($row->Color); ?></b><br>
            <label for="brand">Brand:</label>
            <b id="brand" name="brand"><?php echo($row->Brand); ?></b><br>
          </div>
            <label for="price">Price:</label>
            <input id="price" name="price" type="number" value="<?php echo($row->Price); ?>" class="input_field"><br>
            <label for="size">Sizes:</label>
            <input id="size" name="size" type="text" value="<?php echo($row->Size); ?>" class="input_field"><br>   
            <label for="quantity" style="margin-right: 28px;">Quantity:</label>
            <input id="quantity" name="quantity" style="right: 30px;position: relative;" type="number" value="<?php echo($row->Quantity); ?>" class="input_field"><br>
            <button class="reset" type="reset">Reset</button>
            <button class="login" name="submit" type="submit" >Update</button><br>
        </form>
        <?php
         }
        }
        else {
            echo 'error';
        } 
        ?> 
    </div>
    <div>
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
</body>

</html>