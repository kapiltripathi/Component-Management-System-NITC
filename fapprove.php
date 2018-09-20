  <?php
   session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }?>
  <!DOCTYPE html>
<html>
  <meta name="keywords" content="website keywords, website keywords" />
  <meta name="description" content="website description" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <title>Approve</title>
<head>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<?php
  include 'db.php';
?>
      <div id="content">
      
<?php

$id=$_POST['requestId'];


$sql = "SELECT * FROM srequest WHERE requestId = '$id'";

$result = mysqli_query($con,$sql);

$query = mysqli_fetch_assoc($result);

$roll = $query['staffId'];

$labId = $query['labId'];

$compId = $query['compId'];

$number = $query['number'];

$time = $query['time'];



if($_POST['action'] == 'Accept')
{


 $sql14 = "DELETE FROM srequest WHERE requestId = '$id'";
   $result54= mysqli_query($con,$sql14);
   
   $i=$_POST['page'];
  
$subject = 'APPROVAL FOR PURCHASE';
 $comment = "Request  for  comp: " .$compId. " with Quantity ".$number. " is accepted";
 $query1 = " INSERT INTO comment_sta VALUES (NULL,'$roll','$labId','$subject','$comment','0',NULL) ";
 $result= mysqli_query($con, $query1);
   mysqli_close($con);
   header("Location: see_request.php#movie_box$i"); /* Redirect browser */
   exit();

}
else
{
 $sql14 = "DELETE FROM srequest WHERE requestId = '$id'";
   $result54= mysqli_query($con,$sql14);
   
   $i=$_POST['page'];
  
   $subject = 'REJECTION FOR PURCHASE';
 $comment = "Request  for  comp: " .$compId. " with Quantity ".$number. " is denied";
 $query1 = " INSERT INTO comment_sta VALUES (NULL,'$roll','$labId','$subject','$comment','0',NULL) ";
 $result= mysqli_query($con, $query1);
mysqli_close($con);
   header("Location: see_request.php#movie_box$i"); /* Redirect browser */
   exit();



}






   
  
  
?>

      </div>
    </div>
   <!--   <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php">Home</a> | <a href="request.php">Request</a> | <a href="stock.php">Stock</a> | <a href="return.php">Return</a>
      | <a href="due.php">Dues</a> </p>
      <p>Copyright &copy; simplestyle_blue_trees | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
  -->
</body>
  


</html>

