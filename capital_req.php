<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
  ?>
  <!DOCTYPE HTML> 
<html> 
<head>
  <title>Request</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<style type="text/css"> 
 table { 
    background-color: #00C6F0; 
    color: white; 
    width: 60%; 
    height: 75%; 
 } 
 

input[type=submit] { 
    width: 60%%; 
    background-color: #00C6F0; 
    color: white; 
    padding: 14px 20px; 
    margin: 8px 0; 
    border: none; 
    border-radius: 10px; 
    cursor: pointer; 
} 
 
input[type=submit]:hover { 
    background-color: #00bbe6; 
} 
 
</style> 
 
<?php 
 include 'newhead.php'; 
 include 'db.php'; 
?> 
      <div id="content"> 
        <!-- insert the page content here --> 
 
<?php 
 echo  "<h2>Requests</h2>"; 
 $l=$_SESSION['labid'];
 
$sql = "SELECT * FROM capital_req WHERE labId='$l'"; 
 
$result = mysqli_query($con, $sql); 
 
if (mysqli_num_rows($result) > 0) { 
  $i=0; 
 
  echo "<table> 
       <tr> 
       
       <th>Request Number</th> 
       <th>Roll No</th> 
       <th>compid</th> 
       <th>Time</th> 
       
       <th>Accept</th>
        
       <th>Reject</th> 
       
       </tr> 
  "; 
    // output data of each row 
    while($row = mysqli_fetch_assoc($result)) { 
 
    $cid=$row['compId']; 
    $roll=$row['rollno']; 
   
    
    $rn=$row['requestNo']; 
    $tim=$row['time']; 
    $rid=$row['requestId']; 
         echo " 
<div id='movie_box$i' class='dashdiv'>"; 
echo "<tr>"; 

echo "<td>".$rn."</td>"; 
echo "<td>".$roll."</td>"; 
echo "<td>".$cid."</td>"; 
echo "<td>".$tim."</td>"; 







echo "<td><form action='capprove.php' method='post' enctype='multipart/form-data'> 
<input type='hidden' name='requestId' value='$rid' /> 
<input type='hidden' name='page' value='$i' /> 
<input type='submit' name='action' value='Accept'/> 
</form></td>";

echo "<td><form action='capprove.php' method='post' enctype='multipart/form-data'> 
<input type='hidden' name='requestId' value='$rid' /> 
<input type='hidden' name='page' value='$i' /> 
<input type='submit' name='action' value='Reject'/> 
</form></td>"; 

echo "</tr>"; 
/*echo " 
<form action='updatestock.php' method='post' enctype='multipart/form-data'> 
<input type='hidden' name='cid' value='$cid' /> 
<input type='hidden' name='page' value='$i' /> 
<input type='submit' name='action' value='Accept'/>&nbsp&nbsp 
<input type='submit' name='action' value='Reject'/> 
</form> 
<br> 
 
 
 
";*/ 
 
$i++; 
echo "</div>"; 
} 
 
} 
 else { 
    echo "No requests"; 
} 
 
mysqli_close($con); 
 
?> 
 
 
      </div> 
    </div> 
 
</body> 
     <script>
function selects()
{
document.getElementById("capitalreq").className = "selected";
  }
    
</script>
</html>
