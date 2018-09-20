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
$sql= "DELETE FROM faculty WHERE facultyid='$roll'";

mysqli_query($con,$sql);

$sql1 = "DELETE FROM faculty_labid WHERE facultyid = '$roll'";

mysqli_query($con,$sql1);

mysqli_close();

  header("Location: removeuser.php#movie_box3$i"); /* Redirect browser */
   exit();

?>
</body>
</html>