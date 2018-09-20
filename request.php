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
    padding: 8px 10px; 
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
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
    $startrow = 0;
} else {
  $startrow = (int)$_GET['startrow'];
}

 echo  "<h2>Requests</h2>"; 
 $l=$_SESSION['labid'];
 $sql12 = "SELECT * FROM request WHERE labId='$l'"; 
 
$result12= mysqli_query($con, $sql12);
$cou=mysqli_num_rows($result12); 
$sql = "SELECT * FROM request WHERE labId='$l' LIMIT $startrow ,10"; 
 
$result = mysqli_query($con, $sql); 
 
if (mysqli_num_rows($result) > 0) {

  $i=0; 
 
  echo "<table > 
       <tr> 
       <th>Status</th>
       <th>Request Number</th> 
       <th>Roll Number</th> 
       <th>compid</th> 
       <th>Time</th> 
       <th>Number</th> 
       <th>Accept</th>
       <th>Partial</th> 
       <th>Reject</th> 
       
       </tr> 
  "; 
    // output data of each row 
    while($row = mysqli_fetch_assoc($result)) { 
 
    $cid=$row['compId']; 
    $roll=$row['rollno']; 
    $number=$row['number']; 
    $status=$row['status'];
    $number1=$number-1;
    $rn=$row['requestNo']; 
    $tim=$row['time']; 
    $rid=$row['requestId']; 
         echo " 
<div id='movie_box$i' class='dashdiv'>"; 
echo "<tr>"; 
echo "<td>".$status."</td>";
echo "<td>".$rn."</td>"; 
echo "<td>".$roll."</td>"; 
echo "<td>".$cid."</td>"; 
echo "<td>".$tim."</td>"; 
echo "<td>".$number."</td>";
$l=$_SESSION['labid'];
$sql2 = "SELECT * FROM consumable WHERE compId = '$cid' AND labId = '$l'";
   $result1 = mysqli_query($con,$sql2);
   $query = mysqli_fetch_assoc($result1);
$num2 = $query['number'];
 
 if($num2<$number)
 {
echo "<td>Insufficient Stock</td>";

  $number1=$num2;
 }




else
{
echo "<td><form action='approve.php' method='post' enctype='multipart/form-data'> 
<input type='hidden' name='requestId' value='$rid' /> 
<input type='hidden' name='page' value='$i' /> 
<input type='submit' name='action' value='Accept'/> 
</form></td>";}
echo "<td><form action='approve.php' method='post' enctype='multipart/form-data'>
<input type='number' style='width:100px;' min = '1' max = '$number1' name='num'> 
<input type='hidden' name='requestId' value='$rid' /> 
<input type='hidden' name='page' value='$i' /> 
<input type='submit' name='action' value='Partial'/> 
</form></td>"; 
echo "<td><form action='approve.php' method='post' enctype='multipart/form-data'> 
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
$next=$startrow+10;
if($next<$cou)
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'">Next</a>&nbsp';

$prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
{ 
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">        Previous</a>';
}
 
?> 
 
 
      </div> 
    </div> 
 
</body> 
     <script>
function selects()
{
document.getElementById("requests").className = "selected";
  }
    
</script>
</html>
