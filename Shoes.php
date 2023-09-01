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

    <title>Shoppers Paradigm/Shoes</title>

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
                    <input type="hidden" id="hidden_minimum_price" value="50" />
                    <input type="hidden" id="hidden_maximum_price" value="3000" />
                    <p id="price_show">50 - 3000</p>
                    <div id="price_range"></div>
                </div>              
                <div class="list-group">
                    <h3>Brand</h3>
                    <div style="overflow-y: auto; overflow-x: hidden;">
                    
                    <?php

                    $sql = "SELECT DISTINCT Brand FROM footwear ORDER BY Brand ASC";
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
                    <h3>Shoe Size</h3>
                    <?php
                    $j = 0;
                    $sql = "SELECT DISTINCT ShoeSize FROM footwear";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                     foreach($results as $row)
                     {
                      if(strlen($row->ShoeSize)>2)
                      {
                       $str_array = explode (",", $row->ShoeSize);
                       $strLen = count($str_array);
                       $sql2 = "SELECT DISTINCT ShoeSize FROM footwear ORDER BY ShoeSize ASC";
                       $query2 = $dbh -> prepare($sql2);
                       $query2->execute();
                       $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                       if($query2->rowCount() > 0)
                       {
                        foreach($results2 as $rows)
                        {
                         $i = 0;
                         while ($i < $strLen)
                         {
                          if($str_array[$i] == $rows->ShoeSize)
                          {
                           unset($str_array[$i]);
                          }
                          $i++;
                         }
                        }
                       }
                       $strLength = count($str_array);
                       $i = 0;
                       while ($i < $strLength)
                       {
                        $sarr=array_pop($str_array);
                        array_push($str_arr,$sarr);
                        $i++;
                       }    
                       $j=$j+$strLength;
                      }
                      else
                      {
                       $str_arr[$j] = $row->ShoeSize;                
                       $j++;
                      }
                     }    
                     sort($str_arr);
                     $str_arr=array_unique($str_arr);
                     $newsarr=array();
                     $sLength = count($str_arr);
                     $i = 0;
                     while ($i < $sLength)
                       {
                        $arrele=array_pop($str_arr);
                        array_push($newsarr,$arrele);
                        $i++;
                       }      
                     sort($newsarr);
                     $slen = count($newsarr);
                     $i = 0;
                     while ($i < $slen)
                     {          
                      ?>
                      <div class="list-group-item radio">
                      <label><input type="radio" class="common_selector ShoeSize" name="sizes" value="<?php echo htmlentities($newsarr[$i]); ?>"> <?php echo htmlentities($newsarr[$i]); ?></label>
                      </div>
                      <?php
                      $i++;
                     }   
                    }           
                    ?> 
                </div>
                
                <div class="list-group">
                    <h3>Color</h3>
                    <?php
                    $sql = "SELECT DISTINCT Color FROM footwear ORDER BY Color ASC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Color" value="<?php echo htmlentities($row->Color); ?>"> <?php echo htmlentities($row->Color); ?> </label>
                    </div>
                    <?php
                    }
                   }
                    ?>  
                </div>

                <div class="list-group">
                    <h3>Sole_Material</h3>
                    <?php
                    $sql = "SELECT DISTINCT Sole_Material FROM footwear ORDER BY Sole_Material ASC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Sole_Material" value="<?php echo htmlentities($row->Sole_Material); ?>"> <?php echo htmlentities($row->Sole_Material); ?> </label>
                    </div>
                    <?php
                    }
                   }
                    ?>  
                </div>

                <div class="list-group">
                    <h3>ShoeType</h3>
                    <?php
                    $sql = "SELECT DISTINCT ShoeType FROM footwear ORDER BY ShoeType ASC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ShoeType" value="<?php echo htmlentities($row->ShoeType); ?>"> <?php echo htmlentities($row->ShoeType); ?> </label>
                    </div>
                    <?php
                    }
                   }
                    ?>  
                </div>
                <h3 class="h3" style="font-size: 20px;cursor: pointer;position: static;font-weight: bold"><a href="Shoes.php" target="_self">Clear Filters</a></h3>
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
        var ShoeSize = get_filters('ShoeSize');
        var Color = get_filter('Color');
        var Sole_Material = get_filter('Sole_Material');
        var ShoeType = get_filter('ShoeType');
        var chkdvalue = displayRadioValue();
        $.ajax({
            url:"filtershoes.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ShoeSize:ShoeSize, Color:Color, Sole_Material:Sole_Material, ShoeType:ShoeType, chkdvalue:chkdvalue},
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

    function get_filters(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        $('.ShoeSize').on('change', function() {
          $('.ShoeSize').not(this).prop('checked', false); 
        });
        return filter;
    }

    function displayRadioValue() 
    {
        var ele = document.getElementsByName('sizes');
        for(i = 0; i < ele.length; i++) {
            if(ele[i].checked)
                var impval = ele[i].value;
        }
        return impval;
    } 

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:50,
        max:3000,
        values:[50, 3000],
        step:50,
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