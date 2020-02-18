<?php
$title='change informations';
$description='';  
include 'header.php';
session_start();
include("dbconnection.php");
if (!strcmp("$_POST[Password]", "$_POST[Confirm_Password]"))
{
	$MyUserName=$_SESSION['$username']; //data taken from check.php after log in
	$MySurName=$_SESSION['$surname'];
	$MyFirstName=$_SESSION['$name'];
	$link = mysql_connect( $hostname , $username , $password ) or
	die("Προσοχή!Πρόβλημα στη σύνδεση με τον server : " . mysql_error());
	mysql_select_db($database,$link);
	mysql_query("SET NAMES utf8",$link);
	$result=mysql_query("select id from customers where username='$MyUserName'  AND surname='$MySurName' AND name='$MyFirstName'");
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
	//default values checking
	mysql_query("UPDATE customers SET name='$_POST[Name]',username='$_POST[Username]',surname='$_POST[Surname]',password = AES_ENCRYPT('$_POST[Password]','usetheforce')
	WHERE id=$res");
	$check_user= "SELECT customers.*
	FROM customers
	WHERE customers.id = '".$_SESSION['$id']."' ";
	$is_user = mysql_query($check_user , $link);
	$customer = mysql_fetch_array( $is_user);
	$_SESSION['$username']=$customer[3];
	$_SESSION['$name']=$customer[1];
	$_SESSION['$surname']=$customer[2];
	mysql_close();
	header("Location: User home.php");
  
	}
}
else
{
	echo "Please confirm your password correctly.";
  include 'footer.php';
	//header("Location: NewCustomer.php");
}

?>
