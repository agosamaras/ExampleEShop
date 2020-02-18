<?php
$title='Owner Log In';
$description='';  
include 'header3.php';
session_start();
?>
<div id="content">
  <H1>Owner Log in</H1>
  
<form action="check2.php" method="post">
Username<br>
<input type="text" size="40" name="username" placeholder="Enter your username"><br>
Password<br>
<input type="password" size="40" name="password" placeholder="Enter your password"><br>
<br>
<button>Submit</button><br>
</form>

</div>
<?php include 'footer.php'; ?>  
