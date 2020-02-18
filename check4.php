<?php
session_start();
include "dbconnection.php";
$check_user= "SELECT customers.*
FROM customers
WHERE AES_DECRYPT(customers.password, 'usetheforce') = '".$_POST['password']."' ";
$is_user = mysql_query($check_user , $link) or
die("Problem!" . mysql_error());
$number = mysql_num_rows($is_user);
if($number==0)
{
header("Location: error.php");
}

$username=$_SESSION['$username']; //data taken from check.php after log in

// The SQL statement that deletes the record
$strSQL = "DELETE FROM customers WHERE username = '$username'";
mysql_query($strSQL);

$strSQL = "DELETE FROM history_table WHERE user_name = '$username'";
mysql_query($strSQL);

mysql_close();
header("Location: index.php");
?>
