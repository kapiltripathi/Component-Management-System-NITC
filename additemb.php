<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
  ?>
  <?php
include 'db.php';
if(isset($_POST['submit']))
{
 if($_POST['state']=="con"){
$value = $_POST['value'];
$unit = $_POST['unit'];
$family = $_POST['family'];
$number = $_POST['number'];
$des = $_POST['desc1'];
$labid = $_SESSION['labid'];


$sql= "INSERT INTO consumable VALUES (NULL,'$value','$unit','$family','$labid','$des','$number')";

mysqli_query($con,$sql);
}

else if($_POST['state']=="cap")
{
	$name=$_POST['name'];
	$des= $_POST['desc2'];
	$labid= $_SESSION['labid'];
	$sql1 = "INSERT INTO capital VALUES (NULL,'$name','$des','$labid')";

	mysqli_query($con,$sql1);
}
mysqli_close($con);

header("location:stock.php");
exit();
}
else
{
	header("location:newitem.php");
	exit();
}
?>
