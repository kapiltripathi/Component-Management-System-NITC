<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }?>
  <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
include 'db.php';

$roll=$_GET['id'];
$i=$_GET['page'];
$sql= "DELETE FROM lab WHERE labId='$roll'";

mysqli_query($con,$sql);

$sql1 = "DELETE FROM faculty_labid WHERE labid = '$roll'";

mysqli_query($con,$sql1);

mysqli_close();

  header("Location: removelab.php#movie_box$i"); /* Redirect browser */
   exit();

?>
</body>
</html>