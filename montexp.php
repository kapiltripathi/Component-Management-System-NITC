<?php session_start();
$l=$_SESSION['labid'];
?>
<!DOCTYPE HTML> 
<html> 
<head>
  <title>Expense</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<style type="text/css"> 
 table { 
    background-color: #00C6F0; 
    color: white; 
    width: 80%; 
    height: 75%; 
 } 
 

input[type=submit] { 
    width: 80%%; 
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
 
 
$sql = "SELECT * FROM bill"; 
 
$result = mysqli_query($con, $sql); 
 
if (mysqli_num_rows($result) > 0) 
{ 
	echo "<center>";
    echo "<table> 
       <tr>
    
       <th>billID</th>
       <th>Date</th> 
       <th>Description</th> 
       <th>cost</th>

       </tr> ";
	echo"</center>"; 
    // output data of each row 
    while($row = mysqli_fetch_assoc($result)) { 
 
    $billID=$row['billID']; 
    $date=$row['date']; 
    $description=$row['description']; 
    $cost= $row['cost'];
    echo " <div id='movie_box' class='dashdiv'>"; 
    echo "<tr>"; 
    echo "<td align='center'>".$billID."</td>";
    echo "<td align='center'>".$date."</td>"; 
    echo "<td align='center'>".$description."</td>"; 
    echo "<td align='center'>".$cost."</td>"; 
    echo "</tr>";
    echo "</div>"; 
        
} 
 
} 
 else { 
    echo "No requests"; 
} ?>
 <center>
 <fieldset> 
<legend align="center" ><h2>  BILL FORM </h2></legend><hr>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
SELECT MONTH : <input type = "month" name = "from" > <br> <br>

<input type="submit" name="GetExpense" value="Get Expense">
</form>
</fieldset>
</center>

<?php
mysqli_close($con); 
 $sum='0';
if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username = "root";
$password = "time.org";
$dbname = "component_distribution";
// Create $connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$from = $_POST["from"];
$from .= "-01";
$to = $_POST["from"];
$to .= "-31";
$month = $_POST["from"];
$sql3 = "SELECT SUM(cost) FROM bill WHERE MONTH(date)='$month' AND labId='$l'";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    
    while($row = $result3->fetch_assoc()){
     echo "<br><br>";
     $sum =$sum+$row["SUM(cost)"];
     echo "<i><b><center>Total Expense for '$month' is Rs. '$sum'  </center></b></i>";
     echo "<br> <br>";
}
}
$conn->close();
} 

?> 
 
 
      </div> 
    </div> 
 
</body> 
     <script>
function selects()
{
document.getElementById("montexp").className = "selected";
  }
    
</script>
</html>
