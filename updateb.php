<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
  ?>
  <?php
include 'db.php';

$size = count($_POST['number']);  

// start a loop in order to update each record 
$i = 0; 

while ($i < $size) { 
// define each variable 
$number = $_POST['number'][$i]; 
$id = $_POST['id'][$i]; 



// do the update and print out some info just to provide some visual feedback 
$query = "UPDATE consumable SET number='$number' WHERE compId='$id' LIMIT 1"; 
mysqli_query($con,$query) or die ("Error in query: $query"); 

++$i; 

}
header("location:stock.php"); 
mysqli_close($con); 
?>