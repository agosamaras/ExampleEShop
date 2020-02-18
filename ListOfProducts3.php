<?php
$title='List of products';
$description='';  
include 'header3.php';
?>
<div id="content">
<H1>Delete product</H1>
<H2>View by category:</H2>
<form action="Sort_items_engine3.php" method="post">
<select name="Category">
  <option>-- none --</option>
  <option>Hot beverages</option>
  <option>Cold beverages</option>
  <option>Spirits</option>
  <option>Food</option>
  <option>Other</option>
</select>
<input type="submit" value="Submit">


<H2>Please select which product you would like to modify:</H2>
<small><small>
<?php
session_start();
include("dbconnection.php");
$shop_name=$_SESSION['$shop_name']; //data taken from check2.php after log in
$get_items = "SELECT name, price, category, description, inShop  FROM items WHERE inShop = '$shop_name'";
$get_items_res = mysql_query($get_items,$link);
if (mysql_num_rows($get_items_res)<1)
{ //no available items
	echo "No available items right now. Sorry for your inconvenience.";
}
else
{ //show the available items

	echo "<table cellpadding=3 cellspacing=1 border=1>";
	echo "<tr>";
	echo "<th>PRODUCT'S NAME</th>";
	echo "<th>PRODUCT'S PRICE</th>";
	echo "<th>PRODUCT'S CATEGORY</th>";
	echo "<th>A FEW WORDS FOR THE PRODUCT</th>";
	echo "<th>DELETE AN ITEM</th>";
	echo "</tr>";
	while($items_info = mysql_fetch_array($get_items_res))
	{
		$item_name = $items_info['name'];
		$item_price = $items_info['price'];
		$item_category = $items_info['category'];
		$item_description = $items_info['description'];
		echo "<tr>";
		echo "<th>$item_name</th>";
		echo "<th>$item_price</th>";
		echo "<th>$item_category</th>";
		echo "<th>$item_description</th>";
		echo "<th>"; echo "<a href='ItemDelete.php?name=$item_name'>" . 'DELETE'.'</a>'."</th>";
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
