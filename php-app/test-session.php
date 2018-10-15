
<?php


session_start();

if (isset($_SESSION['username']) == true){
     
$host="localhost";
$user="root";
$db="testdb";
$pass="";


$con = mysqli_connect($host, $user, $pass,$db );
$con->query("SET NAMES utf8");
$con->query("SET CHARACTER SET utf8");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$uname = mysqli_real_escape_string($con,$_POST['username']);


$query = "CREATE TABLE '$uname' (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
) ";


mysqli_query($conn, $sql);

     }

     ?>


<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

</body>
</html>