<?php
$title='User Home';
$description='User Home';  
include 'header.php';
session_start();
?>

<div id="content">
<div align="center">

<?php echo "<H1> There was an error" . mysql_error(). "</H1>"; ?>
<H2>please try again</H2>
</div>
</div>
<?php include 'footer.php'; ?>