<?php
$title='Owner Home';
$description='User Home';  
include 'header3.php';
session_start();
?>

<div id="content">
<div align="center">

<?php echo "<H1> Welcome " . $_SESSION['$username'] . "!</H1>"; ?>
<H2>What would you like to do today?</H2>

<div id="home">
  <ul>
    <li><div id="button"><a href="ListOfPendingOrders.php">Pending orders</a></div></li>
    <li><div id="button"><a href="add_an_item.php">Add item</a></div></li>
    <li><div id="button"><a href="ListOfProducts2.php">Modify menu</a></div></li>
    <li><div id="button"><a href="ListOfProducts3.php">Delete item</a></div></li>
    <li><div id="button"><a href="owner_change_info.php">Edit account</a></div></li>
    <li><div id="button"><a href="Popular2.php">Most popular product</a></div></li>
    <li><div id="button"><a href="plot2.php">View statistics</a></div></li>
    <li><div id="button"><a href="LogOut.php">Log Out</a></div></li>
    <li><div id="button"><a href="OwnerDeleteAccount.php">Delete account</a></div></li>
  </ul>
</div>
  
</div>
</div>  
<?php include 'footer.php'; ?>

