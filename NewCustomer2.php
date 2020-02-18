<?php
session_start();
include("dbconnection.php");
if (!strcmp("$_POST[Password]", "$_POST[Confirm_Password]"))
{
	$sql="INSERT INTO customers
	VALUES
	('','$_POST[Name]','$_POST[Surname]','$_POST[Username]', AES_ENCRYPT('$_POST[Password]','usetheforce'))";
	if (!mysql_query($sql,$link))
	{
	die(header("Location: error.php"));
	}
	mysql_close($link);
	header("Location: index.php");
}
else
{
	echo "Please confirm your password correctly.";
	//header("Location: NewCustomer.php");
}
?>
