<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST["action"]))
{
	$sql = "
		SELECT * FROM footwear WHERE Quantity >= '1'";

	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$sql .= "
		 AND Price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$sql .= " AND Brand IN('".$brand_filter."')";
	}
	if(isset($_POST["ShoeSize"]))
	{
		$size_filter = $_POST["ShoeSize"];
    	$sizevalue = $_POST["chkdvalue"];
	    $sql .= " AND ShoeSize IN(SELECT ShoeSize FROM footwear WHERE LOCATE(CONCAT(',', '".$sizevalue."'  ,','),CONCAT(',',ShoeSize,',')) > 0)";
	}
	if(isset($_POST["Color"]))
	{
		$Color_filter = implode("','", $_POST["Color"]);
		$sql .= " AND Color IN('".$Color_filter."')";
	}
	if(isset($_POST["Sole_Material"]))
	{
		$Sole_Material_filter = implode("','", $_POST["Sole_Material"]);
		$sql .= " AND Sole_Material IN('".$Sole_Material_filter."')";
	}
	if(isset($_POST["ShoeType"]))
	{
		$ShoeType_filter = implode("','", $_POST["ShoeType"]);
		$sql .= " AND ShoeType IN('".$ShoeType_filter."')";
	}

	$query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $output = '';
	if($query->rowCount() > 0)
    {
		foreach($results as $row)
		{
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:430px;">
					<img src="productimages/shoes/'. $row->PName .'.jpg" alt="" class="img-responsive">
					<p align="center"><strong><a href="S'. $row->ShopID .'.html">'. $row->PName .' ('. $row->ShoeSize .' ) ('. $row->Brand .') ('. $row->Color .') </a></strong></p>
					<h4 style="text-align:center;" class="text-danger" > Rs. '. $row->Price .'</h4>
					<p>

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
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>