<!DOCTYPE HTML>
<html>
<style type="text/css">
 table {
    background-color: #00C6F0;
    color: white;
    width: 80%;
    height: 75%;
}
</style>

<?php
 include 'header.php';
 include 'db.php'

?>
      <div id="content">
       
<?php
echo  "<h2>DUES</h2>";

$sql = "SELECT * FROM dues";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  $i=0;

  echo "<table>
       <tr>
       <th>Roll Number</th>
       <th>compid</th>
       <th>number</th>
       </tr>
  ";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    $cid=$row['compId'];
    $roll=$row['rollno'];
    $number=$row['number'];
         echo "
<div id='movie_box$i' class='dashdiv'>";
echo "<tr>";
echo "<td>".$roll."</td>";
echo "<td>".$cid."</td>";
echo "<td>".$number."</td>";
echo "</tr>";


$i++;
echo "</div>";
}

}
 else {
    echo "0 results";
}

mysqli_close($con);

?>

      </div>
    </div>

  </div>
  <script>
function selects()
{
document.getElementById("due").className = "selected";
  }
    
 

</script>
</body>
</html>
