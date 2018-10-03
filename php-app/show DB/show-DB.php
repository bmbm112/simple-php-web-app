<?php 

   
  $con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
  mysqli_select_db($con ,'b10_22763959_sotredb');
  mysqli_query($con, "set NAMES utf8");
   $sql = "SELECT * FROM Categories ";
   $record = mysqli_query($con, $sql);



 ?>


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

<table width="600" border="1" cellpadding="1" cellspacing="1">
	<a href="/" class="button">Back</a>
  <tr>
    <th>Code</th>
    <th>Name</th>
    <th>Price</th>
    <th>Sell-Price</th>
    <th>Quantity</th>
  </tr>
  <?php while ($table = mysqli_fetch_assoc($record)) {
  
  echo "<tr>";
  echo	"<td>". $table['Code'] ."</td>";
  echo	"<td>". $table['Name'] ."</td>";
  echo	"<td>". $table['price'] ."</td>";
  echo	"<td>". $table['SPrice'] ."</td>";
  echo	"<td>". $table['quantity'] ."</td>";
  echo "</tr>";
}

?>
</table>

</form>

</body>
</html>