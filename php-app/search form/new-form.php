<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>search page</title>
  <link rel="stylesheet" type="text/css" href="style/s-style.css">

</head>
<body>

<?php


if(isset($_POST{'search'}))
{

  $Code = $_POST['Code'];
  $connect = mysqli_connect("localhost", "root", "", "testdb" );
  $query = "SELECT `Name`, `price`, `SPrice`, 'quantity' FROM `Categories` WHERE Code =$Code LIMIT 1";
  $result = mysqli_query($connect , $query);
  mysqli_query($connect, "SET NAMES utf8");
 mysqli_query($connect, "SET CHARACTER SET utf8");

 
    if (mysqli_num_rows($result) > 0)

    {

  while ($row = mysqli_fetch_array($result))

  {

       $Name = $row['Name'];
       $price = $row['price'];
       $SPrice =  $row['SPrice'];
       $quantity = $row['quantity'];

  } 

    } else {

   echo "undefined Code";
       $Name ="";
       $price ="";
       $SPrice = "";
       $quantity ="";
    }

  mysqli_free_result($result);
  mysqli_close($connect);

  } else {

       $Name ="";
       $price ="";
       $SPrice = "";
       $quantity ="";
}



?>


<h2>Search Database Form</h2>

<div class="container">
  <form  id="labnol" action="new-form.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="code">Enter Code</label>
      </div>
      <div class="col-75">
        <input id="transcript" type="text" name="Code" >
        <img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif"  style="height: 30px;margin: 10px" />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="id">name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name"  value="<?php echo $Name ;?>"/> 
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">price</label>
      </div>
      <div class="col-75">
        <input type="text" name="price"  value="<?php echo $price ;?>"/> 
    <div class="row">
      <div class="col-25">
        <label for="id">SPrice</label>
      </div>
      <div class="col-75">
        <input type="text" name="SPrice"  value="<?php echo $SPrice ;?>"/> 
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="price">Quanitiy</label>
      </div>
      <div class="col-75">
        <input type="text" name="quantity"  value="<?php echo $quantity ;?>"/> 
    <div class="row">
      <input type="submit" name="search" value="Find">
    </div>
  </form>
</div>

<script type="text/javascript">
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
  


</script>


<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>
</html>
