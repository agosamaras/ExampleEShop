<?php
$title='Item modify';
$description='';  
include 'header3.php';
session_start();

include "dbconnection.php";
$name_of_item=$_GET["name"];
$_SESSION['$name_item']=$name_of_item;

$get_items = "SELECT price, description FROM items WHERE name = '$name_of_item'";
$get_items_res = mysql_query($get_items,$link);
$items_info = mysql_fetch_array($get_items_res);
$_SESSION['$price_item']=$items_info['price'];
$_SESSION['$description_item']=$items_info['description'];
?>
<div id="content">
<H1>Make your modifications</H1>
<br>
<form action="item_modify_function.php" method="post">
Name<br>
<input type="text" size="40" maxlength="150" name="Name" placeholder="Enter product's name"><br>
Price<br>
<input type="double" size="40" maxlength="150" name="Price" placeholder="Enter product's price" pattern="^\d+\.\d{2}$"><br>
Description<br>
<input type="text" size="40" maxlength="150" name="Description" placeholder="Enter product's description"><br>
Category<br>
<select name="Category">
  <option>Hot beverages</option>
  <option>Cold beverages</option>
  <option>Spirits</option>
  <option>Food</option>
  <option>Other</option>
</select>
<br>
<input type="submit" value="Submit">
</form>

</div>
<?php include 'footer.php'; ?> 