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
  <title>Return</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<style type="text/css">
  
button{
    width: 80%%;
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
    <div>
        <h1>Consumable Items:</h1><br>
<?php

 $rollno = $_POST['rollno'];
 $l=$_SESSION['labid'];

 $sql = "SELECT * FROM dues WHERE rollno = '$rollno' AND labId ='$l'";


 $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  $i=0;
  
  echo "<table>
       <tr>
       <th>Roll Number</th>
       <th>compid</th>
       <th>compFamlily</th>
       <th>Value</th>
       <th>Unit</th>
       <th>number</th>
       <th>time</th>
       <th>Return</th>
       <th>Clear Dues</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $cid=$row['compId'];
    $tim=$row['time'];
    $roll=$row['rollno'];
    $number=$row['number'];
    $dID=$row['dID'];
    
    $sql1 = "SELECT * FROM consumable WHERE compId = '$cid' LIMIT 1";
    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($result1); 
    $family= $row1['family'];
    $value = $row1['value'];
    $unit = $row1['unit'];
    
         echo "
<div id='movie_box$i' class='dashdiv'>";
echo "<tr>";
echo "<td>".$roll."</td>";
echo "<td>".$cid."</td>";
echo "<td>".$family."</td>";
echo "<td>".$value."</td>";
echo "<td>".$unit."</td>";
echo "<td>".$number."</td>";
echo "<td>".$tim."</td>";
echo "<td><form class= 'form-wrapper' action='cleardue.php' method='post'>
        <input type='number' name='quantity' min='0' max='$number' placeholder='Quantity' id='Return' required />
        <input type='submit'  name ='action' value='Partially Return'/>
        <input type='hidden' name='dID' value='$dID' />
    </form></td>";
echo "<td><form action='cleardue.php' method='post' enctype='multipart/form-data'>
<input type='hidden' name='dID' value='$dID' />
<input type='hidden' name='page' value='$i' />
<input type='submit' name='action' value='Clear Dues'/>
</form></td>";
echo "</tr>";

$i++;
echo "</div>";
}
echo "</table>";
}
 else {
    echo "0 results";
}
?>
</div>
<div>
<h1>Capital Items:</h1><br>
  
        <?php

$sql2 = "SELECT * FROM capital_req WHERE rollno = '$rollno' AND labId ='$l'";


 $result2 = mysqli_query($con, $sql2);

if (mysqli_num_rows($result2) > 0) {
  $i=0;
  echo "<table>
       
</tr>
       <th>Roll Number</th>
       <th>compid</th>
       <th>Name</th>
       <th>description</th>
       <th>time</th>
       <th>Clear Dues</th>
       </tr>
  ";
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {

    $cid=$row2['compId'];
    $tim=$row2 ['time'];
    $roll=$row2['rollno'];
    $dID=$row2['dID'];
    
    $sql3 = "SELECT * FROM capital WHERE compId = '$cid' LIMIT 1";
    $result3 = mysqli_query($con, $sql3);
    $row3 = mysqli_fetch_assoc($result3); 
    $name= $row3['name'];
    $desc = $row3['description'];
    
         echo "
<div id='movie_box$i' class='dashdiv'>";
echo "<tr>";
echo "<td>".$roll."</td>";
echo "<td>".$cid."</td>";
echo "<td>".$name."</td>";
echo "<td>".$desc."</td>";
echo "<td>".$tim."</td>";
echo "<td><form action='cleardueCapital.php' method='post' enctype='multipart/form-data'>
<input type='hidden' name='dID' value='$dID' />
<input type='hidden' name='page' value='$i' />
<input type='submit' name='action' value='Clear Dues'/>
</form></td>";
echo "</tr>";

$i++;
echo "</div>";
}
echo "</table>";
}
 else {
    echo "0 resu";
}



mysqli_close($con);



?>
</div>
<br>
<br>
<button type="button" onclick="location.href='return.php'" >Go Back</button>
      </div>
    </div>
   <!--   <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php">Home</a> | <a href="request.php">Request</a> | <a href="stock.php">Stock</a> | <a href="return.php">Return</a>
      | <a href="due.php">Dues</a> </p>
      <p>Copyright &copy; simplestyle_blue_trees | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div> -->
  </div>
  <script>
function selects()
{
document.getElementById("return").className = "selected";
  }
    
 

</script>
</body>
</html>
