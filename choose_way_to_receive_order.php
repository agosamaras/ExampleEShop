<?php
$title='Way to pay';
$description='';  
include 'header.php';
session_start();
$name_of_item=$_GET["my_item_name"];
$_SESSION['$item_name']=$name_of_item;
?>

<script type="text/javascript">
//kwdikas gia na allazei to output tou Radio button On click
window.onload = function() {

    	var ex1 = document.getElementById('Delivery');
    	var ex2 = document.getElementById('shop');
  

    	ex1.onclick = handler;
    	ex2.onclick = handler;
    	    }
		function handler(){
		
		var off_payment_method = document.getElementsByName('receive');
var ischecked_method = false;
for ( var i = 0; i < off_payment_method.length; i++) {
    if(off_payment_method[i].checked) {
        ischecked_method = true;
		document.getElementById("myreceive").innerHTML = document.getElementById(off_payment_method[i].id).value;
		document.getElementById("receiveWay").value = document.getElementById(off_payment_method[i].id).value;
	}
}
if(!ischecked_method)   { //payment method button is not checked
    alert("Please choose Offline Payment Method");
}
}


</script>



<?php
include "dbconnection.php";

$user_name = $_SESSION['$username']; //data taken from check.php after log in
$name_of_item=$_GET["my_item_name"];

$get_items = "SELECT name, price, category, description, inShop FROM items WHERE name = '$name_of_item'";
$get_items_res = mysql_query($get_items,$link);
$items_info = mysql_fetch_array($get_items_res);

$item_name = $items_info['name'];
$item_price = $items_info['price'];
$item_category = $items_info['category'];
$item_description = $items_info['description'];
$item_shop = $items_info['inShop'];

$get_email="SELECT e_mail FROM shop_owners WHERE shop_name='$item_shop'";
$res=mysql_query($get_email,$link);
$shop_info=mysql_fetch_array($res);
$shop_e_mail=$shop_info['e_mail'];

?>


<script type="text/javascript">
function appear1(){
payment='shop';
a=document.getElementById("hidden_post");
a.style.display='inline';
document.getElementById("paymentWay").value = payment;
d=document.getElementById("paypal_post");
d.style.visibility="hidden";

d2=document.getElementById("Confirm");
d2.style.display="block";
document.getElementById("payment").innerHTML = payment;

var off_payment_method = document.getElementsByName('receive');
var ischecked_method = false;
for ( var i = 0; i < off_payment_method.length; i++) {
    if(off_payment_method[i].checked) {
        ischecked_method = true;
		document.getElementById("myreceive").innerHTML = document.getElementById(off_payment_method[i].id).value;
		document.getElementById("receiveWay").value = document.getElementById(off_payment_method[i].id).value;
    }
}
if(!ischecked_method)   { //payment method button is not checked
    alert("Please choose Offline Payment Method");
}
}

function appear2(){
payment='delivery';
document.getElementById("paymentWay").value = payment;
a=document.getElementById("hidden_post");
a.style.display='inline';

d=document.getElementById("paypal_post");
d.style.visibility="hidden";

d2=document.getElementById("Confirm");
d2.style.display="block";
document.getElementById("payment").innerHTML = payment;



var off_payment_method = document.getElementsByName('receive');
var ischecked_method = false;
for ( var i = 0; i < off_payment_method.length; i++) {
    if(off_payment_method[i].checked) {
        ischecked_method = true;
		document.getElementById("myreceive").innerHTML = document.getElementById(off_payment_method[i].id).value;
		document.getElementById("receiveWay").value = document.getElementById(off_payment_method[i].id).value;
    }
}
if(!ischecked_method)   { //payment method button is not checked
    alert("Please choose Offline Payment Method");
}

}
</script>

<div id="content">
<H1>Choose the way you want to recive and pay order</H1>

<!-- COFEE SHOP -->
<p><div id="choose" style="float:left; margin-right:40px"><b><u>Coffee shop</u></b><br><?php echo 'PRICE: '.$items_info['price'].'EUR';?><br><button onclick="appear1()";>Choose</button></div></p>

<!-- DELIVERY BOY -->
<p><div style="float:left; margin-right:40px"><b><u>Delivery boy</u></b><br><?php echo 'PRICE: '.$items_info['price'].'EUR';?><br><button onclick="appear2()";>Choose</button></div></p>


<!-- PAYPAL -->
<div id="paypal_post" style="float:left; margin-right:80px;"><b><u>PAYPAL</u></b><br> 
<?php echo 'PRICE: '.$items_info['price'].'EUR';?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="<?php echo $shop_e_mail ;?>">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $items_info['name']; ?>">
<input type="hidden" name="amount" value="<?php echo $items_info['price']; ?>">
<input type="hidden" name="currency_code" value="EUR">

<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</div>
<br><br><br><br>
<!-- DELIVERY -->
<div id="hidden_post">
<H2>Receive way:</H2>
<form>
<input type="radio" name="receive" id="Delivery" value="Delivery" checked>Delivery<br>
<input type="radio" name="receive" id="shop"value="Coffee shop">Coffee shop<br>
</form>
</div>
<br>

<!-- FINALLY -->
<div id="Confirm"; style="display:none; ">
<HR>
<H2>Finally</H2> 
<b><div style="float:left;">Payment way:</b><div id="payment"></div></div><b><div style="float:left; margin-left:80px; margin-right:80px;">Receive way:</b><div id="myreceive"></div></div>
<form action="order_completion.php" method="post">
<input type="hidden" name="receiveWay" id="receiveWay">
<input type="hidden" name="paymentWay" id="paymentWay">
<input type="submit" name="submit_button" value="confirm">
</form>
</div>
</div>
  
<?php include 'footer.php'; ?>