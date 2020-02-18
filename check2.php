<?php
session_start();
include "dbconnection.php";
$check_user= "SELECT shop_owners.*
FROM shop_owners
WHERE shop_owners.username = '".$_POST['username']."'
AND AES_DECRYPT(shop_owners.password, 'usetheforce') = '".$_POST['password']."' ";
$is_user = mysql_query($check_user , $link) or
die("Problem!" . mysql_error());
$number = mysql_num_rows($is_user);
if($number==0)
{
header("Location: error.php");
}
else
{
$shop_owner = mysql_fetch_array( $is_user);
$name = $shop_owner[1];
$surname = $shop_owner[2];
$username = $shop_owner[3];
$MyMail = $shop_owner[5];
$shop_name = $shop_owner[6];
$MyShopAddress = $shop_owner[7];
$MyPhoneNum = $shop_owner[8];
$MyShopDesc = $shop_owner[9];

$_SESSION['$name']=$shop_owner[1];
$_SESSION['$surname']=$shop_owner[2];
$_SESSION['$username']=$shop_owner[3];
$_SESSION['$e_mail']=$shop_owner[5];
$_SESSION['$shop_name']=$shop_owner[6];
$_SESSION['$shop_address']=$shop_owner[7];
$_SESSION['$phone_number_fax']=$shop_owner[8];
$_SESSION['$shop_description']=$shop_owner[9];

header("Location: Owner home.php");
}
?>
