<?php session_start(); 

function fetch_data()
{
     $output = '';  
       $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "component_distribution";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  include 'db.php';
    
 //$l=$_SESSION['labid'];
    $l="12";
 $sql = "SELECT * FROM dues WHERE labId='$l'";


 $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  //print mysqli_num_rows($result);
    // output data of each row
     $i=0;
    while($row = mysqli_fetch_assoc($result)) {

    $cid=$row['compId'];
  //  print $cid;
    $tim=$row['time'];
    $roll=$row['rollno'];
    $number=$row['number'];
    $dID=$row['dID'];
        
    $sql1 = "SELECT * FROM component WHERE compId = '$cid' LIMIT 1";


 $result1 = mysqli_query($con, $sql1);
 $row1 = mysqli_fetch_assoc($result1);
 $name = $row1['name'];
    
        
$output .= '
<tr>
<td>'.$roll.'</td>
<td>'.$cid.'</td>
<td>'.$name.'</td>
<td>'.$number.'</td>
<td>'.$tim.'</td>
</tr>
   ';
$i++;

    }
}
 else 
    $output = "O RESULTS";
 
      return $output;  
}
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("All dues in the lab");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
         <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                
       <th>Roll Number</th>
       <th>Comp ID</th>
       <th>Comp Name</th>
       <th>Quantity</th>
       <th>time</th>
       </tr> 
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      ob_end_clean();
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  

<!DOCTYPE HTML>
<html>
    
<style type="text/css">
  
button{
    width: 60%%;
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
    width: 60%;
    height: 75%;
}
</style>
     
<head>
  <title>simplest</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><span class="logo_colour">COMPONENT MANAGEMENT SYSTEM</span></h1>
          <!--h2>Simple. Contemporary. Website Template.-->
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="request2.php">Home</a></li>
            <li  class="selected"> <a href="viewDue.php">View Dues</li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
           <center> <h3>AKANSH KUMAR</h3><hr>
                    <h4>B150398CS </h4> <br> 
                        </center>
            
            <?php 
        
       $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "component_distribution";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$rollno = $_POST['rollno'];
$rollno = "B150272CS";
$sql5 = "SELECT * FROM student WHERE rollno='$rollno'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();
 echo "<h5> Email-" .$row['email']. "</h5> <br>";
 echo "<h5> Contact NO -" .$row['phone']. "</h5><br>";
$sql6 = "SELECT COUNT(DISTINCT RequestNo) AS COUNT FROM `request` WHERE rollno='B150895CS'";
$result = $conn->query($sql6);
$row = $result->fetch_assoc();
 echo "<h5> Request Pending :-" .$row['COUNT']. "</h5><br><hr>";
 
$conn->close();
?>

            <!--h5>February 1st, 2014</h5>
            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p-->
          </div>
          <div class="sidebar_base"></div>
        </div>
       
        
          <div class="sidebar_base"></div>
        
      </div>
 <div class="table-responsive">  
                	<div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Roll Number</th>
                                <th>Comp ID</th>
                                <th>Comp Name</th>
                                <th>Quantity</th>
                              <th>time</th>
                          </tr>  

  
<?php
echo fetch_data();


//mysqli_close($con);


?>

  <script>
function selects()
{
document.getElementById("View Dues").className = "selected";
  }
    
 

</script>   

</body>
</html>   
