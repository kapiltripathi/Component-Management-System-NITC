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

$roll=$_GET['fid'];
$lab=$_GET['lid'];
$i=$_GET['page'];
$sql= "DELETE FROM faculty_labid WHERE facultyid='$roll' AND labid='$lab'";

mysqli_query($con,$sql);



mysqli_close();

  header("Location: unassign.php#movie_box$i"); /* Redirect browser */
   exit();

?>
</body>
</html>