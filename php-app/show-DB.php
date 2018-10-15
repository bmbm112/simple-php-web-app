<?php 
session_start();
if (isset($_SESSION['username']) == true){
   
  $con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
  mysqli_select_db($con ,'b10_22763959_sotredb');
  mysqli_query($con, "set NAMES utf8");

  $uname = $_SESSION['login'];

   $sql = "SELECT * FROM `".$uname.".categories` ";
   $record = mysqli_query($con, $sql);


 ?>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>show database</title>
</head>
<body>
<h2>Show Database:</h2>

<style type="text/css">


  body {

    background-color: #f2f2f2;
  }
	

table {

	width: 50%;
	margin: 20PX;

}

	td {

		text-align: center;
	}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

</style>

<form action="show-DB.php" method="post">

<table width="700" border="2" cellpadding="3" cellspacing="3">
	<a href="/" class="button">Back</a>
  <tr>
    <th>Code</th>
    <th>Name</th>
    <th>Price</th>
    <th>Sell-Price</th>
    <th>main-Quantity</th>
    <th>sold-Quantity</th>
    <th>remaining-Quantity</th>
    <th>Added-Quantity</th>

  </tr>
  <?php while ($table = mysqli_fetch_assoc($record)) {
  
  echo "<tr>";
  echo	"<td>". $table['Code'] ."</td>";
  echo	"<td>". $table['Name'] ."</td>";
  echo	"<td>". $table['price'] ."</td>";
  echo	"<td>". $table['SPrice'] ."</td>";
  echo	"<td>". $table['main_quantity'] ."</td>";
  echo  "<td>". $table['sold_quantity'] ."</td>";
  echo  "<td>". $table['remaining'] ."</td>";
  echo  "<td>". $table['added_quantity'] ."</td>";
  echo "</tr>";
}

}
?>
</table>

</form>

</body>
</html>