<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>update page</title>
  <link rel="stylesheet" type="text/css" href="style/i-style.css">

</head>
<body>


  <style type="text/css">

  body {

    background-color: #f2f2f2;
  }

    td {
      padding: 15px;
      border: 2px solid black;
      text-align: center;

    }

    th {
       padding: 15px;
       text-align: center;
       border: 2px solid black;
    }



    table {

      width:50%;
      margin: 15px;
      float: left;
    }

    input[type=text], select, textarea {
    width: 30%;
    padding: 12px;
    border: 2px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

input[type=submit] {
   background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    float: left;

}

input[type=submit]:hover {
    background-color: #45a049;
}

.row {

margin: 20px;

}

form {

  font-size: 18px;
}


.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}


.button:hover {

background-color: #45a049;
text-decoration: none;

}


.container {
  width: 100%;
 
}
  </style>






<h2 style="text-align: center">Update inventory Form</h2>

<div class="container">
  <form action="update.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="code"> Code:</label>
      </div>
      <div class="col-75">
        <input type="number" id="Code" name="Code">
       </div>
        <input type="submit" name="search" value="search">

  
 <?php 

session_start();
if (isset($_SESSION['username']) == true){

  if(isset($_POST{'search'}))
{

  $Code = $_POST['Code'];
$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to connect");
mysqli_select_db( $con, "b10_22763959_sotredb");
mysqli_query($con, "set NAMES utf8");

$uname = $_SESSION['login'];

$sql = "SELECT `Name`, `price`, `SPrice`, `remaining`, `added_quantity` FROM  `".$uname.".categories` WHERE Code =$Code LIMIT 1";
$result = mysqli_query($con , $sql);

if (mysqli_num_rows($result) >= 1)

    {

while ($row=mysqli_fetch_array($result)) {

  ?>
  <table border="3" width="600" cellpadding="3" cellspacing="3">
  <tr>
    <th>Name</th>
    <th>price</th>
    <th>Sell-Price</th>
    <th>remaining quantity</th>
    <th>added quantity</th>
  </tr>
  <tr>
    <td><?php echo $row['Name'];?></td>
    <td><?php echo $row['price'];?></td>
    <td><?php echo $row['SPrice'];?></td>
    <td><?php echo $row['remaining'];?></td>
    <td><?php echo $row['added_quantity'];?></td>
  </tr>
  <?php
} 


} else {

   echo "This Code Does Not Exist";
       $Name ="";
       $price ="";
       $SPrice = "";
       $remaining ="";
       $added_quantity ="";

    }

  mysqli_free_result($result);
  mysqli_close($con);


} else {

       $Name ="";
       $price ="";
       $SPrice = "";
       $remaining ="";
       $added_quantity ="";
}


if (isset($_SESSION['username']) == true){
if(isset($_POST{'update-btn'}))
{


$Code = $_POST['Code'];
$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to connect");
mysqli_select_db( $con, "b10_22763959_sotredb");
mysqli_query($con, "set NAMES utf8");

$uname = $_SESSION['login'];

  $price = mysqli_real_escape_string($con,$_POST['price']);
  $SPrice = mysqli_real_escape_string($con,$_POST['SPrice']);
  $added_quantity = mysqli_real_escape_string($con,$_POST['added_quantity']);

$sql = " UPDATE  `".$uname.".categories` SET  added_quantity =  added_quantity + $added_quantity WHERE Code = $Code";
$sql1 = " UPDATE  `".$uname.".categories` SET  price =  $price WHERE Code = $Code";
$sql2 = " UPDATE  `".$uname.".categories` SET  SPrice =  $SPrice WHERE Code = $Code";
$sql3 = "UPDATE  `".$uname.".categories` SET remaining = remaining + $added_quantity WHERE Code = $Code";
$result = mysqli_query($con , $sql);
$result = mysqli_query($con , $sql1);
$result = mysqli_query($con , $sql2);
$result = mysqli_query($con , $sql3);

echo "updated succss";



} 
}
}

  ?>


 </table>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">NEW-price:</label>
      </div>
      <div class="col-75">
        <input type="text" name="price" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="SPrice">NEW-Sell-Price:</label>
      </div>
      <div class="col-75">
        <input type="text" name="SPrice" >
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="quantity">NEW-quantity:</label>
      </div>
      <div class="col-75">
        <input type="text"  name="added_quantity" >
      </div>
    </div>
    <div class="row">
      <a href="/" class="button">Back</a> 
      <input type="submit" name="update-btn" value="UPDATE">
    </div>
 

    </form>
</div>
</body>
</html>