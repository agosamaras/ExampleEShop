<?php
session_start();
$title='Order completion';
$description='';  
include 'header.php';
?>

<div id="content">
<?php
include "dbconnection.php";
$my_item_name=$_SESSION['$item_name'];
$temp= "SELECT category FROM items WHERE  items.name= '$my_item_name'";
$temp2 = mysql_query($temp , $link) or
die("Problem!" . mysql_error());
$number = mysql_num_rows($temp2);
if($number==0)
{
header("Location: error.php");
}
else
{
$my_item_category = mysql_fetch_array( $temp2);
$check_category = $my_item_category[0];
}
/*Order completion
This file must inform history,inform most popular product function,inform the coffee shop that a new order arrived*/
/*We have taken our Variales and now we simply have to create a table in database */

 $bigString=$_SERVER['HTTP_REFERER'];

 $IfUrlListener=substr($bigString, 0, 47);

 

echo "<br>";
if (strcmp($IfUrlListener,'http://localhost/E-COFFEE_SHOP/ipn_listener.php')==0){
//ORDER ERXETAI APO PAY PAL
echo "<br>";
$receiveWay=$_POST['receiveWay'];
$payer_mail=$_POST['payer_email'];

echo "ORDER'S INFORMATION: <br>";
echo "You will receive your order via: ".$receiveWay."<br>"; 
echo "Payer's e-mail: ".$payer_mail."<br>";


}
else{
//ORDER ERXETAI APO TO choose_way_to_receive_order.php
$receiveWay=$_POST['receiveWay'];
$paymentWay=$_POST['paymentWay'];
echo "You will receive your order via: ";
echo $receiveWay."<br>";
echo "You will pay your order at: ";
echo $paymentWay."<br>";

}

$_SESSION['$rWay']=$_POST['receiveWay'];
$_SESSION['$pWay']=$_POST['paymentWay'];

?>

<!-- CREATE THE TABLE WITH THE ORDERS -->
<form action="AddAddress.php" method="post" STYLE="text-decoration: none">
<input id="order" value="Add Address & details" style="height: 50px; width: 150px;" type="submit">
<input id="selectOption" type="hidden" name="selection">
</form>

</div>  
<?php include 'footer.php'; ?>