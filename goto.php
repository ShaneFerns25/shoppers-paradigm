<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shoppers Paradigm Update Shoes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css1.css">
    <script src="javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(e) {
      $('#pid').keyup(function(){
        var pid = $(this).val();
        var output = $('#output');

        var phpfile= 'check3.php';

        if(pid != '') {
            $.post(phpfile, {checkpid: pid}, function(data){
                 $('#output').html(data);
            });
        }
      });
    });
    </script>    
    <style>
        #formback {
            background-color: aliceblue;
            width: 40%;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            border-radius: 25px;
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
        <a href="add_shoes.php">Add new data</a>
        <a href="update_shoes.php">Update data</a>
        <a href="change.php">Change Password</a>
        <a href="delete.php">Delete Account</a>
        <a href="logout.php">Logout</a>
    </div>
    <div>
        <p id="tab" onclick="openNav()">&#9776;</p>
    </div>

    <h1 style="color: aliceblue;text-align: center; text-transform: uppercase">Shoppers Paradigm</h1>

    <div style="background-color: rgba(16, 62, 88, 0.815);border: 3px solid white;" id="formback">
        <h2 style="color: white;">
            Shoes <br/> ShopID: 
            <?php 
                $pid = "123";
                $name = "Omkar";
            ?>
        </h2>
        <form style="background-color: whitesmoke; border-radius: 10px;padding-top: 10px;" action="#" method="POST">
                <input id="id" name="pid" type="number" value="<?php echo("$pid"); ?>" class="input_field" required></br><br>
                <input id="name" name="name" type="text" value="<?php echo("$name"); ?>" class="input_field" required></br><br>
            
            <button class="reset" type="reset">Reset</button>
            <button class="login" type="submit" name="submit">Update</button><br>
        </form>
    </div>
    <div>
        <footer>Copyright &COPY;2021 Shoppers Paradigm</footer>
    </div>
</body>

</html>