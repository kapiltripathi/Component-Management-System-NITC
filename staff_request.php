<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<?php
include 'newhead.php';
include 'db.php';
$labid=$_SESSION['labid'];
?>
<head>
  <title>Request</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script>
function selects()
{
document.getElementById("sndreq").className = "selected";
  }
    
 

</script>
</head>

<fieldset>
<legend align="center" ><h2>  REQUEST FORM </h2></legend>


<center>

<form method="post" action="">

<?php





// Create connection

// Check connection




$sql = "SELECT * FROM consumable where labId='$labid' ORDER BY family";
$result = mysqli_query($con,$sql);
echo "<br><center> Components </center> ";
if (mysqli_num_rows($result) > 0) {
    echo "<br>";
    while($row = mysqli_fetch_assoc($result)){
    echo "<h4> " .$row['family']. "<h4> " .$row['value']. "<h4> " .$row['unit']. "<h4> <input type='number' name=".$row['compId']." min='0' placeholder='0 if not required'> <br>"; 
    //echo "DURATION IN HOURS: <input type='number' name='number[]' min='0'> <br>";
        
echo "<br>";
    }
} else {
    echo "RECORD NOT FOUND";
    exit;
}

?>


</H3>
      <input type="submit" name="sub">
</form>
</fieldset>
  
</center>
<?php

if(isset($_POST['sub'])){



// Create $connection


// set parameters and execute




$sql1 = "SELECT MAX(RequestNo) FROM request";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$requestno = $row1['MAX(RequestNo)'] + 1;


$sql3 = "SELECT * FROM consumable ";
$result3 = mysqli_query($con,$sql3);


if (mysqli_num_rows($result3) > 0) {
    echo "<br><br>";
    while($row = mysqli_fetch_assoc($result3)){
    //echo "<h4> " .$row['name']. "</h4>";
    
    if($_POST[$row['compId']] > 0)
   {

 $status="New";
     $compid=$row['compId'];
     $number=$_POST[$row['compId']];
    $rollno=$_SESSION['rollno'];
    $stmt = "INSERT INTO srequest (staffId, labId, RequestNo, compId, number) VALUES ('$rollno', '$labid', '$requestno', '$compid', '$number')";
    

// set parameters and execute
     
     
    

     mysqli_query($con,$stmt);
$subject = 'Request for component';
 $comment = "The STAFF " .$rollno. " is requesting  for  component " .$compid. " with Quantity ".$number. " ";
 $query = " INSERT INTO comment_fac VALUES (NULL,'$rollno','$labid','$subject','$comment','0',NULL) ";
 $result54= mysqli_query($con, $query);
}

    }
    

   
    
    }
 else {
    echo "RECORD NOT FOUND";
    exit();
}


    

mysqli_close();
header("location:request.php");
}

?>


</body>
</html>   
