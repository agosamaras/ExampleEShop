<?php
$title='e-coffee shop';
$description='Home page';
include 'header.php';
?>

<div id="content">  
<h1>Sing in & Sing up</h1>

<div align="center">
<H2>Are you a customer?</H2>
<div id="home">
<ul>
<li><div id="button"><a href="CostumerLogIn.php">Sign In</a></div></li>
<li><div id="button"><a href="NewCustomer.php">Sign Up</a></div></li>
</ul>
</div>


<br /><br /><br /><br /><br />

<H2>Are you a shop owner?</H2>
<div id="home">
<ul>
<li><div id="button"><a href="OwnerLogIn.php">Sign In</a></div></li>
<li><div id="button"><a href="NewOwner.php">Sign Up</a></div></li>
</ul>
</div> 
</div> 
</div>
<?php include 'footer.php'; ?>


