<?php

session_start();

if (isset($_SESSION['username']) == FALSE){
     header("Location: index.php");
}  else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired!";
            echo "<script>setTimeout(\"location.href = 'index.php';\",3000);</script>";
        }
      }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>E-Storage</title>
	 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="style/style.css" rel="stylesheet"  type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<header>
  <div class="container">
  	<div class="header">
  <h1> Online Form for Database relations</h1>
 </div>
</div>

<div class="container2">
  	<div class="row">
  		<div class="col">
    <table>
      <tr>
      <td><a href="input-data.php" class="w3-btn w3-black">STORE</a></td>
  	  <td><a href="search.php" class="w3-btn w3-black">SEARCH</a></td>
      <td><a href="show-DB.php" class="w3-btn w3-black">Display</a></td>
      <td><a href="update.php" class="w3-btn w3-black">Update Inventory</a></td>
      <td> <a href="dailysales.php" class="w3-btn w3-black">Daily Sales</a></td>
      <td> <a href="salesSheet-search.php" class="w3-btn w3-black">Daily Sales Sheet</a></td>

    </tr>
    </table>
     </div>
 </div>
 </div>

</header>

<div class="container">
	<div class="row">
		<div class="col">
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col">
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col">
		</div>
	</div>
</div>

<footer>

<div class="copyright py-4 text-center text-white">
    <div class="container">
        <p>Copyright &copy; Online Data App By Ahmed SOLIMAN</p>
    </div>
</div>

</footer>


<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>
</html>