<!DOCTYPE HTML>
<html>
<head>
  <title>Dues</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<?php
include 'newhead.php';
include 'db.php';

$sql = "SELECT * FROM comments"; 
 
$result = mysqli_query($con, $sql); 
  
    while($row = mysqli_fetch_assoc($result)) { 
 
    $txt=$row['comment_text'];
     
    $sub=$row['comment_subject']; 
         
 echo $txt;
 echo $sub;
} 
 
 
mysqli_close($con); 
 
?> 
 
      </div> 
    </div> 
 
  </div> 














?>





</html>

