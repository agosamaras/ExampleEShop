<?php
$title='Add item';
$description='';  
include 'header3.php';
session_start();
?>
<div id="content">
<H1>Add item</H1>

<form action="add_an_item_function.php" method="post">
Name<br>
<input type="text" size="40" maxlength="150" name="Name" placeholder="Enter product's name" required><br>
Price<br>
<input type="double" size="40" maxlength="150" name="Price" placeholder="Enter product's price" pattern="^\d+\.\d{2}$" required><br>
Description<br>
<input type="text" size="40" maxlength="150" name="Description" placeholder="Enter product's description" required><br>
Category<br>
<select name="Category">
  <option>Hot beverages</option>
  <option>Cold beverages</option>
  <option>Spirits</option>
  <option>Food</option>
  <option>Other</option>
</select>
<br><br>
<input type="submit" value="Submit">
</form>

</div>
<?php include 'footer.php'; ?> 