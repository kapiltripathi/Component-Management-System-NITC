<?php session_start(); 
include 'stuhead.php';
function fetch_data()
{
   include "db.php";
 $rollno = $_SESSION['rollno'];
 $sql = "SELECT * FROM dues WHERE rollno = '$rollno'";


 $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  //print mysqli_num_rows($result);
    // output data of each row

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
<td>'.$number.'</td>
<td>'.$tim.'</td>
</tr>
   ';

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
      $obj_pdf->SetTitle("All dues");  
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
    width: 100%;
    height: 100%;
}
</style>
     
<head>
  <title>simplest</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>


        
      <div id="content">
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
                                <th>Quantity</th>
                              <th>time</th>
                          </tr>  
     
        </div>
  
<?php
echo fetch_data();


//mysqli_close($con);


?>

  <script>
function selects()
{
document.getElementById("viewDue").className = "selected";
  }
    
 

</script>   

</body>
</html>   
