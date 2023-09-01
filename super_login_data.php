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
            height: 380px;
            border-radius: 5px;
            margin: 30px 30px 0;
            padding: 5px;
            background-color: black;
        }

        .card img:hover {
            transform: translate(0,-10px);
            transition: 0.3s; 
            border-radius: 5px;
        }

        .container{
            padding: 2px 16px;
        }
          
        img{
        display: block;
        width: 60%;
        border-radius: 5px;
        margin-left: auto;
        margin-right: auto;
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

        #back2 {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/p4.jpg");
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        }

        #choice {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/p4.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
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
            <a href="super_login_data.php">Home</a>
            <a href="Admin_account_create.php">Create account</a>
            <a href="super_delete.php">Delete account</a>
            <a href="super_change.php">Change password</a>
            <a href="super_logout.php">Logout</a>
        </div>

        <div>
            <p id="tab" onclick="openNav()">&#9776;</p>
        </div>
        <h1 id="titl">
            <center>Shoppers Paradigm</center>
        </h1>
        <h3 id="info">
            <center>Admin Details</center>
        </h3>
        <center>
            <button id="start" onclick="showhide()">Display Shops</button>
        </center>
    </div>
    <div tabindex="0" id="choice"style="display: none; padding-bottom: 30px;">
        <?php
            $sql = "SELECT * FROM shop";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $output='';
            if($query->rowCount() > 0){
                $output  .='
                    <div class="wrap" id="back2">
                    ';
                foreach($results as $row){
                    $output  .='
                        <div style="background-color: rgb(47, 173, 231);" class="card">
                            <a href="S'. $row->ShopID .'.html"><img src="images/'. $row->ShopName .'.png" alt="'. $row->ShopName .'" style="width:100%;height: 80%"></a>
                            <div class="container">
                                <h4 style="color: black;"><b>
                                    <center>'. $row->ShopName .'</center>
                                </b></h4>
                            </div>
                        </div>    
                    ';
                }
                $output  .='
                    </div>
                    ';
            }                    
            else {
                $output = '<h3>No Data Found</h3>';
            }
            echo $output;
        ?>
    </div>
    <div>
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>
</html>