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
$i=$_POST['page'];
$sql= "DELETE FROM student WHERE rollno='$roll'";

mysqli_query($con,$sql);

mysqli_close();

  header("Location: removeuser.php#movie_box$i"); /* Redirect browser */
   exit();

?>
</body>
</html>