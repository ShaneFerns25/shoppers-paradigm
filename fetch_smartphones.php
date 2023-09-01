<?php

//fetch_data.php

include('includes/config.php');

if(isset($_POST["action"]))
{
	$sql = "
		SELECT * FROM smartphones WHERE Quantity >= '1'";

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
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$sql .= " AND Ram IN('".$ram_filter."')";
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$sql .= " AND Storage IN('".$storage_filter."')";
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
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:380px;">
					<img src="productimages/smartphones/'. $row->PName .'.jpg" alt="" class="img-responsive">
					<p align="center"><strong><a href="S'. $row->ShopID .'.html">'. $row->PName .' ('. $row->Storage .' GB) ('. $row->Ram .' GB Ram) </a></strong></p>
					<h4 style="text-align:center;" class="text-danger" > Rs. '. $row->Price .'</h4>
					<p>

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
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>