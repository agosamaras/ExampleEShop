<?php
$title='Owner Sign up';
$description='Owner Sign up';  
include 'header3.php';
session_start();
?>
<div id="content">  
<H1>Create your account</H1>

<form action="NewOwner2.php" method="post">
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
E-mail<br>
<input type="text" size="40" maxlength="150" name="Email" placeholder="example@example.gr" 
pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" required><br>
Shop's name<br>
<input type="text" size="40" maxlength="150" name="Shop_name" placeholder="Enter your shop's name" 
pattern="[A-Z][a-z]+" title="One uppercase letter followed by other lowercase." required><br>
Shop's address<br>
<input type="text" size="40" maxlength="150" name="Shop_address" placeholder="Enter your shop's address"
required><br>
Phone number / Fax<br>
<input type="text" size="40" maxlength="150" name="Fax" placeholder="Enter your phone number/fax" 
pattern="[0-9]{10}" title="The phone number should have 10 digits" required><br>
Shop's description<br>
<input type="text" size="40" maxlength="150" name="Shop_desc" placeholder="A few words for your shop"><br>
<br>
<input type="submit" value="Submit">

</div>
<?php include 'footer.php'; ?>