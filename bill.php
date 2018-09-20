<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }?>

<!DOCTYPE HTML>
<html>
<head>

  <title>Staff Menu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script>
function selects()
{
document.getElementById("bill").className = "selected";
  }
    
 

</script>
</head>

<?php
include 'newhead.php';
include 'db.php';
?>
<style type="text/css">
 table {
    background-color: #00C6F0;
    color: white;
    width: 80%;
    height: 75%;
 }

 input[type=text], select,input[type=number],input[type=date] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 80%%;
    background-color: #00C6F0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #00bbe6;
}

</style>



<center>
<h2>  BILL FORM </h2>
<form method="post" action="">
<H3>
BILL ID: <input type="text" name="billID"><br><br>

DESC: <input type="text" name = "description"><br> <br>


<?php

$l=$_SESSION['labid'];

$sql = "SELECT * FROM consumable WHERE labId='$l'";
$result = mysqli_query($con,$sql);

echo "<br><center> Components With Quantity </center> ";
if (mysqli_num_rows($result) > 0) {
    echo "<br>";
    while($row = mysqli_fetch_assoc($result)){
    echo "<h4> " .$row['family']." - " .$row['value']." " .$row['unit']. "<h4> <input type='number' name=".$row['compId']." min='0' placeholder='0 if not required'> <br>"; 
    //echo "DURATION IN HOURS: <input type='number' name='number[]' min='0'> <br>";
        
echo "<br>";
    }
} else {
    echo "RECORD NOT FOUND";
    exit();
}
?>

COST : <input type="number" name = "cost"> <br> <br>
BILL DATE : <input type = "date" name = "date" > <br>
</H3>
      <input type="submit" name="submit" value="Submit">
</form>
  
</center>
<?php
if(isset($_POST['submit'])){


	$billID=$_POST["billID"];
	$date=$_POST["date"];
	$description=$_POST["description"];
	$cost=$_POST["cost"];
  $sql34 = "INSERT INTO bill (billID, date, description, cost, labId) VALUES ('$billID', '$date', '$description', '$cost','$l')";
 mysqli_query($con,$sql34);
	//$number=$_POST[$row['compId']];
$sql3 = "SELECT * FROM consumable";
$result3 = mysqli_query($con,$sql3);
if (mysqli_num_rows($result3) > 0) {
    
    while($row = mysqli_fetch_assoc($result3)){
    //echo $_POST[$row['compId']];
    
    if($_POST[$row['compId']] > 0)
   {
    //echo $_POST[$row['compId']];
   
    

     $billID=$_POST["billID"];
     $compId=$row['compId'];
     $quantity=$_POST[$row['compId']];
      $stmt = "INSERT INTO bill_component (billID, compId, quantity) VALUES ('$billID', '$compId', '$quantity')";
    mysqli_query($con,$stmt);

   $sql9 = "UPDATE consumable SET number= number + '$quantity'  WHERE compId = '$compId'";
   mysqli_query($con,$sql9);
    }
    }
  
mysqli_close($con);
}
}
?>


</body>
  
</html>  

