<?php
session_start();


if(!isset($_SESSION['email'])){
header ("location:index(1).html");}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Request</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  
 <script src="2.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script src="1.js"></script>
 </head>



<body onload="javascript:selects()">
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Student Menu</a></h1>
        </div>
      </div>
      <div id="menubar" >
        <ul id="menu" class="nav navbar-nav navbar-right">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          
          <li id="srequest"><a href="lab.php">Request</a></li>
<li id="viewDue"><a href="viewDue.php">View Dues</a></li>    
<li id="viewComp"><a href="viewComp.php">View Components</a></li>    
          
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



</body>
</html>   
