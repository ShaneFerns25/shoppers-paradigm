<?php

//fetch_data.php

include('includes/config.php');

if(isset($_POST["action"]))
{
	$sql = "
		SELECT * FROM shirts WHERE Quantity>='1'";

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
	if(isset($_POST["color"]))
	{
		$color_filter = implode("','", $_POST["color"]);
		$sql .= " AND Color IN('".$color_filter."')";
	}
	if(isset($_POST["type"]))
	{
		$type_filter = implode("','", $_POST["type"]);
		$sql .= " AND Type IN('".$type_filter."')";
	}
	if(isset($_POST["size"]))
	{
		$size_filter = $_POST["size"];
		$sizevalue = $_POST["chkdvalue"];
		$sql .= " AND Size IN(SELECT Size FROM shirts WHERE LOCATE(CONCAT(',', '".$sizevalue."'  ,','),CONCAT(',',Size,',')) > 0)";
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
						<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:390px;">
					       <img src="productimages/shirts/'. $row->PName .'.jpg" alt="" class="img-responsive">
					       <p align="center"><strong><a href="S'. $row->ShopID .'.html">'. $row->PName .'</a></strong></p>
					       <h4 style="text-align:center;" class="text-danger" > Rs. '. $row->Price .'</h4>
					       <p>

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
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>