<?php
    if(isset($_POST['checkShopName'])){
    $mysqli = NEW MySQLi('localhost','root','','shoppers paradigm');

    $ShopName = $mysqli->real_escape_string($_POST['checkShopName']);

    $resultSet = $mysqli->query("SELECT * FROM shop WHERE ShopName = '$ShopName' LIMIT 1");

    if($resultSet->num_rows == 0){
        echo "$ShopName is available";
    }else{
        echo "There already exists a shop with the name $ShopName.";
    }    
  }
?>