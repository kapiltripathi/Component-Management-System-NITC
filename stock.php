<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
  ?>
  <!DOCTYPE HTML>
<html>
<head>
  <title>Stock</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<style type="text/css">
 table {
    background-color: #00C6F0;
    color: white;
    width: 80%;
    height: 75%;
}
</style>
 
<?php
 include 'newhead.php';
 include 'db.php';

?>

  <div id="content">
        <!-- insert the page content here -->
        <h1>Stock</h1>  
<?php
if($_SESSION['type']==1){
 echo  '<h1><a href="newitem.php">Add Component</a></h1>';
 echo  '<h1><a href="update.php">Update</a></h1>';}    
?>
<?php
 $l=$_SESSION['labid'];
$sql = "SELECT * FROM consumable WHERE labId='$l'";

$result = mysqli_query($con, $sql);

echo "<h2>Consumable</h2>";

if (mysqli_num_rows($result) > 0) {
  $i=0;

  echo "
  <table>
       <tr>
       <th>ID</th>
       <th>Value</th>
       <th>Unit</th>
       <th>Family</th>
       <th>Number</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $cid=$row['compId'];
    $name=$row['value'];
    $type=$row['unit'];
    $number=$row['family'];
    $lid=$row['number'];
         echo "
<div id='movie_box$i' class='dashdiv'>";
echo "<tr>";
echo "<td>".$cid."</td>";
echo "<td>".$name."</td>";
echo "<td>".$type."</td>";
echo "<td>".$number."</td>";
echo "<td>".$lid."</td>";
echo "</tr>";
/*echo "
<form action='updatestock.php' method='post' enctype='multipart/form-data'>
<input type='hidden' name='cid' value='$cid' />
<input type='hidden' name='page' value='$i' />
<input type='submit' name='action' value='Accept'/>&nbsp&nbsp
<input type='submit' name='action' value='Reject'/>
</form>
<br>



";*/

$i++;
echo "</div>";
}
echo "</table>";
}
 else {
    echo "0 results";
}


$sql = "SELECT * FROM capital WHERE labId='$l'";

$result = mysqli_query($con, $sql);
echo "<h2>Capital</h2>";

if (mysqli_num_rows($result) > 0) {
  $i=0;
  echo "<table>
       <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Description</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $cid=$row['compId'];
    $name=$row['name'];
    $type=$row['description'];
         echo "
<div id='movie_box$i' class='dashdiv'>";
echo "<tr>";
echo "<td>".$cid."</td>";
echo "<td>".$name."</td>";
echo "<td>".$type."</td>";
echo "</tr>";
/*echo "
<form action='updatestock.php' method='post' enctype='multipart/form-data'>
<input type='hidden' name='cid' value='$cid' />
<input type='hidden' name='page' value='$i' />
<input type='submit' name='action' value='Accept'/>&nbsp&nbsp
<input type='submit' name='action' value='Reject'/>
</form>
<br>



";*/

$i++;
echo "</div>";
}
echo "</table>";
}
 else {
    echo "0 results";
}
mysqli_close($con);


?>
   
      </div>
  </div>
  <!--    <div id="content_footer"></div>
    <div id="footer">
     <p><a href="index.php">Home</a> | <a href="request.php">Request</a> | <a href="stock.php">Stock</a> | <a href="return.php">Return</a>
     | <a href="due.php">Dues</a> </p>
      <p>Copyright &copy; simplestyle_blue_trees | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
 -->     
  </div>
    <script>
function selects()
{
document.getElementById("stock").className = "selected";
  }
    
 

</script>
</body>
</html>
