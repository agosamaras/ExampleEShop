<?php

$hostname = "localhost";

$database = "e-coffee shop";

$username = "root";

$password = "";

$link = mysqli_connect( $hostname , $username , $password ) or

die("Προσοχή!Πρόβλημα στη σύνδεση με τον server : " . mysql_error());

mysql_select_db($database,$link);

mysql_query("SET NAMES utf8");

?>
