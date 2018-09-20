<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<?php
include 'stuhead.php';
?>
<head>
  <title>Request</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<fieldset>
<legend align="center" ><h2>  REQUEST FORM </h2></legend>


<center>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<H3>

LAB: <input type="radio" name="labid" value="ECE1"  /> ECE lab1
     <input type="radio" name="labid" value="ECE2"  /> ECE lab2
     <input type="radio" name="labid" value="ECE3"   checked/> ECE lab3<br>
     <br>
   
  
<br>
<?php



$servername = "localhost";
$username = "root";
$password = "time.org";
$dbname = "component_distribution";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM component";
$result = $conn->query($sql);
echo "<br><center> Components </center> ";
if ($result->num_rows > 0) {
    echo "<br>";
    while($row = $result->fetch_assoc()){
    echo "<h4> " .$row['name']. "<h4> <input type='number' name=".$row['compId']." min='0' placeholder='0 if not required'> <br>"; 
    //echo "DURATION IN HOURS: <input type='number' name='number[]' min='0'> <br>";
        
echo "<br>";
    }
} else {
    echo "RECORD NOT FOUND";
    exit;
}

?>


</H3>
      <input type="submit">
</form>
</fieldset>
  
</center>
<?php

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

// set parameters and execute




$sql1 = "SELECT MAX(RequestNo) FROM request";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$requestno = $row1['MAX(RequestNo)'] + 1;


$sql3 = "SELECT * FROM component ";
$result3 = $conn->query($sql3);


if ($result3->num_rows > 0) {
    echo "<br><br>";
    while($row = $result3->fetch_assoc()){
    //echo "<h4> " .$row['name']. "</h4>";
    
    if($_POST[$row['compId']] > 0)
   {
    $stmt = $conn->prepare("INSERT INTO request (rollno, labId, RequestNo, status, compId, number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiii", $rollno, $labid, $requestno, $status,  $compid, $number);

// set parameters and execute
     
     $labid=$_POST["labid"];
     $status=0;
     $compid=$row['compId'];
     $number=$_POST[$row['compId']];

     $stmt->execute();
}
    }
    

   
    
    }
 else {
    echo "RECORD NOT FOUND";
    exit;
}

require 'phpmailer/PHPMailerAutoload.php';

$hello = "hello";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPDebug  = 0;
$mail->Username = 'rohit29041998@gmail.com';
$mail->Password = 'rohit@895';

$mail->setFrom('rohit29041998@gmail.com', 'admin');
$mail->addAddress('rohit29041998@gmail.com');
$mail->Subject = 'Request for components';
$a = "The Student  " .$rollno. " requested for these comp:\n  COMPID  Quantity \n";
$sql4 = "SELECT * FROM request WHERE RequestNo=".$requestno."";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    
    while($row = $result4->fetch_assoc()){
    
     $a .= "        ".$row["compId"]. "          ".$row["number"]."\n";
}
$mail->Body = $a;
}
if ($mail->send())
   { echo "Mail sent";
    }
    


$conn->close();
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
