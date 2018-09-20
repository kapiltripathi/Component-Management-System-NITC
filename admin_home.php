<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
?>
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
include 'newhead.php';
?>


      <div id="content">
        <!-- insert the page content here -->
        <h1><a href="addstudent.php">Add Student</a></h1>
        <h1><a href="addincharge.php">Add In-Charge</a></h1>
        <h1><a href="addfaculty.php">Add Faculty</a></h1>
        <h1><a href="addlab.php">Add Lab</a></h1>
        <h1><a href="assignlab.php">Assign Lab</a></h1>
        <h1><a href="unassign.php">Unassign Lab</a></h1>
        <h1><a href="updatestaff.php">Update Staff</a></h1>
        <h1><a href="removeuser.php">Remove User</a></h1>
        <h1><a href="removelab.php">Remove Lab</a></h1>

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
</html>