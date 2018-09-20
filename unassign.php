<?php session_start(); 
  if(!isset($_SESSION['email']))
  {
    header("location:index(1).html");
  }?>
  <!DOCTYPE html>
<html>
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
        <div>
        <h1>Unassign Lab:</h1><br>
        <?php
      
        $sql="SELECT * FROM faculty_labid ORDER by facultyid";

        $result = mysqli_query($con, $sql);

 if (mysqli_num_rows($result) > 0) {
  $i=0;
  echo "<table>
       <tr>
       <th>Faculty Id</th>
       <th>Lab Id</th>
       <th>Remove</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $roll=$row['facultyid'];
    $name=$row['labid'];
echo "
<div id='movie_box$i' class='dashdiv'>";

echo "<tr>";
echo "<td>".$roll."</td>";
echo "<td>".$name."</td>";
echo "<td><a href='remass.php?fid=".$roll."& page=".$i."& lid=".$name."'>Remove</a></td>";
echo "</tr>";

$i++;
echo "</div>";
}
echo "</table>";
}


?>
</div>

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
