<?php
session_start();
include "dbconnection.php";

$r_way=$_SESSION['$rWay'];
$p_way=$_SESSION['$pWay'];
$detail=$_SESSION['$details'];
$address = $_SESSION['$address'];
$user_name = $_SESSION['$username']; //data taken from check.php after log in
$name_of_item=$_SESSION['$item_name'];
$get_items = "SELECT name, price, category, description, inShop, orders FROM items WHERE name = '$name_of_item'";
$get_items_res = mysql_query($get_items,$link);
$items_info = mysql_fetch_array($get_items_res);

$item_name = $items_info['name'];
$item_price = $items_info['price'];
$item_category = $items_info['category'];
$item_description = $items_info['description'];
$item_shop = $items_info['inShop'];
$item_orders = $items_info['orders'] + 1;

$get_items2 = "SELECT name, surname, username FROM customers WHERE username = '$user_name'";
$get_items_res2 = mysql_query($get_items2,$link);
$items_info2 = mysql_fetch_array($get_items_res2);

$username = $items_info2['name'];
$usersurname = $items_info2['surname'];
$userusername = $items_info2['username'];

$sql="INSERT INTO history_table
VALUES
('','$item_shop','$item_name','$item_category','$item_description','$item_price','$user_name')";
if (!mysql_query($sql,$link))
{
die('Error: ' . mysql_error());
}


$sql="INSERT INTO pending_orders
VALUES
('','$username','$usersurname','$userusername','$address','$item_shop','$item_name',$item_price,'$r_way','$p_way','$detail')";
if (!mysql_query($sql,$link))
{
die('Error: ' . mysql_error());
}

mysql_query("UPDATE items SET orders='$item_orders' WHERE name = '$name_of_item'");

mysql_close($link);
header("Location: User home.php");
?>


