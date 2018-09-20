<!DOCTYPE HTML>
<html>

<?php
 include 'db.php';

?>
        
<?php
$sql = "SELECT * FROM component";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {

    
$nu=$row['number'];
if($nu<100){
echo "$nu";
require 'phpmailer/PHPMailerAutoload.php';

$hello = "hello";
$mail = new PHPMailer();

$mail->Username = 'component.management@gmail.com';
$mail->Password = 'wanted@13';

$mail->setFrom('component.management@gmail.com', 'department');
$mail->addAddress('rohit29041998@gmail.com');
$mail->Subject = 'notifiaction for of reuest';
$mail->Body = "The  accepted";

$mail->send();
}
}


mysqli_close($con);

?>
</body>
</html>
