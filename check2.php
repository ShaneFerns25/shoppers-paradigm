<?php
    session_start();
    $category = $_SESSION['category'];
    if(isset($_POST['checkpid'])){
    $mysqli = NEW MySQLi('localhost','root','','shoppers paradigm');

    $pid = $mysqli->real_escape_string($_POST['checkpid']);

    if($category == 'footwear'){
    $resultSet = $mysqli->query("SELECT ShoeSize,Color,Sole_Material,Brand,Price,Quantity,PName,ShoeType FROM $category WHERE ProductID = '$pid' LIMIT 1");
    if ($resultSet->num_rows > 0) {
    while($row = $resultSet->fetch_assoc()) {
    $_SESSION['ShoeSize'] = $row["ShoeSize"];
    $_SESSION['Color'] = $row["Color"];
    $_SESSION['Sole_Material'] = $row["Sole_Material"];
    $_SESSION['Brand'] = $row["Brand"];
    $_SESSION['Price'] = $row["Price"];
    $_SESSION['Quantity'] = $row["Quantity"];
    $_SESSION['PName'] = $row["PName"];
    $_SESSION['ShoeType'] = $row["ShoeType"];
      }
      echo 'bird';
     }
    }
    elseif ($category == 'shirts') {
    $resultSet = $mysqli->query("SELECT PName,Price,Size,Type,Color,Brand,Quantity FROM $category WHERE ProductID = '$pid' LIMIT 1");
    if ($resultSet->num_rows > 0) {
    while($row = $resultSet->fetch_assoc()) {
    $PName = $row["PName"];
    $Price = $row["Price"];    
    $Size = $row["Size"];
    $Type = $row["Type"];
    $Color = $row["Color"];
    $Brand = $row["Brand"];
    $Quantity = $row["Quantity"];
    echo($PName);
    echo '|';
    echo($Price);
    echo '|';
    echo($Size);
    echo '|';
    echo($Type);
    echo '|';
    echo($Color);
    echo '|';
    echo($Brand);
    echo '|';
    echo($Quantity);
      }
     }
    }
    else {
    $resultSet = $mysqli->query("SELECT PName,Price,Brand,Screen_Size,OS,Ram,Storage,Quantity FROM $category WHERE ProductID = '$pid' LIMIT 1");
    if ($resultSet->num_rows > 0) {
    while($row = $resultSet->fetch_assoc()) {
    $_SESSION['PName'] = $row["PName"];
    $_SESSION['Price'] = $row["Price"];
    $_SESSION['Brand'] = $row["Brand"];
    $_SESSION['Screen_Size'] = $row["Screen_Size"];
    $_SESSION['OS'] = $row["OS"];
    $_SESSION['Ram'] = $row["Ram"];
    $_SESSION['Storage'] = $row["Storage"];
    $_SESSION['Quantity'] = $row["Quantity"];
      }
      echo 'mario';
     }
    }  
  }
?>