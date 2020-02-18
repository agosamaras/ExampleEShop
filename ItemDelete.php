<?php
session_start();
include "dbconnection.php";

$name_of_item=$_GET["name"];

// The SQL statement that deletes the record
$strSQL = "DELETE FROM items WHERE name = '$name_of_item'";
mysql_query($strSQL);

mysql_close();
header("Location: ListOfProducts3.php");
?>
