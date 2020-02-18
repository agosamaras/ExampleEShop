<?php
session_start();
include "dbconnection.php";

$result=$_SESSION['$name_item'];

$check_item= "SELECT items.*
FROM items
WHERE items.name = '".$_POST['Name']."' ";
$is_item = mysql_query($check_item , $link) or
die("Problem!" . mysql_error());
$is_item = mysql_fetch_array( $is_item);

if($_POST[Name]=="")
{
$_POST[Name]=$_SESSION['$name_item'];
}
if($_POST[Price]=="")
{
$_POST[Price]=$_SESSION['$price_item'];
}
if($_POST[Description]=="")
{
$_POST[Description]=$_SESSION['$description_item'];
}
mysql_query("UPDATE items SET name='$_POST[Name]', price='$_POST[Price]',description='$_POST[Description]',category='$_POST[Category]'
WHERE name='$result'");

mysql_close();

header("Location: ListOfProducts2.php");
?>
