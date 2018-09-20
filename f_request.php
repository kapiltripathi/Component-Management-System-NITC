<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
 include 'db.php';
  if($_SESSION['type']==3)
  {
    $_SESSION['type2']=3;
    $_SESSION['type']=2;
 $email= $_SESSION['email'];
    $sql1 = "SELECT * FROM faculty where email='$email'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

   if ($result1->num_rows > 0)  
     {
      $_SESSION['name'] = $row1["name"];
      $_SESSION['rollno'] = $row1["facultyid"];
      $_SESSION['facultyid'] = $row1["facultyid"];
      $_SESSION['phone'] = $row1['phoneno'];
      $_SESSION['type'] = 2;
      $_SESSION['email'] =$email;
    // here enter the faculty's homepage
     }
  }
 
?>
<!DOCTYPE html>
<html>

<head>
  <title>Faculty Menu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
 <script src="2.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script src="1.js"></script></head>
<body onload="javascript:selects()">
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="f_request.php">Faculty Menu</a></h1>
        </div>
      </div>
    
<div id="menubar">
        <ul id="menu" class="nav navbar-nav navbar-right">

  
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
         <?php  
           $email=$_SESSION['email'];
            echo "  <center> " .$email."<hr></center>";
          ?>
          <button>Log Out!</button>
          </div>
          <div class="sidebar_base"></div>
        </div>
       </div>

      <div id="content">
        <!-- insert the page content here -->
        <form method="post" action="">
          
          Lab ID::<br><br>
          <select name="lid" required>
          <?php 
          $fid=$_SESSION['rollno'];
          $s="select * from faculty_labid where facultyid='$fid'";
          $q=mysqli_query($con,$s);
         while($rw=mysqli_fetch_array($q))
           { ?>
              <option value="<?php echo $rw['labid']; ?>"><?php echo $rw['labid']; ?></option>
              <?php } ?>
           </select><br><br>
          
          <input type="submit" name="submit" value="Add"><br><br>
        </form>
      </div>
    </div>
 <!--     <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php">Home</a> | <a href="request.php">Request</a> | <a href="stock.php">Stock</a> | <a href="return.php">Return</a>
      | <a href="due.php">Dues</a> </p>
      <p>Copyright &copy; simplestyle_blue_trees | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
  -->
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
<?php
if(isset($_POST['submit']))
{
  $l=$_POST['lid'];
 $_SESSION['labid']=$l;
 header("location:see_request.php");
 mysqli_close($con);
 exit();
}
?>
