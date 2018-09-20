<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }?>
  <!DOCTYPE html>
<html>

<head>
  <title>Admin Menu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<?php
include 'db.php';
include 'newhead.php';
?>

      <div id="content">
        <!-- insert the page content here -->
        <h1>Update Staff</h1><br><br>
        <form method="post" action="">
          Staff ID::<br><br>
           <select name="sid" required>
          <?php $s="select * from staff_incharge";
          $q=mysqli_query($con,$s);
         while($rw=mysqli_fetch_array($q))
           { ?>
              <option value="<?php echo $rw['staffId']; ?>"><?php echo $rw['staffId']; ?></option>
              <?php } ?>
           </select><br><br>
        
          Lab ID::<br><br>
          <select name="lid" required>
          <?php $s="select * from lab";
          $q=mysqli_query($con,$s);
         while($rw=mysqli_fetch_array($q))
           { ?>
              <option value="<?php echo $rw['labId']; ?>"><?php echo $rw['labId']; ?></option>
              <?php } ?>
           </select><br><br>
          <input type="submit" name="submit" value="Update"><br><br>
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
</body>

<?php

if(isset($_POST['submit'])){
 $sid = $_POST['sid'];
 $lid = $_POST['lid'];
 $sql = "UPDATE staff_incharge SET labId='$lid' WHERE staffId='$sid'";
 mysqli_query($con,$sql);
 mysqli_close();
 header("location:admin_home.php");
}
?>
</html>
