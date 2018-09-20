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
 include 'newhead.php';
 include 'db.php';
?>
      <div id="content">
      
<?php

$id=$_POST['requestId'];


$sql = "SELECT * FROM request WHERE requestId = '$id'";

$result = mysqli_query($con,$sql);

$query = mysqli_fetch_assoc($result);

$roll = $query['rollno'];

$labId = $query['labId'];

$compId = $query['compId'];

$number = $query['number'];

$time = $query['time'];



if($_POST['action'] == 'Accept')
{

$num = $number; 

       

       



$qwe="SELECT * FROM dues where requestId= '$id'";
$ru= mysqli_query($con,$qwe);

if (mysqli_num_rows($ru) > 0) { 

$as=mysqli_fetch_assoc($ru);
$n=$as['number'];
$upd=$n+$num;

$sql1 = "UPDATE dues SET number = '$upd' WHERE requestId = '$id'";
   $result5= mysqli_query($con,$sql1);


   

   $sql2 = "SELECT * FROM consumable WHERE compId = '$compId'";
   $result1 = mysqli_query($con,$sql2);
   $query1 = mysqli_fetch_assoc($result1);
   $num3 = $query1['number'];
   $num4 = $num3 - $num;



   $sql3 = "UPDATE consumable SET number = '$num4' WHERE compId ='$compId'";
   $result2 = mysqli_query($con,$sql3);

 $sql14 = "DELETE FROM request WHERE requestId = '$id'";
   $result54= mysqli_query($con,$sql14);


}

else
{


  
   $sql = "INSERT INTO dues VALUES (NULL,'$roll','$compId','$number','$time','0','$id')";
   $result = mysqli_query($con,$sql);
   
   
   $sql1 = "DELETE FROM request WHERE requestId = '$id'";
   $result5= mysqli_query($con,$sql1);


   $sql2 = "SELECT * FROM consumable WHERE compId = '$compId'";
   $result1 = mysqli_query($con,$sql2);
   $query = mysqli_fetch_assoc($result1);
   $num2 = $query['number'];
   $num3 = $num2 - $number;



   $sql3 = "UPDATE consumable SET number = '$num3' WHERE compId ='$compId'";
   $result2 = mysqli_query($con,$sql3);

}
   
   $i=$_POST['page'];
  

$subject = 'Request Accepted';
 $comment = "The request  for  comp: " .$compId. " with Quantity ".$number. " is accepted";
 $query = " INSERT INTO comments VALUES (NULL,'$roll','$labId','$subject','$comment','0',NULL) ";
 $result54= mysqli_query($con, $query);
   header("Location: request.php#movie_box$i"); /* Redirect browser */
   exit();
   
} 

else if($_POST['action']== 'Reject')
{
   echo "rejected!";
   echo "<br>".$roll;
   echo "<br>".$labId;
   echo "<br>".$compId;
   echo "<br>".$number;
   echo "<br>".$time;
   
   $sql2 = "DELETE FROM request WHERE requestId = '$id'";

   $result2 = mysqli_query($con,$sql2);
$subject = 'Request Decline';
 $comment = "The request  for  comp: " .$compId. " with Quantity ".$number. " is accepted";
 $query = " INSERT INTO comments VALUES (NULL,'$roll','$labId','$subject','$comment','0',NULL) ";
 $result54= mysqli_query($con, $query);

   mysqli_close($con);



   header("Location: request.php"); /* Redirect browser */
   exit();
   
}

else if($_POST['action']=='Partial')
 {
      
 $num = $number; 

       $number1 = $_POST['num'];

       $num2=$num - $number1;

$qwe="SELECT * FROM dues where requestId= '$id'";
$ru= mysqli_query($con,$qwe);

if (mysqli_num_rows($ru) > 0) { 

$as=mysqli_fetch_assoc($ru);
$n=$as['number'];
$upd=$n+$number1;

$sql1 = "UPDATE dues SET number = '$upd' WHERE requestId = '$id'";
   $result5= mysqli_query($con,$sql1);


   $sql1 = "UPDATE request SET number = '$num2' WHERE requestId = '$id'";
   $result5= mysqli_query($con,$sql1);

   $sql2 = "SELECT * FROM consumable WHERE compId = '$compId'";
   $result1 = mysqli_query($con,$sql2);
   $query1 = mysqli_fetch_assoc($result1);
   $num3 = $query1['number'];
   $num4 = $num3 - $number1;



   $sql3 = "UPDATE consumable SET number = '$num4' WHERE compId ='$compId'";
   $result2 = mysqli_query($con,$sql3);



}


else
{

    
  
    $sql12 = "INSERT INTO dues VALUES (NULL,'$roll','$compId','$number','$time','0','$id')";
   $result13 = mysqli_query($con,$sql12);
   
   
   $sql1 = "UPDATE request SET number = '$num2', status = 'Partial' WHERE requestId = '$id'";
   $result5= mysqli_query($con,$sql1);


   $sql2 = "SELECT * FROM consumable WHERE compId = '$compId'";
   $result1 = mysqli_query($con,$sql2);
   $query1 = mysqli_fetch_assoc($result1);
   $num3 = $query1['number'];
   $num4 = $num3 - $number1;



   $sql3 = "UPDATE consumable SET number = '$num4' WHERE compId ='$compId'";
   $result2 = mysqli_query($con,$sql3);
 }
   
   $i=$_POST['page'];
$subject = 'Request Accepted';
 $comment = "The request  for  comp: " .$compId. " with Quantity ".$number. " is partially accepted";
 $query = " INSERT INTO comments VALUES (NULL,'$roll','$labId','$subject','$comment','0',NULL) ";
 $result54= mysqli_query($con, $query);

  
   mysqli_close($con);



   header("Location: request.php#movie_box$i"); /* Redirect browser */
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
document.getElementById("requests").className = "selected";
  }
    
 

</script>


</html>

