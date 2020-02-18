<?php
session_start();
include "dbconnection.php";
$check_user= "SELECT shop_owners.*
FROM shop_owners
WHERE AES_DECRYPT(shop_owners.password, 'usetheforce') = '".$_POST['password']."' ";
$is_user = mysql_query($check_user , $link) or
die("Problem!" . mysql_error());
$number = mysql_num_rows($is_user);
if($number==0)
{
header("Location: error.php");
}

$username=$_SESSION['$username']; //data taken from check2.php after log in
$shop_name=$_SESSION['$shop_name']; //data taken from check2.php after log in

// The SQL statement that deletes the record
$strSQL = "DELETE FROM shop_owners WHERE username = '$username'";
mysql_query($strSQL);

$strSQL = "DELETE FROM items WHERE inShop = '$shop_name'";
mysql_query($strSQL);

$strSQL = "DELETE FROM pending_orders WHERE username = '$username'";
mysql_query($strSQL);

mysql_close();
header("Location: Home page.php");
?>
