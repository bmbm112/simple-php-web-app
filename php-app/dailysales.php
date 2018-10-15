<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>sale</title>
</head>
<body>
<?php 
 

 session_start();


if (isset($_SESSION['username']) == true){
$host="sql204.byethost.com";
$user="b10_22763959";
$db="b10_22763959_sotredb";
$pass="0142468869";


$conn = mysqli_connect($host, $user, $pass,$db );
$conn->query("SET NAMES utf8");
$conn->query("SET CHARACTER SET utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
 
$row = "today is" . date("d/m/y");;
$xplod = explode(' ', $row);
//print_r($xplod);
$string = "$xplod[0] - $xplod[1]";
//echo "<br />$string";
$date = date("d/m/y");;
//echo "<br />$date";


if (isset($_POST['insert'])) {
  $day = mysqli_real_escape_string($conn, $_POST['date']);
  $Code = mysqli_real_escape_string($conn, $_POST['Code']);
  $Name = mysqli_real_escape_string($conn, $_POST['Name']);
  $SPrice = mysqli_real_escape_string($conn, $_POST['SPrice']);
  $main_quantity = mysqli_real_escape_string($conn, $_POST['main_quantity']);
  $remaining = mysqli_real_escape_string($conn, $_POST['remaining']);
  $sold_quantity = mysqli_real_escape_string($conn, $_POST['sold_quantity']);
  $total = mysqli_real_escape_string($conn, $_POST['total']);

$uname = $_SESSION['login'];


$date = date("d/m/20y");

$sql = "INSERT INTO `".$uname.".dailysales` (day, Code, Name, SPrice ,main_quantity, sold_quantity, total_cash) VALUES ('$date', '$Code', '$Name', '$SPrice', '$main_quantity', '$sold_quantity', '$total')";

$sql1 ="UPDATE `".$uname.".categories` INNER JOIN `".$uname.".dailysales` ON `".$uname.".categories`.Code = `".$uname.".dailysales`.Code SET `".$uname.".categories`.sold_quantity = (SELECT SUM(`".$uname.".dailysales`.sold_quantity) FROM `".$uname.".dailysales` WHERE `".$uname.".categories`.Code = `".$uname.".dailysales`.Code )";

$sql2 = "UPDATE `".$uname.".categories` SET remaining = main_quantity - sold_quantity + added_quantity";


mysqli_query($conn, $sql);
mysqli_query($conn, $sql1);
mysqli_query($conn, $sql2);

   echo "Insertion Successfully";


 

}


}

 ?>


<style type="text/css">

  body {

  	background-color: #f2f2f2;
  }
	
	table, th, td {

			border: 2px solid black;
		}

		table {

			width:30%;
			margin: 30px;
		}


 
		input {
        text-align: center;
        font-size: 13px;
        border: 2px solid gray;

		}


		button {

    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    margin: 4px 2px;
    cursor: pointer;

		}

 table , th , td ,input[type=text] {
  width: 85px;
}
 

  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 18px;
    width: 70px;
}

input[type=submit]:hover {
    background-color: #45a049;
}

</style>

<form action="dailysales.php" method="post">
	<input type="text" name="Code" style="width: 110px"> <input type="submit" name="search" value="Go">
<table id="tbl" height="140"  cellpadding="5" cellspacing="5">
  <tr>
	<th>Date</th>
	<th>Code</th>
	<th>Name</th>
	<th>Price</th>
  <th>Main quantity</th>
	<th>Remaining quantity</th>
  <th>sell quantity</th>
	<th>Action</th>
	<th>total cash</th>
 </tr>

 <?php

if (isset($_POST['search'])) {

$uname = $_SESSION['login'];
 
 $Code = $_POST['Code'];
$sql = "SELECT `Code`, `Name`, `SPrice`,`main_quantity`, `remaining` FROM `".$uname.".categories` WHERE Code =$Code LIMIT 1";

$result = mysqli_query($conn , $sql);


if (mysqli_num_rows($result) > 0)

    {

while ($row=mysqli_fetch_array($result)) {

	 ?>
  <tr style="text-align: center;">
  	<td><input type="text" name="date" value="<?php echo date("d/m/20y") ;?>" readonly></td>
  	<td><input type="text" name="Code" value="<?php echo $row['Code'];?>" readonly></td>
  	<td><input type="text" name="Name" value="<?php echo $row['Name'];?>"  style="width:120px" readonly></td>
  	<td><input type="text" id="n1" name="SPrice" value="<?php echo $row['SPrice'];?>" readonly></td>
    <td><input type="text" name="main_quantity" value="<?php echo $row['main_quantity'];?>" readonly></td>
    <td><input type="text" name="remaining" value="<?php echo $row['remaining'];?>" readonly></td>
  	<td><input id="n2" type="text" name="sold_quantity"></td>
  	<td><button type="button" onclick="calc();">Calculate</button></td>
  	<td><input type="text" name="total" id="result"></td>
  	<td><input type="submit" name="insert" value="Sell"></td>
  </tr>
  
  <?php

} 


} else {

   echo "This Code Does Not Exist";
       $SPrice = "";
    }

  mysqli_free_result($result);
  mysqli_close($conn);


} else {

       $SPrice = "";
}



?>


<script type="text/javascript">
	function calc()
	{
		var n1 = parseInt(document.getElementById('n1').value);
		var n2 = parseInt(document.getElementById('n2').value);
        document.getElementById('result').value = n1*n2;
	}
	
      

</script>


</table>
</form>

</body>
</html>