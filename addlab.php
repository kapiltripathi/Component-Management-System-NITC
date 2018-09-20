<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }?>
  <!DOCTYPE html>
<html>
<head>
  <title>Admin Menu</title>
</head>
<style type="text/css">
 table {
    background-color: #00C6F0;
    color: white;
    width: 80%;
    height: 75%;
 }

 input[type=text], select,input[type=number] ,input[type=email]{
    width: 80%%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 80%%;
    background-color: #00C6F0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #00bbe6;
}

</style>
<?php
include 'db.php';
include 'newhead.php';
?>
<head>
  <title>Admin Menu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>


      <div id="content">
        <!-- insert the page content here -->
        <h1>Add Lab</h1><br><br>
        <form method="post" action="">
        	Lab ID::<br><br>
        	<input type="text" name="roll" required><br><br>
        	Name::<br><br>
        	<input type="text" name="name" required><br><br>
        	Description::<br><br>
        	<input type="text" name="desc" required><br><br>
        	Location::<br><br>
        	<input type="text" name="loc" required ><br><br>
        	<br><br>
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

<?php
if(isset($_POST['submit']))
{
	$roll = $_POST['roll'];
	$name = $_POST['name'];
	$email = $_POST['desc'];
	$ph = $_POST['loc'];

	$sql ="INSERT INTO lab VALUES ('$roll','$name','$email','$ph')";

	mysqli_query($con,$sql);

    mysqli_close($con);

    header("location:admin_home.php");
    exit();
}



?>
</body>
</html>
