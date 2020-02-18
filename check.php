<?php
session_start();
include "dbconnection.php";
$check_user= "SELECT customers.*
FROM customers
WHERE customers.username = '".$_POST['username']."'
AND AES_DECRYPT(customers.password, 'usetheforce') = '".$_POST['password']."' ";
$is_user = mysql_query($check_user , $link) or
die("Problem!" . mysql_error());
$number = mysql_num_rows($is_user);
if($number==0)
{
header("Location: error.php");
}
else
{
$customer = mysql_fetch_array( $is_user);
$name = $customer[1];
$surname = $customer[2];
$username = $customer[3];

$_SESSION['$username']=$customer[3];
$_SESSION['$name']=$customer[1];
$_SESSION['$surname']=$customer[2];
header("Location: User home.php");
}
?>
