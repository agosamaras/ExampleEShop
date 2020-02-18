<?php
$title='User Home';
$description='User Home';  
include 'header.php';
session_start();
?>

<div id="content">
<div align="center">

<?php echo "<H1> Welcome " . $_SESSION['$username'] . "!</H1>"; ?>
<H2>What would you like to do today?</H2>

<div id="home">
  <ul>
    <li><div id="button"><a href="ListOfShops.php">Make order</a></div></li>
    <li><div id="button"><a href="coffee_shop_change_personal_info.php">Modify Personal Account</a></div></li>
    <li><div id="button"><a href="ListOfHistory.php">Previous orders</a></div></li>
    <li><div id="button"><a href="Popular.php">Most popular products</a></div></li>
    <li><div id="button"><a href="plot1.php">Statistics</a></div></li>
    <li><div id="button"><a href="LogOut.php">Log Out</a></div></li>
    <li><div id="button"><a href="UserDeleteAccount.php">Delete account</a></div></li>
  </ul>
</div>
  
</div>
</div>  
<?php include 'footer.php'; ?>