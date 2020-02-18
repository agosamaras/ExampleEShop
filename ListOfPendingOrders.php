<?php
$title='Pending orders';
$description='';  
include 'header.php';
?>
<div id="content">

<H1>List of pending orders</H1>
<H2>Pending orders table:</H2>

<small>
<?php
session_start();
include("dbconnection.php");

$shop_name=$_SESSION['$shop_name']; //data taken from check2.php after log in
$get_items = "SELECT id, name, surname, username, address, shop_name, item, price, rway, pway, details FROM pending_orders WHERE shop_name = '$shop_name'";
$get_items_res = mysql_query($get_items,$link);
if (mysql_num_rows($get_items_res)<1)
{ //no available items
	echo "There aren't any pending orders.";
}
else
{ //show the available items

	echo "<table cellpadding=3 cellspacing=1 border=1>";
	echo "<tr>";
	echo "<th>USER NAME</th>";
	echo "<th>USER SURNAME</th>";
	echo "<th>USER USERNAME</th>";
	echo "<th>USER ADDRESS</th>";
	echo "<th>ITEM'S NAME</th>";
	echo "<th>ITEM'S PRICE</th>";
	echo "<th>COSTUMER PAYS BY</th>";
	echo "<th>COSTUMER: WAY TO RECEIVE ITEM</th>";
	echo "<th>ORDER DETAIL</th>";
	echo "<th>DELETE, ORDER IS DONE</th>";
	echo "</tr>";
	while($items_info = mysql_fetch_array($get_items_res))
	{
		$user_name = $items_info['name'];
		$user_surname = $items_info['surname'];
		$user_username = $items_info['username'];
		$user_address = $items_info['address'];
		$item_name = $items_info['item'];
		$item_price = $items_info['price'];
		$item_receive = $items_info['rway'];
		$item_pay = $items_info['pway'];
		$item_pay = $items_info['pway'];
		$item_detail = $items_info['details'];
		$table_id = $items_info['id'];
		echo "<tr>";
		echo "<th>$user_name</th>";
		echo "<th>$user_surname</th>";
		echo "<th>$user_username</th>";
		echo "<th>$user_address</th>";
		echo "<th>$item_name</th>";
		echo "<th>$item_price</th>";
		echo "<th>$item_pay</th>";
		echo "<th>$item_receive</th>";
		echo "<th>$item_detail</th>";
		echo "<th>"; echo "<a href='PendingOrdersDelete.php?name=$table_id'>" . 'CONFIRM'.'</a>'."</th>";
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
