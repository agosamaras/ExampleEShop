<?php
$title='Owner Home';
$description='User Home';  
include 'header3.php';
?>

<div id="content">
<H1>Select one of the products </H1>
<H2>Please select which product you would like to modify:</H2>


<?php
session_start();
include "dbconnection.php";

if($_POST['Category'] == "-- none --")
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{
	$get_items = "SELECT name, price, category, description, inShop  FROM items WHERE category = '".$_POST['Category']."' AND inShop = '".$_SESSION['$shop_name']."'";
	$get_items_res = mysql_query($get_items,$link);
	if (mysql_num_rows($get_items_res)<1)
	{ //no available items
		echo "No available items in this category at this moment. Sorry for your inconvenience.";
	}
	else
	{ //show the available items

		echo "<table cellpadding=3 cellspacing=1 border=1>";
		echo "<tr>";
		echo "<th>PRODUCT'S NAME</th>";
		echo "<th>PRODUCT'S PRICE</th>";
		echo "<th>PRODUCT'S CATEGORY</th>";
		echo "<th>A FEW WORDS FOR THE PRODUCT</th>";
		echo "<th>SELECT THE ITEM</th>";
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
}
?>
<br>
<br>
<div id="button"><a href="Owner home.php">Back to personal page</a></div>
</div>  
<?php include 'footer.php'; ?>
