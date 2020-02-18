<?php
session_start();
include "dbconnection.php";

$table_id=$_GET["name"];

// The SQL statement that deletes the record
$strSQL = "DELETE FROM history_table WHERE id = '$table_id'";
mysql_query($strSQL);

mysql_close();
header("Location: ListOfHistory.php");
?>
