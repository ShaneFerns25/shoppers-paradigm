<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])){
    $target_dir = "productimages/shirts/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check === false) {
        $error.="File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $error.=" Sorry, file already exists.";
        $uploadOk = 0;
    }

        $brand = $_POST['brand'];
        $product = $_POST['product'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];
        $shopid = $_SESSION['shopid']; 

         // Allow certain file formats
        if($imageFileType == "jpg" ) {
        $target=basename($target_file, ".jpg");  
            if($product==$target){
            $sql="INSERT INTO shirts(PName, Price, Size, Type, Color, Brand, ShopID, Quantity) VALUES (:product, :price, :size, :type, :color, :brand, :shopid, :quantity);";
        
            $query = $dbh->prepare($sql);
            $query->bindParam(':product',$product,PDO::PARAM_STR);
            $query->bindParam(':price',$price,PDO::PARAM_STR);
            $query->bindParam(':size',$size,PDO::PARAM_STR);
            $query->bindParam(':type',$type,PDO::PARAM_STR);
            $query->bindParam(':color',$color,PDO::PARAM_STR);
            $query->bindParam(':brand',$brand,PDO::PARAM_STR);
            $query->bindParam(':shopid',$shopid,PDO::PARAM_STR);
            $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId){
                $msg.=" Product record added Successfully.";
             }
            else{
                $error.=" Something went wrong. Product record was not added. Please try again.";
                $uploadOk = 0;
             }
            }
            else{
              $error.=" The Product Name and the image name should be the same.";  
              $uploadOk = 0;
            }
        }
        else {
            $error.=" Sorry, only JPG files are allowed.";
            $uploadOk = 0;
        }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error.=" Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg.=" The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            $error.=" Sorry, there was an error uploading your file.";
        }
    }    
 }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Add Shirt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css3.css">
    <link rel="stylesheet" type="text/css" href="css1.css">
    <script type="text/javascript" src="javascript.js"></script>

    <style>

        ::placeholder{
            color:black;
        }

        #back2 {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/update.jpg");
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center center;
            position: relative;
        }
        #formback {
            background-color: rgb(61,75,62);
            box-shadow: 0 0 10px 10px;
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 30px;
            margin-top: 50px;
            border-radius: 0px;
        }

        #tab {
            font-size: 35px;
            cursor: pointer;
            color: white;
            margin-left: 40px;
            position: absolute;
            margin-top: 5px;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            margin-top: 250px;
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
        <h2 style="color: white;">Shirts <br> ShopID: 
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
        <form style="background-color: rgb(61,75,62); border-radius: 10px;padding-top: 10px;" action="#" method="POST" enctype="multipart/form-data">
            <input id="brand" name="brand" type="text" placeholder="Enter Brand Name" class="input_field" required></br>
            <input id="product" name="product" type="text" placeholder="Enter Product Name" class="input_field" required></br>
            <input id="price" name="price" type="number" placeholder="Enter Price" class="input_field" required><br>
            <input id="type" name="type" type="text" placeholder="Enter Shirt Type" class="input_field" required><br>
            <input id="color" name="color" type="text" placeholder="Enter Shirt Color" class="input_field" required><br>
            <input id="quantity" name="quantity" type="number" placeholder="Enter Quantity" class="input_field" required><br>
            <input id="size" name="size" type="text" placeholder="Enter Shirt Size" class="input_field" required><br>
            <br>
            <label for="fileToUpload" style="margin-left: 50px;font-size: 22;">Upload image:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" style="font-size: 18px;left: 12px;position: relative;">
            <br>
            <br>
            <button class="reset" type="reset">Reset</button>
            <button class="login" type="submit" name="submit">Add </button><br>
        </form>
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