<?php
$title='Customer Sign up';
$description='Customer Sign up';  
include 'header.php';
session_start();
?>
<div id="content">

<H1>Create your account</H1>

<form action="NewCustomer2.php" method="post">
Name<br>
<input type="text" size="40" maxlength="150" name="Name" placeholder="Enter your name" 
pattern="[A-Z][a-z]+" title="One uppercase letter followed by other lowercase." required><br>
Surname<br>
<input type="text" size="40" maxlength="150" name="Surname" placeholder="Enter your surname" 
pattern="[A-Z][a-z]+" title="One uppercase letter followed by other lowercase." required><br>
Username<br>
<input type="text" size="40" maxlength="150" name="Username" placeholder="Enter the username you want" 
pattern="^[A-Za-z0-9_]{1,15}$" title="the username should have 1-15 characters" required><br>
Password<br>
<input type="password" size="40" maxlength="150" name="Password" placeholder="Enter your password" 
pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
title="The password should contain at least 8 characters with uppercase, lowercase letters and a
number/special character." required><br>
Confirm Password<br>
<input type="password" size="40" maxlength="150" name="Confirm_Password" placeholder="Enter your password" 
pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
title="The password should contain at least 8 characters with uppercase, lowercase letters and a
number/special character." required><br>
<br>
<input type="submit" value="Submit">
</form>


</div>
<?php include 'footer.php'; ?>          