
<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shoppers Paradigm/Smartphones</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    
<style>
.button {
  display: inline-block;
  padding: 5px 10px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #FFFFFF;
  background-color: #f4511e;
  border: none;
  border-radius: 4px;
  position: absolute;
  top: 34px;
  right: 15px;
}

.left {
    right: unset;
}

.h3:hover {
    text-decoration: underline;
}

.button:hover {background-color: #F16E44}

.button:active {
  background-color: #F16E44;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

#back2 {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/p4.jpg");
    width: 100%;
    height: 110px;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

@media only screen and (max-width: 376px) {
    .button{font-size: unset;}
    
    .Mobileh1{
        font-size: 15px;
        margin-right: 32px;
    }

    #back2{height: 95px;}
}
</style>

</head>

<body>
    <button class="button left"><a href="category.php" target="_self" style="color: #FFFFFF;text-decoration: none;font-weight: bold">Go Back</a></button>
    <div style="margin: 0px;" id="back2">
        <br />
            <h1 class="Mobileh1" style="color: aliceblue; text-align: center; text-transform: uppercase;font-weight: bold;font-family: 'Open Sans', Sans-serif;">Shoppers Paradigm
            </h1>
        <br />
    </div>
    <button class="button"><a href="index.php" target="_self" style="color: #FFFFFF;text-decoration: none;font-weight: bold">Home Page</a></button>
    <div class="container">
        <div class="row flexrow">
            <div class="Filters col-md-3">                				
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="91500" />
                    <p id="price_show">1000 - 91500</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Brand</h3>
                    <div style="overflow-y: auto; overflow-x: hidden;">
					
                    <?php

                    $sql = "SELECT DISTINCT Brand FROM smartphones ORDER BY Brand ASC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $row)
                    {
                    ?>

                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo htmlentities($row->Brand); ?>"> <?php echo htmlentities($row->Brand); ?></label>
                    </div>
                   <?php
                    }
                   }
                    ?>                   
                    </div>
                </div>

				<div class="list-group">
					<h3>RAM</h3>
                    <?php

                    $sql = "SELECT DISTINCT Ram FROM smartphones ORDER BY Ram ASC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo htmlentities($row->Ram); ?>"> <?php echo htmlentities($row->Ram); ?> GB</label>
                    </div>
                    <?php    
                    }
                   }
                    ?>
                </div>
				
				<div class="list-group">
					<h3>Storage</h3>
                    <?php
                    $sql = "SELECT DISTINCT Storage FROM smartphones ORDER BY Storage ASC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="<?php echo htmlentities($row->Storage); ?>"> <?php echo htmlentities($row->Storage); ?> GB</label>
                    </div>
                    <?php
                    }
                   }
                    ?>  
                </div>
                <h3 class="h3" style="font-size: 20px;cursor: pointer;position: static;font-weight: bold"><a href="Smartphones.php" target="_self">Clear Filters</a></h3>
            </div>

            <div class="Filtered_data col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>
    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_smartphones.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:91500,
        values:[1000, 91500],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
