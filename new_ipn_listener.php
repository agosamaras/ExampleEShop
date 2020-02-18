<html>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div id="hidden_post" style="float:left; margin-left:80px;">
<br><br>Receive way:
<form>
<input type="radio" name="receive" id="Delivery" value="delivery" checked>Delivery<br>
<input type="radio" name="receive" id="shop"value="coffee shop">Coffee shop<br>
</form>
<form action="order_completion.php" method="post">
<input type="hidden" name="receiveWay" id="myreceive1">
<input type="hidden" name="payer_email" value="<?php echo $_POST['payer_email']; ?>">
<input type="submit" name="submit_button" value="confirm"></div>
</form>
</div>

<script type="text/javascript">
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


<?php
 
// STEP 1: read POST data
 
// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream. 
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
     $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
   $get_magic_quotes_exists = true;
} 
foreach ($myPost as $key => $value) {        
   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
   } else {
        $value = urlencode($value);
   }
   $req .= "&$key=$value";
}
 
 
// Step 2: POST IPN data back to PayPal to validate
 
$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set 
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
    // error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);


// inspect IPN validation result and act accordingly
 
if (strcmp ($res, "VERIFIED") == 0) {
    // The IPN is verified, process it:
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process the notification
 
    // assign posted variables to local variables
    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
	
	if (strcmp($payment_status,'Completed')==0){
	//Payment status completed CALL order_completion
	echo '<script type="text/javascript">';
echo 'function appear1(){';
echo 'a=document.getElementById("hidden_post");';
echo 'a.style.display="inline";}';
echo 'appear1();';
echo '</script> ';
echo 'Your order is '.$res;
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



echo '<script type="text/javascript">';
echo 'function appear1(){';
echo 'a=document.getElementById("hidden_post");';
echo 'a.style.display="inline";}';
echo 'appear1();';
echo '</script> ';


echo 'Your order is '.$res;

	
 
    // IPN message values depend upon the type of notification sent.
    // To loop through the &_POST array and print the NV pairs to the screen:
    foreach($_POST as $key => $value) {
      echo $key." = ". $value."<br>";
    }
} else if (strcmp ($res, "INVALID") == 0) {
    // IPN invalid, log for manual investigation
    echo "The response from IPN was: <b>" .$res ."</b>";
}
?>
</body>
</html>
