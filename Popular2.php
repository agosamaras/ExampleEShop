<?php
$title='Most popular product';
$description='';  
include 'header3.php';
?>
<div id="content">
<H1>The Most Popular Item</H1>
<small>
<?php
session_start();
include("dbconnection.php");
$shop_name=$_SESSION['$shop_name'];

echo "<p> The name of the shop is " . $shop_name . "</p>";

$get_items = "select * from items where inShop='" . $shop_name . "' and orders=(select max(orders) from items where inShop='" . $shop_name . "')";

$get_items_res = mysql_query($get_items,$link);

if (mysql_num_rows($get_items_res)<1)
{ //no available items
	echo "No available items right now. Sorry for your inconvenience.";
}
else
{ //show the available items

	echo "<table cellpadding=3 cellspacing=1 border=1>";
	echo "<tr>";
	echo "<th>SHOP'S NAME</th>";
	echo "<th>PRODUCT'S NAME</th>";
	echo "<th>PRODUCT'S PRICE</th>";
	echo "<th>PRODUCT'S CATEGORY</th>";
	echo "<th>A FEW WORDS FOR THE PRODUCT</th>";
	echo "<th>ORDERS</th>";	
	echo "</tr>";
	while($items_info = mysql_fetch_array($get_items_res))
	{
		$item_name = $items_info['name'];
		$item_inshop = $items_info['inShop'];		
		$item_price = $items_info['price'];
		$item_category = $items_info['category'];
		$item_description = $items_info['description'];
		$item_orders = $items_info['orders'];
		echo "<tr>";
		echo "<th>$item_inshop</th>";
		echo "<th>$item_name</th>";
		echo "<th>$item_price</th>";
		echo "<th>$item_category</th>";
		echo "<th>$item_description</th>";
		echo "<th>$item_orders</th>";		
		echo "</tr>";
	}
	echo "</table>";		
	
}


?>
</small>
<br><br>
<div id="button"><a href="Owner home.php">Go back</a></div>
</div>  
<?php include 'footer.php'; ?>
