<?php 
 session_start(); 
   if(!isset($_SESSION['email']))
  {
   header("location:index(1).html");
  }

?>
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
<head>
  <title>Request</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<legend align="center" ><h2>  Select Type Of Component </h2></legend>


<center>
<?php

$l = $_GET['id'];  

echo " <a href='comp.php?id=".$l."'>Consumable</a><br>";

echo " <a href='cap_request.php?id=".$l."'>Capital</a><br>";

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
