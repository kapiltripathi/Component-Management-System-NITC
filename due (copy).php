<!DOCTYPE HTML> 
<html> 
<head>
  <title>Dues</title>
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

.form-wrapper {
  background-color: #f6f6f6;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eae8e8));
  background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: -moz-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: -ms-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: -o-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: linear-gradient(top, #f6f6f6, #eae8e8);
  border-color: #dedede #bababa #aaa #bababa;
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
  -moz-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
  box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
  margin: 25px auto;
  overflow: hidden;
  padding: 8px;
  width: 250px;
}

.form-wrapper #search {
  border: 1px solid #CCC;
  -webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
  -moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
  box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  color: #999;
  float: left;
  font: 16px Lucida Sans, Trebuchet MS, Tahoma, sans-serif;
  height: 20px;
  padding: 10px;
  width: 120px;
}

.form-wrapper #search:focus {
  border-color: #aaa;
  -webkit-box-shadow: 0 1px 1px #bbb inset;
  -moz-box-shadow: 0 1px 1px #bbb inset;
  box-shadow: 0 1px 1px #bbb inset;
  outline: 0;
}

.form-wrapper #search:-moz-placeholder,
.form-wrapper #search:-ms-input-placeholder,
.form-wrapper #search::-webkit-input-placeholder {
  color: #999;
  font-weight: normal;
}

.form-wrapper #submit {
  background-color: #0483a0;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
  background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
  background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
  background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
  background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
  background-image: linear-gradient(top, #31b2c3, #0483a0);
  border: 1px solid #00748f;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
  -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
  color: #fafafa;
  cursor: pointer;
  height: 42px;
  float: right;
  font: 15px Arial, Helvetica;
  padding: 0;
  text-transform: uppercase;
  text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
  width: 100px;
}

.form-wrapper #submit:hover,
.form-wrapper #submit:focus {
  background-color: #31b2c3;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
  background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
  background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
  background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
  background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
  background-image: linear-gradient(top, #0483a0, #31b2c3);
}

.form-wrapper #submit:active {
  -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
  -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
  outline: 0;
}

.form-wrapper #submit::-moz-focus-inner {
  border: 0;
}

</style> 
 
<?php 
 include 'newhead.php'; 
 include 'db.php' 
 
?> 
      <div id="content"> 
   <form class="form-wrapper" action="" method="POST">
        <input type="text" name="rollno" placeholder="Roll Number" id="search" required />
        <input type="submit" value="Search" id="submit" />
    </form>

<br><br>
      <form  method="POST" action ="repeat.php">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>       
<?php 
$output = '<b><center><u> NATIONAL INSTITUTE OF TECHNOLOGY, CALICUT </u><br>KOZHIKODE , KERALA <br> 226010<br> <br> <hr> <br> ELECTRICAL AND COMMUNICATION ENGINEERING DEPT <br> <br> </center> </b>';
  


if(isset($_POST['rollno'])){
$a=$_POST['rollno'];
 
$sql = "SELECT * FROM dues where rollno='$a'";

}
else{
$l=$_SESSION['labid'];
$sql = "SELECT * FROM dues WHERE labId='$l'"; 
}

echo  "<h2><center>DUES</center></h2>"; 
 

 
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
  $output .= '<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                
       <th>Roll Number</th>
       <th>Comp ID</th>
       <th>Quantity</th>
       
       </tr> 
      ';   
    // output data of each row 
    while($row = mysqli_fetch_assoc($result)) { 
 
    $cid=$row['compId']; 
    $roll=$row['rollno']; 
    $number=$row['number'];
     
         echo "<div id='movie_box$i' class='dashdiv'>"; 
echo "<tr>"; 
echo "<td>".$roll."</td>"; 
echo "<td>".$cid."</td>"; 
echo "<td>".$number."</td>"; 
echo "</tr>"; 
 
$i++; 
echo "</div>";

$output .= '<tr> 

<td>'.$roll.'</td> 

<td>'.$cid.'</td>

<td>'.$number.'</td> 

</tr>'; 
} 
 
$_SESSION["output"] = $output;
} 
 else { 
    echo "0 results"; 
} 
 
//echo $output;
 






   



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
