<?php
$title='Add address';
$description='';  
include 'header.php';
session_start();

$_SESSION['$order_detail']=$_POST['selection'];
echo $_SESSION['$order_detail'];//EDW EINAI TELIKWS H METAVLHTH SOU POU LEEI AN 8ELOUME TON KAFE ME ZAXARH H XWRIS KLP
?>
<div id="content">
<H1>Please write the address of the delivery!</H1>
<br>
<form action="AddAddress_function.php" method="post">
Address<br>
<input type="text" size="40" maxlength="150" name="Address" placeholder="Enter your address" required><br>
Enter details (e.g double coffee, medium sugar etc)
<input type="text" size="40" maxlength="150" name="Details" placeholder="Enter details"><br>
<br>
<input type="submit" value="Submit">
</form>

</div>
<?php include 'footer.php'; ?> 
