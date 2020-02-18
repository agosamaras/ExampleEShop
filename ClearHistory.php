<?php
session_start();
include "dbconnection.php";

$username=$_SESSION['$username']; //data taken from check.php after log in

// The SQL statement that deletes the record
$strSQL = "DELETE FROM history_table WHERE user_name = '$username'";
mysql_query($strSQL);

mysql_close();
header("Location: ListOfHistory.php");
?>