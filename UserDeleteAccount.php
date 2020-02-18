<?php
$title='Delete account';
$description='Delete account';  
include 'header.php';
session_start();
?>

<div id="content">
<H1>Delete account</H1>
<p>Are you sure you want to delete your account? Confirm with your password</p>
<br>
<form action="check4.php" method="post">
Password<br>
<input type="password" size="40" name="password" placeholder="Enter your password"><br>
<br>
<button>Submit</button><br>
</form>

</div>  
<?php include 'footer.php'; ?>