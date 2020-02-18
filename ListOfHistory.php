<?php
$title='List of history';
$description='';  
include 'header.php';
?>
<div id="content"> 
 
<H1>Your history table</H1>


<small>
<?php
session_start();
include("dbconnection.php");

$user_name = $_SESSION['$username']; //data taken from check.php after log in
$get_items = "SELECT id, shop_id, product_id, product_category, product_info, product_price FROM history_table WHERE user_name = '$user_name'";
$get_items_res = mysql_query($get_items,$link);
if (mysql_num_rows($get_items_res)<1)
{ //no available items
	echo "No items in history table.";
}
else
{ //show the available items

	echo "<table cellpadding=3 cellspacing=1 border=1>";
	echo "<tr>";
	echo "<th>PRODUCT'S NAME</th>";
	echo "<th>PRODUCT'S PRICE</th>";
	echo "<th>PRODUCT'S CATEGORY</th>";
	echo "<th>A FEW WORDS FOR THE PRODUCT</th>";
	echo "<th>IN SHOP</th>";
	echo "<th>DELETE ORDER</th>";
	echo "</tr>";
	while($items_info = mysql_fetch_array($get_items_res))
	{
		$item_name = $items_info['product_id'];
		$item_price = $items_info['product_price'];
		$item_category = $items_info['product_category'];
		$item_description = $items_info['product_info'];
		$item_shop = $items_info['shop_id'];
		$table_id = $items_info['id'];
		echo "<tr>";
		echo "<th>$item_name</th>";
		echo "<th>$item_price</th>";
		echo "<th>$item_category</th>";
		echo "<th>$item_description</th>";
		echo "<th>$item_shop</th>";
		echo "<th>"; echo "<a href='history_table_delete.php?name=$table_id'>" . 'DELETE'.'</a>'."</th>";
		echo "</tr>";
	}
	echo "</table>";		
	
}
?>
</small>
<br>
<div id="button"><a href="ClearHistory.php">Clear history</a></div>
<div id="button"><a href="User home.php">Go back</a></div>
</div>
<?php include 'footer.php'; ?>




