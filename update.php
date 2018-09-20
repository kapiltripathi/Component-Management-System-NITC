<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Stock</title>
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
  
input[type=submit]{
    width: 80%%;
    background-color: #00C6F0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover{
    background-color: #00bbe6;
}

</style>

<?php
// Connect to server and select database. 
include 'db.php';
include 'newhead.php';

$l=$_SESSION['labid'];
$sql="SELECT * FROM consumable WHERE labId='$l'"; 
$result=mysqli_query($con,$sql); 

// Count table rows 
$count=mysqli_num_rows($result); 
?> 

<div id="content">
        <!-- insert the page content here -->
        <h2>Consumable:</h2>  

<form name="form1" method="post" action="updateb.php"> 
<tr> 
<td> 
<table width="100%"  cellpadding="3"> 
       <tr>
       <th>Component ID</th>
       <th>Value</th>
       <th>Unit</th>
       <th>Family</th>
       <th>Number</th>
       </tr>

<?php 
while($rows=mysqli_fetch_array($result)){ 

?> 

<tr> 
<td><?php echo $rows['compId']; ?></td>
<input name="id[]" type="hidden" value="<?php echo $rows['compId']; ?>">  
<td><?php echo $rows['value']; ?></td>
<td><?php echo $rows['unit']; ?></td>
<td><?php echo $rows['family']; ?></td>
<td><input type= "number" name="number[]"  value="<?php echo $rows['number']; ?>" min="0"> </td> 

</tr> 

<?php 
} 
?>  

</table> 
</td> 
</tr> 
<input type="submit" name="Submit" value="Update">
</form>  


<h2>Capital:</h2><br>
        <?php
      
        $sql2="SELECT * FROM capital WHERE labId='$l'";

        $result2 = mysqli_query($con, $sql2);

 if (mysqli_num_rows($result2) > 0) {
  $i=0;
  echo "<table>
       <tr>
       <th>Component ID</th>
       <th>Name</th>
       <th>Description</th>
       <th>Remove</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {

    $roll=$row['compId'];
    $name=$row['name'];
    $family=$row['description'];
echo "
<div id='movie_box2$i' class='dashdiv'>";

echo "<tr>";
echo "<td>".$roll."</td>";
echo "<td>".$name."</td>";
echo "<td>".$family."</td>";
echo "<td><a href='deletecapital.php?id=".$roll."'>Remove</a></td>";
echo "</tr>";

$i++;
echo "</div>";
}

}

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
<?php 
mysqli_close($con); 
?> 
</html>
