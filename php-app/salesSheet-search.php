<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>search page</title>
    <link rel="stylesheet" type="text/css" href="style/salesSheet.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<form action="salesSheet-search.php" method="post" class="form-signin">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">daily Sales Sheet Search</h1>
      </div>

      <div class="form-label-group">
      	 <label for="date">Date:</label>
      <input type="text" name="Day">
      </div>

      <div class="search-btn">
      <input type="submit" name="search" class="btn btn-lg btn-primary btn-block" value="search">
      </div>
    </form>
  <table class="table table-condensed" width="600" cellpadding="3" cellspacing="3">
  <tr>
 <th>Date</th>
 <th> Code</th>
 <th>Name</th>
 <th>SPrice</th>
 <th>Main-quantity</th>
 <th>Sold-quantity</th>
 <th>Total-Cash</th>
</tr>

<?php 

session_start();
if (isset($_SESSION['username']) == true){

$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to connect");
mysqli_select_db( $con, "b10_22763959_sotredb");
 mysqli_query($con, "set NAMES utf8");
   
$uname = $_SESSION['login'];

   if(isset($_POST{'search'})) {
   
   $date = $_POST['Day'];
   $query = "SELECT * FROM `".$uname.".dailysales` WHERE Day = '$date'";
   $result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0)

    {

   while ($row = mysqli_fetch_array($result)) {

?>
  <tr>
  	<td><?php echo $row['Day'];?></td>
  	<td><?php echo $row['Code'];?></td>
  	<td><?php echo $row['Name'];?></td>
  	<td><?php echo $row['SPrice'];?></td>
  	<td><?php echo $row['main_quantity'];?></td>
  	<td><?php echo $row['sold_quantity'];?></td>
  	<td><?php echo $row['total_cash'];?></td>
  </tr>

  <?php
}

} else {

   echo "No records for this date";
       $code="";
       $Name ="";
       $SPrice = "";
       $main_quantity ="";
       $sold_quantity="";
       $total_cash="";
    }

  mysqli_close($con);


} else {

       $code="";
       $Name ="";
       $SPrice = "";
       $main_quantity ="";
       $sold_quantity="";
       $total_cash="";
}


}


?>

</table>


</body>
</html>