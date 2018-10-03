<!DOCTYPE html>
<html>
<head>
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

    }

    table, th, td {

      border: 2px solid black;
    }

    table {

      width:50%;
      margin: 80px
    }

    input[type=text], select, textarea {
    width: 20%;
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

  font-size: 18px;
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



  <?php 
  if(isset($_POST{'update-btn'}))
{


  $Code = $_POST['Code'];
$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to connect");
mysqli_select_db( $con, "b10_22763959_sotredb");
mysqli_query($con, "set NAMES utf8");
session_start();
  $price = mysqli_real_escape_string($con,$_POST['price']);
  $SPrice = mysqli_real_escape_string($con,$_POST['SPrice']);
  $quantity = mysqli_real_escape_string($con,$_POST['quantity']);

$sql = " UPDATE Categories SET  price = $price ,
SPrice=$SPrice ,quantity=$quantity WHERE Code=$Code";
$result = mysqli_query($con , $sql);



} 

  ?>


<h2>Update Database Form</h2>

<div class="container">
  <form action="update.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="code"> Code</label>
      </div>
      <div class="col-75">
        <input type="text" id="Code" name="Code" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">NEW-price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="SPrice">NEW-Sell-Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="SPrice" name="SPrice" >
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="quantity">NEW-quantity</label>
      </div>
      <div class="col-75">
        <input type="text" id="quantity" name="quantity" >
      </div>
    </div>
    <div class="row">
      <input type="submit" name="update-btn" value="UPDATE">
    </div>
 
    <a href="/" class="button">Back</a>

    </form>
 <table style="text-align: center;" width="600" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <th>Name</th>
    <th>price</th>
    <th>Sell-Price</th>
    <th>quantity</th>
  </tr>

  <?php 
  if(isset($_POST{'update-btn'}))
{

  $Code = $_POST['Code'];
$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to connect");
mysqli_select_db( $con, "b10_22763959_sotredb");
mysqli_query($con, "set NAMES utf8");
$sql = "SELECT `Name`, `price`, `SPrice`, `quantity` FROM Categories WHERE Code =$Code LIMIT 1";
$result = mysqli_query($con , $sql);

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
  </form>
</div>
</body>
</html>