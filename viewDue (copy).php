<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    
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
    width: 60%;
    height: 75%;
}
</style>
    

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
          <li><a href="request2.php">Home</a></li>
            <li  class="selected"> <a href="viewDue.php">View Dues</li>
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
           <center> <h3>AKANSH KUMAR</h3><hr>
                    <h4>B150398CS </h4> <br> 
                        </center>
            
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

$sql5 = "SELECT * FROM student WHERE rollno='B150895CS'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();
 echo "<h5> Email-" .$row['email']. "</h5> <br>";
 echo "<h5> Contact NO -" .$row['phone']. "</h5><br>";
$sql6 = "SELECT COUNT(DISTINCT RequestNo) AS COUNT FROM `request` WHERE rollno='B150895CS'";
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


  
<?php
 include 'db.php';
//$name = $_SESSION['name'];
//$email = $_SESSION['email'];
//$sql5 = "SELECT * FROM student WHERE name='$name' AND email='$email'";
//$result = $conn->query($sql5);
//$row = $result->fetch_assoc();
$rollno = 'B150895CS';
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
document.getElementById("View Dues").className = "selected";
  }
    
 

</script>

</body>
</html>   
