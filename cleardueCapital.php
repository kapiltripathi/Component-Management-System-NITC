<!DOCTYPE html>
<html>
<head>
  <title>Clear Dues</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<?php
 include 'newhead.php';
 include 'db.php';
?>
      <div id="content">
      
<?php

$dId = $_POST['dID'];


$sql = "SELECT * FROM capital_dues WHERE dID = '$dId'";
//echo "$dId";
$result = mysqli_query($con,$sql);

$query = mysqli_fetch_assoc($result);

$rollno = $query['rollno'];
          
$compId = $query['compId'];
          
$time = $query['time'];
          
$labId = $query['labId'];


if($_POST['action'] == 'Clear Dues')
{
   $sql = "DELETE FROM capital_dues WHERE dID = '$dId'";

  $result = mysqli_query($con,$sql);
  
     echo "You have cleared your dues!";
   $sql2 = "UPDATE capital SET number='1' WHERE compId='$compId' LIMIT 1";
   
   $result2 = mysqli_query($con,$sql2);
    
   mysqli_close($con);
require 'phpmailer/PHPMailerAutoload.php';

$hello = "hello";
$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPDebug  = 0;
$mail->Username = 'component.management@gmail.com';
$mail->Password = 'wanted@13';

$mail->setFrom('component.management@gmail.com', 'department');
$mail->addAddress('rohit29041998@gmail.com');
$mail->Subject = 'return notificaion';
$mail->Body = "The capital comp: " .$compId. " has been returned by  " .$roll. " ";

$mail->send();

// echo "<script type='text/javascript'>alert('You have cleared your dues!')</script>";
   echo "<script type='text/javascript'>
    alert('You have cleared your dues!');
    window.location.href='return.php';
    </script>";/* Redirect browser */ /* Redirect browser */
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
  <script>
function selects()
{
document.getElementById("return").className = "selected";
  }
    
 

</script>


</html>

