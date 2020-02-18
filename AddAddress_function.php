<?php
session_start();
include("dbconnection.php");

$_SESSION['$address']=$_POST[Address];
$_SESSION['$details']=$_POST[Details];

header("Location: insert_history_table_php.php");
?>

