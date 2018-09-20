<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
include 'db.php';

$roll=$_GET['id'];
$sql= "DELETE FROM capital WHERE compId='$roll'";

mysqli_query($con,$sql);

mysqli_close();

  header("Location: update.php#movie_box2$i"); /* Redirect browser */
   exit();

?>
</body>
</html>