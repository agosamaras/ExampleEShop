<?php
$title='Customer Log In';
$description='';  
include 'header.php';
session_start();
?>
<div id="content">
  <H1>Customer Log in</H1>


<form action="check.php" method="post">
Username<br>
<input type="text" size="40" name="username" placeholder="Enter your username"><br>
Password<br>
<input type="password" size="40" name="password" placeholder="Enter your password"><br>
<br>
<input type="submit" value="Sign In"><br>
</form>


</div>
<?php include 'footer.php'; ?>  
