<?php
include 'connect.php';



if(isset($_POST{'search'}))
{
    $Code = $_POST['Code'];
	$connect = mysqli_connect("localhost", "root", "", "testdb" );
	$query = "SELECT `id`, `Name`, `price` FROM `categories` WHERE Code =$Code LIMIT 1";
	$result = mysqli_query($connect , $query);

 
    if (mysqli_num_rows($result) > 0)

    {

	while ($row = mysqli_fetch_array($result))

	{

       $Name = $row['Name'];
       $price = $row['price'];
       $id =  $row['id'];

	} 

    } else {

   echo "undefined Code";
       $Name ="";
       $price ="";
       $id = "";
    }

	mysqli_free_result($result);
	mysqli_close($connect);

	} else {

       $Name ="";
       $price ="";
       $id = "";
}


?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Search Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
</head>
<body>
     <h1>Search Field</h1>
	 <form action="script.php" method="post">
      Enter Code : <input type="text" name="Code"/> 
       <input type="submit"  name="search" value="Find">
        id : <input type="text" name="id"  value="<?php echo $id ;?>"/> 
      Name : <input type="text" name="Name"  value="<?php echo $Name ;?>"/> 
      Price : <input type="text" name="price"  value="<?php echo $price ;?>"/> 
      
     </form> 


     
</body>




</html>