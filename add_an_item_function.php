<?php
session_start();
include("dbconnection.php");
$shop_name=$_SESSION['$shop_name']; //data taken from check2.php after log in
$sql="INSERT INTO items (name, price, description, category, inShop, orders)
VALUES
('$_POST[Name]','$_POST[Price]','$_POST[Description]','$_POST[Category]','$shop_name', 0)";
if (!mysql_query($sql,$link))
{
die('Error: ' . mysql_error());
}
mysql_close($link);
header("Location: Owner home.php");
?>
