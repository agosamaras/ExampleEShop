<html>
<link rel="stylesheet" type="text/css" href="css/main.css">
<body>
<?php
session_start();
include("dbconnection.php");
if (!strcmp("$_POST[Password]", "$_POST[Confirm_Password]"))
{
	$MyUserName=$_SESSION['$username']; //data taken from check.php after log in
	$MySurName=$_SESSION['$surname'];
	$MyFirstName=$_SESSION['$name'];
	$MyMail=$_SESSION['$e_mail'];
	$MyShopName=$_SESSION['$shop_name'];
	$MyShopAddress=$_SESSION['$shop_address'];
	$MyPhoneNum=$_SESSION['$phone_number_fax'];
	$MyShopDesc=$_SESSION['$shop_description'];
	$link = mysql_connect( $hostname , $username , $password ) or
	die("Προσοχή!Πρόβλημα στη σύνδεση με τον server : " . mysql_error());
	mysql_select_db($database,$link);
	mysql_query("SET NAMES utf8",$link);
	$result=mysql_query("select id from shop_owners where username='$MyUserName'  AND surname='$MySurName' AND name='$MyFirstName' AND shop_name='$MyShopName'");
	if (mysql_num_rows($result)==0){//test gia to an vrethhke o xrhsths h oxi.Aparaithto gt alliws vgazei error.
		die('Unable to change informations.Try again later!' . mysql_error());
	}
	else{
	$temp_id=mysql_result($result,0);
	echo "Informations in database changed. ID number: ".$temp_id ." ";
	$res=intval ($temp_id ,10);
	//default values checking
	if($_POST[Name]=="")
	{
		$_POST[Name]=$MyFirstName;
	}
	if($_POST[Surname]=="")
	{
		$_POST[Surname]=$MySurName;
	}
	if($_POST[Username]=="")
	{
		$_POST[Username]=$MyUserName;
	}
	if($_POST[e_mail]=="")
	{
		$_POST[e_mail]=$MyMail;
	}
	if($_POST[shop_name]=="")
	{
		$_POST[shop_name]=$MyShopName;
	}
	if($_POST[shop_address]=="")
	{
		$_POST[shop_address]=$MyShopAddress;
	}
	if($_POST[shop_description]=="")
	{
		$_POST[shop_description]=$MyShopDesc;
	}
	if($_POST[phone_number_fax]=="")
	{
		$_POST[phone_number_fax]=$MyPhoneNum;
	}
	//default values checking
	mysql_query("UPDATE shop_owners SET name='$_POST[Name]',username='$_POST[Username]',
	surname='$_POST[Surname]',password = AES_ENCRYPT('$_POST[Password]','usetheforce'),e_mail='$_POST[e_mail]',shop_name='$_POST[shop_name]',
	shop_address='$_POST[shop_address]',shop_description='$_POST[shop_description]',phone_number_fax='$_POST[phone_number_fax]'
	WHERE id=$res");
	$check_user= "SELECT shop_owners.*
	FROM shop_owners
	WHERE shop_owners.id = '".$_SESSION['$id']."' ";
	$is_user = mysql_query($check_user , $link);
	$customer = mysql_fetch_array( $is_user);
	$_SESSION['$username']=$customer[3];
	$_SESSION['$name']=$customer[1];
	$_SESSION['$surname']=$customer[2];
	header("Location: Owner home.php");
	}
}
else
{
	echo "Please confirm your password correctly.";
	//header("Location: NewCustomer.php");
  include 'footer.php';
}
?>
</body>
</html>