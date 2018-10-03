
<?php

$db = mysqli_connect("sql204.byethost.com", "b10_22763959", "0142468869", "b10_22763959_sotredb");
$db->query("SET NAMES utf8");
$db->query("SET CHARACTER SET utf8");

if (isset($_POST['insert-btn'])) {
   session_start();
  $Code = mysqli_real_escape_string($db, $_POST['Code']);
  $Name = mysqli_real_escape_string($db,$_POST['Name']);
  $price = mysqli_real_escape_string($db,$_POST['price']);
  $SPrice = mysqli_real_escape_string($db,$_POST['SPrice']);
  $quantity = mysqli_real_escape_string($db,$_POST['quantity']);



  $sql = "INSERT INTO Categories(Code, Name, price, SPrice, quantity) VALUES ('$Code', '$Name', '$price', '$SPrice', '$quantity')";
 
  mysqli_query($db , $sql);

   echo "Insertion Successfully";


}


?>

<html>
<head>

  <title>insertion page</title>
  <link rel="stylesheet" type="text/css" href="style/i-style.css">

</head>
<body>

<h2>Insert Into Database Form</h2>

<div class="container">
  <form action="input-data.php" method="post">
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
        <label for="name">name</label>
      </div>
      <div class="col-75">
        <input type="text" id="Name" name="Name" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" >
    <div class="row">
      <div class="col-25">
        <label for="SPrice">SPrice</label>
      </div>
      <div class="col-75">
        <input type="text" id="SPrice" name="SPrice" >
      <div class="row">
      <div class="col-25">
        <label for="quantity">quantity</label>
      </div>
      <div class="col-75">
        <input type="text" id="quantity" name="quantity" >
    <div class="row">
      <input type="submit" name="insert-btn" value="Insert">
    </div>
  </form>
</div>


<a href="/" class="button">Back</a>

<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>
</html>
