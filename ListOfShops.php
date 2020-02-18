<?php
$title='List of shop';
$description='';  
include 'header.php';
?>

<div id="content">
<H1>List of shops</H1>
<small>
<?php
session_start();
include("dbconnection.php");
$get_shops = "SELECT shop_name, shop_address, shop_description FROM shop_owners WHERE 1";
$get_shops_res = mysql_query($get_shops,$link);
if (mysql_num_rows($get_shops_res)<1)
{ //no available shops
	echo "No available shops right now. Sorry for your inconvenience.";
}
else
{ //show the available shops	

	echo "<table cellpadding=3 cellspacing=1 border=1>";
	echo "<tr>";
	echo "<th>SHOP'S NAME</th>";
	echo "<th>SHOP'S ADDRESS</th>";
	echo "<th>A FEW WORDS FOR THE SHOP</th>";
	echo "<th>SELECT A SHOP</th>";
	echo "</tr>";

	while($shops_info = mysql_fetch_array($get_shops_res))
	{
		
		$shop_name = $shops_info['shop_name'];
		
		$shop_address = $shops_info['shop_address'];
		$shop_desc = $shops_info['shop_description'];
		echo "<tr>";
		echo "<th>$shop_name</th>";
		echo "<th>$shop_address</th>";
		echo "<th>$shop_desc</th>";
		echo "<th>"; echo "<a href='ListOfShops2.php?my_shop_name=$shop_name'>" . 'SELECT'.'</a>'."</th>";		
		echo "</tr>";
	}

	
	
	echo "</table>";		
}
?>

</small>
<br>
<div id="button"><a href="User home.php">Go back</a></div>
</div>  
<?php include 'footer.php'; ?>

