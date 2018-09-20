<?php 
session_start(); 
 if(!isset($_SESSION['email']))
  {
   header("location:index(1).html");
  }

?>
<!DOCTYPE HTML>
<html>

<?php
include 'stuhead.php';
include 'db.php';
$labid=$_GET['id'];
?>
<head>
  <title>Request</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<fieldset>
<legend align="center" ><h2>  REQUEST FORM </h2></legend>


<center>

<form method="post" action="">

<?php





// Create connection

// Check connection




$sql = "SELECT * FROM capital where labId='$labid' ORDER BY name";
$result = mysqli_query($con,$sql);
echo "<br><center> Components </center> ";
if (mysqli_num_rows($result) > 0) {
    echo "<br>";
    while($row = mysqli_fetch_assoc($result)){
    echo "<h4>".$row['name']. "<h4> " .$row['description']. "<h4> <input type='checkbox' name=".$row['compId']." value='1'> <br>"; 
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




$sql1 = "SELECT MAX(RequestNo) FROM capital_req";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$requestno = $row1['MAX(RequestNo)'] + 1;


$sql3 = "SELECT * FROM capital";
$result3 = mysqli_query($con,$sql3);


if (mysqli_num_rows($result3) > 0) {
    echo "<br><br>";
    while($row = mysqli_fetch_assoc($result3)){
    //echo "<h4> " .$row['name']. "</h4>";
    
    if($_POST[$row['compId']]==1)
   {

     $compid=$row['compId'];
     
    $rollno=$_SESSION['rollno'];
    $stmt = "INSERT INTO capital_req (rollno, labId, requestNo,  compId) VALUES ('$rollno', '$labid', '$requestno',  '$compid')";
    

// set parameters and execute
     
     
    

     mysqli_query($con,$stmt);
$subject = 'Request for component';
 $comment = " " .$rollno. " is requesting  for  comp: " .$compid. " ";
 $query = " INSERT INTO comment_sta VALUES (NULL,'0','$labid','$subject','$comment','0',NULL) ";
 $result54= mysqli_query($con, $query);
}

    }
    

   
    
    }
 else {
    echo "RECORD NOT FOUND";
    exit();
}


    

mysqli_close();
header("location:lab.php");
}

?>
<script>
function selects()
{
document.getElementById("srequest").className = "selected";
  }
    
 

</script>

</body>
</html>   
