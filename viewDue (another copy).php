<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
  <title>View Dues</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<style type="text/css">
  
button{
    width: 60%%;
    background-color: #00C6F0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover{
    background-color: #00bbe6;
}

 table {
    background-color: #00C6F0;
    color: white;
    width: 100%;
    height: 100%;
}
</style>

<?php
 include 'db.php';
 include 'stuhead.php';
?>
<div id="content"> 
   
<?php
//$name = $_SESSION['name'];
//$email = $_SESSION['email'];
//$sql5 = "SELECT * FROM student WHERE name='$name' AND email='$email'";
//$result = $conn->query($sql5);
//$row = $result->fetch_assoc();

$rollno = $_SESSION['rollno'];
 $sql = "SELECT * FROM dues WHERE rollno = '$rollno'";


 $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  $i=0;

  echo "<table>
       <tr>
       <th>Roll Number</th>
       <th>Comp ID</th>
       <th>Comp Name</th>
       <th>Quantity</th>
       <th>time</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $cid=$row['compId'];
    $tim=$row['time'];
    $roll=$row['rollno'];
    $number=$row['number'];
    $dID=$row['dID'];
        
    $sql1 = "SELECT * FROM component WHERE compId = '$cid' LIMIT 1";


 $result1 = mysqli_query($con, $sql1);
 $row1 = mysqli_fetch_assoc($result1);
 $name = $row1['name'];
    
         echo "
<div id='movie_box$i' class='dashdiv'>";
echo "<tr>";
echo "<td>".$roll."</td>";
echo "<td>".$cid."</td>";
echo "<td>".$name."</td>";
echo "<td>".$number."</td>";
echo "<td>".$tim."</td>";
echo "</tr>";

$i++;
echo "</div>";
}

}
 else {
    echo "0 results";
}

mysqli_close($con);


?>


  <script>
function selects()
{
document.getElementById("viewDue").className = "selected";
  }
    
 

</script>

</body>
</html>   
