
<!DOCTYPE HTML>
<html>

<style type="text/css">
 table {
    background-color: #00C6F0;
    color: white;
    width: 80%;
    height: 75%;
 }

 input[type=radio], select,input[type=number] {
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
include 'stuhead.php';
include 'db.php';



?>





<center>
<h2>  SELECT LAB </h2>
<?php

$sql12 = "SELECT * FROM lab"; 
$result12 = mysqli_query($con, $sql12); 
  
while($row = mysqli_fetch_assoc($result12)) { 
$labId=$row['labId'];
$name=$row['name'];
echo " <a href='component_select.php?id=".$labId."'>$labId   </a><br>";

} 

 
mysqli_close($con); 
 
?> 


  
</center>



<script>
function selects()
{
document.getElementById("srequest").className = "selected";
  }
    
 

</script>

</body>
</html>   
