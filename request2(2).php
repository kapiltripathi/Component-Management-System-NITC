<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>simplest</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><span class="logo_colour">COMPONENT MANAGEMENT SYSTEM</span></h1>
          <!--h2>Simple. Contemporary. Website Template.-->
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.html">Home</a></li>
          
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
        
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
  $name = $_SESSION['name'];
            $email = $_SESSION['email'];
$sql5 = "SELECT * FROM student WHERE name='$name' AND email='$email'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();
$rollno = $row["rollno"];
               echo "  <center> <h3>" .$name."</h3><hr></center>";
               echo "  <center> <h4>" .$rollno."</h4></center> <br> ";
               echo "<h5> Email-" .$row['email']. "</h5> <br>";
               echo "<h5> Contact NO -" .$row['phone']. "</h5><br>";
$sql6 = "SELECT COUNT(DISTINCT RequestNo) AS COUNT FROM `request` WHERE status=0 AND rollno='$rollno'";
$result = $conn->query($sql6);
$row = $result->fetch_assoc();
 echo "<h5> Request Pending :-" .$row['COUNT']. "</h5><br><hr>";
 
$conn->close();
     ?>       
     
           

            <!--h5>February 1st, 2014</h5>
            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p-->
          </div>
          <div class="sidebar_base"></div>
        </div>
       
        
          <div class="sidebar_base"></div>
        
      </div>

<fieldset>
<legend align="center" ><h2>  REQUEST FORM </h2></legend>


<center>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<H3>

LAB: <input type="radio" name="labid" value="124"   id="lab1"/> ECE lab1
     <input type="radio" name="labid" value="123"  id="lab2"/> ECE lab2
     <input type="radio" name="labid" value="23"   id="lab3" checked/> ECE lab3<br>
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

</body>
</html>   
