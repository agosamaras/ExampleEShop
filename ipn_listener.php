<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<script type="text/javascript">
//kwdikas gia na allazei to output tou Radio button On click
window.onload = function() {

    	var ex1 = document.getElementById('Delivery');
    	var ex2 = document.getElementById('shop');
  

    	ex1.onclick = handler;
    	ex2.onclick = handler;
    	

    }

    function handler() {
    	var off_payment_method = document.getElementsByName('receive');
var ischecked_method = false;
for ( var i = 0; i < off_payment_method.length; i++) {
    if(off_payment_method[i].checked) {
        ischecked_method = true;
		document.getElementById("myreceive").innerHTML = document.getElementById(off_payment_method[i].id).value;
		document.getElementById("myreceive1").value = document.getElementById(off_payment_method[i].id).value;
    }
}
if(!ischecked_method)   { //payment method button is not checked
    alert("Please choose Offline Payment Method");
}
    }
</script>

<div id="hidden_post" style="float:left; margin-left:80px;">
<br><br>Receive way:
<form>
<input type="radio" name="receive" id="Delivery" value="delivery" >Delivery<br>
<input type="radio" name="receive" id="shop"value="coffee shop">Coffee shop<br>
</form>
Yoy will receive : <div id='myreceive'></div>
<form action="order_completion.php" method="POST">
<input type="hidden" name="receiveWay" id="myreceive1">
<input type="hidden" name="payer_email" value="<?php echo $_POST['payer_email']; ?>">
<input type="submit" name="submit_button" value="confirm">
</form>


</div>

<?php

$my_file = 'file.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
$data="";
$url="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate";
foreach($_POST as $key => $value){

  $data=$data.'&'.$key.'='.$_POST[$key];
}

fwrite($handle,$data);
echo $data;
fwrite($handle,'DN PAIRNEI');


fwrite($handle,PHP_EOL);







$ch = curl_init('http://localhost/E-COFFEE_SHOP/ipn_call.html');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);

$resp = curl_exec($ch);


curl_close($ch);
fwrite($handle,$resp);
fclose($handle);

$RESPONSE='verified';
//Thewroume oti h metavlhth RESPONSE einai h apanhsh tou paypal kai einai VERIFY

if (strcmp($RESPONSE,'verified')==0){
$mail=$_POST['payer_email'];
$payment_status=$_POST['payment_status'];


if (strcmp($payment_status,'Completed')==0){
	//Payment status completed CALL order_completion
	echo "SUPER BIEN <br>";
	echo '<script type="text/javascript">';
echo 'function appear1(){';
echo 'a=document.getElementById("hidden_post");';
echo 'a.style.display="inline";}';
echo 'appear1();';
echo '</script> ';
echo 'Your order is '.$RESPONSE;
	}
	else if (strcmp($payment_status,'Pending')==0){
	//Pending
	echo "Pending <br>";
	}
	else{
	echo "Failed<B>";
	}
	/*CHECKS NEED TO BE DONE
	Check that the "txn_id" is not a duplicate to prevent a fraudster from using reusing an old, completed transaction
Validate that the "receiver_email" is an email address registered in your PayPal account, to prevent the payment from being sent to a fraudster's account
Check other transaction details such as the item number and price to confirm that the price has not been changed*/





}




?>






</body>
</html>

