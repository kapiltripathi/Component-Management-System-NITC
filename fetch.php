<?php
//fetch.php;
session_start();

if(isset($_POST["view"]))
{
 include("db.php");
$s=$_SESSION['rollno'];
$l=$_SESSION['labid'];
if($_SESSION['type']==0){
        $s=$_SESSION['rollno'];
  $query = "SELECT * FROM comments WHERE comment_status=0 AND Id='$s' ORDER BY comment_id DESC ";
}
if($_SESSION['type']==1){
        $l=$_SESSION['labid'];
  $query = "SELECT * FROM comment_sta WHERE comment_status=0 AND labid='$l' ORDER BY comment_id DESC";
}
if($_SESSION['type']==2){
        $l=$_SESSION['labid'];
  $query = "SELECT * FROM comment_fac WHERE comment_status=0 AND labid='$l' ORDER BY comment_id DESC ";
}
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["comment_subject"].'</strong><br />
     <small><em>'.$row["comment_text"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
if($_SESSION['type']==0){
        $s=$_SESSION['rollno'];
  $query = "SELECT * FROM comments WHERE Id='$s' ORDER BY comment_id DESC LIMIT 5";
}
if($_SESSION['type']==1){
        $l=$_SESSION['labid'];
  $query = "SELECT * FROM comment_sta WHERE labid='$l' ORDER BY comment_id DESC LIMIT 5";
}
if($_SESSION['type']==2){
        $l=$_SESSION['labid'];
  $query = "SELECT * FROM comment_fac WHERE labid='$l' ORDER BY comment_id DESC LIMIT 5";
}
 $result = mysqli_query($con, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["comment_subject"].'</strong><br />
     <small><em>'.$row["comment_text"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 $output .='<li><a href="view_msg.php">View Previous notification </a>   </li>';
 }
}
 if($_POST["view"] != '')
 {
if($_SESSION['type']==0){
$update_query = "UPDATE comments SET comment_status=1 WHERE comment_status=0 AND Id='$s'";
}
if($_SESSION['type']==1){
$update_query = "UPDATE comment_sta SET comment_status=1 WHERE comment_status=0 AND labid='$l'";
}
if($_SESSION['type']==2){
$update_query = "UPDATE comment_fac SET comment_status=1 WHERE comment_status=0 AND labid='$l'";
}
  mysqli_query($con, $update_query);
 }
 if($_SESSION['type']==0){
$query_1 = "SELECT * FROM comments WHERE comment_status=0  AND Id='$s'";
}
if($_SESSION['type']==1){
$query_1 = "SELECT * FROM comment_sta WHERE comment_status=0 AND labid='$l'";
}
if($_SESSION['type']==2){
$query_1 = "SELECT * FROM comment_fac WHERE comment_status=0 AND labid='$l'";
}
 $result_1 = mysqli_query($con, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
