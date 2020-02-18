<?php
session_start();
include("dbconnection.php");
if (!strcmp("$_POST[Password]", "$_POST[Confirm_Password]"))
{
	$sql="INSERT INTO shop_owners
	VALUES
	('','$_POST[Name]','$_POST[Surname]','$_POST[Username]',AES_ENCRYPT('$_POST[Password]','usetheforce'),
	'$_POST[Email]','$_POST[Shop_name]','$_POST[Shop_address]','$_POST[Fax]','$_POST[Shop_desc]')";
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
	//header("Location: NewOwner.php");
}
?>
