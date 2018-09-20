<?php
session_start();
if(!isset($_SESSION['email'])){
header ("location:index(1).html");}
?>
<!DOCTYPE HTML>
<html>



<body onload="javascript:selects()">
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Student Menu</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          
          <li id="srequest"><a href="lab.php">Request</a></li>
<li id="viewDue"><a href="viewDue.php">View Dues</a></li>    
<li id="viewComp"><a href="viewComp.php">View Components</a></li>    
          
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
  $name = $_SESSION['name'];
            $email = $_SESSION['email'];
$rollno = $_SESSION['rollno'];
$phone = $_SESSION["phone"];
               echo "  <center> <h3>" .$name."</h3><hr></center>";
               echo "  <center> <h4>" .$rollno."</h4></center> <br> ";
               echo "<h5> Email-" .$email. "</h5> <br>";
               echo "<h5> Contact NO -" .$phone. "</h5><br>";?>
               <!--button onclick="window.location.href='/index(1).html'">Logout</buttton-->
               <!--button onclick="signOut()" class="btn btn-danger">SignOut</button-->
               <a href="yo.php" >Signout</a>
          </div>
          <div class="sidebar_base"></div>
        </div>
       </div>


</body>
</html>   
