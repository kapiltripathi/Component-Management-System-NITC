<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
   
<head>
  <title>simplest</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <script src="2.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />

 <script src="1.js"></script>
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
        <ul id="menu" class="nav navbar-nav navbar-right">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="request2.php">Home</a></li>
            <li  class="selected"> <a href="header.php">View Dues</li>
            <li><a href="contact.html">Contact Us</a></li>
 <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
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
 
$conn->close();?>
          </div>
          <div class="sidebar_base"></div>
        </div>
       </div>




</body>
</html>   
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
