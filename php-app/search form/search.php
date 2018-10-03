<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<style type="text/css">

  body {

  	background-color: #f2f2f2;
  }

		td {
			padding: 15px;

		}

		table, th, td {

			border: 2px solid black;
		}

		table {

			width:50%;
			margin: 80px
		}

		input[type=text], select, textarea {
    width: 10%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: left;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.row {

	padding: 20px;
}

form {

	font-size: 25px;
}


.button {
   background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    }

    .button:hover {
    background-color: #45a049;

    }
	</style>

	<form action="search.php" method="post">
		Code : <input type="text" name="Code">

		    <div class="row">
      <input type="submit" name="search" value="Find">
      <a href="/" class="button">Back</a>
    </div>

	</form>
 <table>
  <tr>
  	<th>Name</th>
  	<th>price</th>
  	<th>SPrice</th>
  	<th>quantity</th>
  </tr>

  <?php 
  if(isset($_POST{'search'}))
{

  $Code = $_POST['Code'];
$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to coonect");
mysqli_select_db( $con, "b10_22763959_sotredb");
mysqli_query($con, "set NAMES utf8");
$query = "SELECT `Name`, `price`, `SPrice`, 'quantity' FROM Categories WHERE Code =$Code LIMIT 1";
$result = mysqli_query($con , $query);

if (mysqli_num_rows($result) > 0)

    {

while ($row=mysqli_fetch_array($result)) {

	?>
	<tr><td><?php echo $row['Name'];?></td><td><?php echo $row['price'];?></td><td><?php echo $row['SPrice'];?></td><td><?php echo $row['quantity'];?></td></tr>
	<?php
} 


} else {

   echo "This Code Does Not Exist";
       $Name ="";
       $price ="";
       $SPrice = "";
       $quantity ="";
    }

  mysqli_free_result($result);
  mysqli_close($con);


} else {

       $Name ="";
       $price ="";
       $SPrice = "";
       $quantity ="";
}

  ?>


 </table>



</body>
</html>