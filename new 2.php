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
          <li class="selected"><a href="request2.php">Request</a></li>
<li> <a href="viewDue.php">View Dues</li>
          
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
            $email = $_SESSION['staffId'];
$sql5 = "SELECT * FROM staff_incharge WHERE staffId='$email'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();
$rollno = $row["phone"];
               echo "  <center> <h3>" .$name."</h3><hr></center>";
               echo "  <center> <h4>" .$rollno."</h4></center> <br> ";
               echo "<h5> Email-" .$row['email']. "</h5> <br>";
               echo "<h5> Contact NO -" .$row['phone']. "</h5><br>";

 
$conn->close();
     ?>       
     
           

            <!--h5>February 1st, 2014</h5>
            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p-->
          </div>
          <div class="sidebar_base"></div>
        </div>
       
        
          <div class="sidebar_base"></div>
        
      </div>


</body>
</html>   
