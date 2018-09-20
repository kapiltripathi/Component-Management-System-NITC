
<!DOCTYPE html>
<html>

<head>
  <title>Dues</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}



.navBar {
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #39B7CD;
    display: block;
    align-content: flex-start;
}
.navItemList{
  list-style-type: none;
}

.navItemList li {
    float: left;
}

.navItemList li a {
    display: block;
    color: white;
    text-align: center;
    padding: 0 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
.navItemList li a:hover {

}
.navtitle{
  font-family: arial, sans-serif;
  color: white;
  text-align: center;
  padding: 0px 200px 14px 6px;
  margin-right: 200px;
  font-size: 20px;
  text-decoration: none;
}
.navtitle a:hover{

}

#feeds{
  align-content:center;

}
#feeds{
  border-style: solid;
  border-width: 0px;
  padding:10px;
  border-color: #333;
  border-radius: 15px;
  margin: 25px 50px;
}
.subButton{
  position: relative;
  margin:5px;
   font-weight: bold;
 background-color: #39B7CD;;
  border: none;
  color: #fff;
  border-radius: 15px;
  width: 100px;
  height: 40px;
  cursor: pointer;
}

.blogdel{
  margin-bottom:7px;
}

.blog{
  border-style: solid;
  border-width:1px;
  border-color: #DCDCDC;
  border-radius: 15px;
  margin-top:10px;
  padding:5px;
}

</style>


<?php
session_start();
if($_SESSION['type']==0){
include 'stuhead.php';
}
else{
include 'newhead.php';
}
include 'db.php';


?> 
<body style="padding:0;margin:0;font-family: arial, sans-serif;">


  <div id="content">
    
      <?php
if($_SESSION['type']==0){
        $s=$_SESSION['rollno'];
  $query = "SELECT * FROM comments WHERE Id='$s' ORDER BY comment_id DESC";
}
if($_SESSION['type']==1){
        $s=$_SESSION['labid'];
  $query = "SELECT * FROM comment_sta WHERE labid='$s' ORDER BY comment_id DESC ";
}
if($_SESSION['type']==2){
        $s=$_SESSION['labid'];
  $query = "SELECT * FROM comment_fac WHERE labid='$s' ORDER BY comment_id DESC ";
}
      $result=mysqli_query($con,$query);
      if($result) {
        echo "<table>
          <tr>
            <th>Subject</th>
            <th>request</th>
            <th>Time</th>
          </tr>";
        if(mysqli_num_rows($result)>0) {
          while($row = mysqli_fetch_assoc($result)) {
             

              echo '<tr>
 <td>'.$row['comment_subject'].'</td>
                <td>'.$row['comment_text'].'</td>
               
                <td>'.$row['time'].'</td>
                
              </tr>';
            
          }
        }
      }
      echo "</table>";


    ?>
   
  </div>

  <center>

 
  <br>
    

</center>
</body>
</html>
