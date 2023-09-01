<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Data</title>
    <link rel="stylesheet" type="text/css" href="css1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="javascript.js"></script>

    <style>
        .wrap{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .card{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 25%;
            border-radius: 5px;
            margin: 30px 30px 0;
            padding: 5px;
            background-color: black;
        }

        .container{
            padding: 2px 16px;
        }
          
        img{
            border-radius: 5px 5px 0 0;
        }

        p {
           font-size: 20px;
        }

        h4 {
           font-size: 20px;
        }

        #main1 {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/tech.jpg");
        width: 100%;
        background-size: cover;
        background-position: center center;
        position: relative;

        }

        #info {
        color: white;
        font-size: 3vw;
        text-transform: none;
        padding-top: 4%;
        }

        footer {
            font-weight: bold;
            padding-bottom: 10px;
            padding-top: 10px;
            background-color: whitesmoke;
            color: black; 
        }

        #tab{
            margin-top: 25px;
        }
    </style>
</head>

<body style="margin: 0px;">
    <div id="main1" >
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
        <h1 id="titl">
            <center>Shoppers Paradigm</center>
        </h1>
        <h3 id="info">
            <center>Shop Details</center>
        </h3>
        <?php
            $shopid = $_SESSION['shopid'];
            $sql = "SELECT * FROM shop WHERE ShopID = $shopid";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $row){
            $cat = $row->Category; 
            }   
        if ($cat == "Shoes") {
        ?>
        <center>
            <button id="start" onclick="showhide()">Display Shoes</button>
        </center>
        <?php
        } elseif ($cat == "Shirts") {
        ?>    
        <center>
            <button id="start" onclick="showhide()">Display Shirts</button>
        </center>
        <?php
        } else { 
        ?>  
        <center>
            <button id="start" onclick="showhide()">Display Smartphones</button>
        </center>
        <?php
        } 
        ?>
    </div>

    <div tabindex="0" id="choice" style="display: none; padding-bottom: 30px;">
        <?php
            $shopid = $_SESSION['shopid'];
            $sql = "SELECT * FROM shop WHERE ShopID = $shopid";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            foreach($results as $row){
            $cat = $row->Category;    
        ?>
        <h2>
            Shop ID: <?php echo $shopid; ?>  <br />
            Shop Name: <?php echo $row->ShopName; ?> <br />
            Shop Floor No: <?php echo $row->FloorNo; ?> <br />
            Shop Category: <?php echo $row->Category; ?>        
        </h2>
        <?php
        }
        if ($cat == "Shoes") {
            $table = 'footwear';
            $_SESSION['category'] = 'footwear';
        } elseif ($cat == "Shirts") {
            $table = 'shirts';
            $_SESSION['category'] = 'shirts';
        } else { 
            $table = 'smartphones';
            $_SESSION['category'] = 'smartphones';
        }
        
        $sql2 = "SELECT * FROM $table WHERE ShopID = $shopid";
        $query2 = $dbh -> prepare($sql2);
        $query2->execute();
        $results=$query2->fetchAll(PDO::FETCH_OBJ);
        $output = '';
        if($query->rowCount() > 0)
          {
            if ($cat == "Shoes") {
                foreach($results as $row)
                { 
                    $output .= '
                      <div class="col-sm-4 col-lg-3 col-md-3">
                       <div style="border:1px solid #ccc; border-radius:5px; padding:25px; margin-bottom:16px; margin-left: 400px; margin-right: 400px; height:450px;">
                            <img src="productimages/shoes/'. $row->PName .'.jpg" alt="" style="display: block;margin-left: auto;margin-right: auto;width: 180px;height: 180px;">
                            <p align="center"><strong><a href="#">'. $row->PName .' ('. $row->ShoeSize .' ) ('. $row->Brand .') ('. $row->Color .') </a></strong></p>
                            <h4 style="text-align:center;" class="text-danger" > Rs. '. $row->Price .'</h4>
                            <p style="text-align:center;">

                            ShopID: '. $row->ShopID .' <br /> 
                            ShoeSize: '. $row->ShoeSize .' <br />
                            Brand: '. $row->Brand .' <br />
                            Color: '. $row->Color .' <br />
                            Sole_Material: '. $row->Sole_Material .' <br />
                            Quantity: '. $row->Quantity .' </p>
                       </div>
                      </div>
                    ';
                }
            } elseif ($cat == "Shirts") { 
                foreach($results as $row)
                {
                    $output .= '
                      <div class="col-sm-4 col-lg-3 col-md-3">
                        <div style="border:1px solid #ccc; border-radius:5px; padding:25px; margin-bottom:16px; margin-left: 400px; margin-right: 400px; height:450px;">
                           <img src="productimages/shirts/'. $row->PName .'.jpg" alt="" style="display: block;margin-left: auto;margin-right: auto;width: 180px;height: 180px;">
                           <p align="center"><strong><a href="#">'. $row->PName .'</a></strong></p>
                           <h4 style="text-align:center;" class="text-danger" > Rs. '. $row->Price .'</h4>
                           <p style="text-align:center;">

                           ShopID: '. $row->ShopID .' <br /> 
                           Brand: '. $row->Brand .' <br />
                           Color: '. $row->Color .' <br />
                           Type: '. $row->Type .' <br />
                           Size: '. $row->Size .' <br />
                           Quantity: '. $row->Quantity .' </p>
                        </div>
                      </div>
                    ';    
                }
            } else { 
                foreach($results as $row)
                {
                    $output .= '
                      <div class="col-sm-4 col-lg-3 col-md-3">
                        <div style="border:1px solid #ccc; border-radius:5px; padding:50px; margin-bottom:16px; margin-left: 400px; margin-right: 400px; height:450px;">
                           <img src="productimages/smartphones/'. $row->PName .'.jpg" alt="" style="display: block;margin-left: auto;margin-right: auto;width: 188px;height: 230px;">
                           <p align="center"><strong><a href="#">'. $row->PName .' ('. $row->Storage .' GB) ('. $row->Ram .' GB Ram) </a></strong></p>
                           <h4 style="text-align:center;" > Rs. '. $row->Price .'</h4>
                           <p style="text-align:center;">

                           ShopID: '. $row->ShopID .' <br /> 
                           Brand: '. $row->Brand .' <br />
                           RAM: '. $row->Ram .' GB<br />
                           Storage: '. $row->Storage .' GB <br />
                           Quantity: '. $row->Quantity .' </p>
                        </div>
                      </div>
                    ';
                }                    
            }
          }
        else
        {
          $output = '<h3>No Data Found</h3>';
        }
        echo $output;
    ?>

    </div>

    <div>
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>

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