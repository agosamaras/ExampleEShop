<?php
$title='Informations change';
$description='';  
include 'header3.php';
session_start();
?>
<div id="content">
  <H1>Change your information</H1>

<form action="owner_change_info_function.php" method="post">

Name<br>
<input type="text" size="40" maxlength="150" name="Name" placeholder="Enter your name" 
pattern="[A-Z][a-z]+" title="One uppercase letter followed by other lowercase." ><br>

Surname<br>
<input type="text" size="40" maxlength="150" name="Surname" placeholder="Enter your surname" 
pattern="[A-Z][a-z]+" title="One uppercase letter followed by other lowercase." ><br>

Username<br>
<input type="text" size="40" maxlength="150" name="Username" placeholder="Enter the username you want" 
pattern="^[A-Za-z0-9_]{1,15}$" title="the username should have 1-15 characters" ><br>
E-mail<br>
<input type="text" size="40" maxlength="150" name="e_mail" placeholder="Enter your email address"><br>

Shop name<br>
<input type="text" size="40" maxlength="150" name="shop_name" placeholder="Enter new shop name"><br>

Shop address<br>
<input type="text" size="40" maxlength="150" name="shop_address" placeholder="Enter new shop address"><br>

Phone/fax number<br>
<input type="text" size="40" maxlength="150" name="phone_number_fax" placeholder="Enter new phone number"><br>

Shop description<br>
<input type="text" size="40" maxlength="150" name="shop_description" placeholder="Tell us about your shop"><br>

Password<br>
<input type="password" size="40" maxlength="150" name="Password" placeholder="Enter your password" 
pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
title="The password should contain at least 8 characters with uppercase, lowercase letters and a
number/special character." required><br> <!-- the password is always required for safety reasons-->
Confirm Password<br>
<input type="password" size="40" maxlength="150" name="Confirm_Password" placeholder="Enter your password" 
pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
title="The password should contain at least 8 characters with uppercase, lowercase letters and a
number/special character." required><br> <!-- the password is always required for safety reasons-->
<br>
<input type="submit" value="Submit">
</form>

</div>
<?php include 'footer.php'; ?>  