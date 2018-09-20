<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}
.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}



</style>
</head>

<body>

<?php



$email=$_POST['emailval'];
$name=$_POST['nameval'];
$servername = "localhost";
$username = "root";
$password = "time.org";
$dbname = "component_distribution";
$check=0;
// Create $connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
// redirect to student home page if student's email
$sql2 = "SELECT * FROM student where email='$email'";
$result2 = $conn->query($sql2);
$row1 = $result2->fetch_assoc();

if ($result2->num_rows > 0) 
{
    $_SESSION['name'] = $row1["name"];
    $_SESSION['email'] = $row1['email'];
    $_SESSION['rollno']=$row1['rollno'];
$_SESSION['phone']=$row1['phone'];
    $_SESSION['type'] = 0;
   // here enter the student's homepage 
    header('Location:lab.php'); 
    $check=1;
} 
// redirect to staff incharge home page if staff_incharge's email
$sql1 = "SELECT * FROM staff_incharge where email='$email'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

if ($result1->num_rows > 0) 
{
  
    $_SESSION['name'] = $row1["name"];
    $_SESSION['rollno'] = $row1['staffId'];
    $_SESSION['staffid'] = $row1['staffId'];
    $_SESSION['labid'] = $row1['labId'];
    $_SESSION['phone'] = $row1['phone'];
    $_SESSION['type'] = 1;
    $_SESSION['email'] =$email;
    // here enter the staff_incharge's homepage
    header('Location:request.php'); 
    $check=1;
}

$sql1 = "SELECT email FROM user where email='$email'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

if ($result1->num_rows > 0) 
{
    $_SESSION['email'] = $row1["email"];
$_SESSION['type'] = 3;
    // here enter the admin selection page
    header('Location:split.php'); 
    $check=1;
}


// redirect to faculty home page if faculty's email
$sql1 = "SELECT * FROM faculty where email='$email'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

if ($result1->num_rows > 0) 
{
    $_SESSION['name'] = $row1["name"];
    $_SESSION['rollno'] = $row1["facultyid"];
    $_SESSION['facultyid'] = $row1["facultyid"];
     $_SESSION['phone'] = $row1['phoneno'];
    $_SESSION['type'] = 2;
     $_SESSION['email'] =$email;
    // here enter the faculty's homepage
    header('Location:f_request.php'); 
    $check=1;
}


   if($check == 0)
{
echo "<script type='text/javascript'>alert('PLEASE TRY WITH CORRECT LOGIN');</script>";
header('Location: index(1).html');}
?>

<!--form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	
	<button type="submit" name="dept" value="dept" class="button button2"> SIGN UP AS DEPARTMENT </button>
        <button type="submit" name="stu" value="stu" class="button button2"> SIGN UP AS STUDENT </button>
    </form-->

<?php

/*if (isset($_POST['dept'])) {
    $_SESSION['dname'] = $name;
    $_SESSION['demail'] = $email;
    header('Location: departmentsignup.php'); 
}

if (isset($_POST['stu'])) {
    $_SESSION['sname'] = $name;
    $_SESSION['semail'] = $email;
    header('Location: studentsignup.php'); 
}


  
*/
?>

</body>
</html>
