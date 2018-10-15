

<?php 
 session_start();

$con = mysqli_connect('sql204.byethost.com', 'b10_22763959', '0142468869');
if (!$con)die ("faild to connect");
mysqli_select_db( $con, "b10_22763959_sotredb");
 
   
   if(isset($_POST{'login'})) {

      
      $uname = mysqli_real_escape_string($con,$_POST['username']);
      $pass = mysqli_real_escape_string($con,$_POST['password']); 
   
      $_SESSION['login'] = $uname;
      
      $sql = "SELECT username , password FROM users WHERE username = '$uname' AND password = '$pass' ";
   
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
    
      if($count == 1) {
         
         echo "You Are Now Logged In  ," , "Wellcome    ",$uname ,"        " ;
         echo "<script>setTimeout(\"location.href = 'homepage.php';\",3000);</script>";
       

         $_SESSION['username'] = $_SESSION['login'];
         $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

        
        $query = "CREATE TABLE  `".$uname.".categories` ( Code BIGINT(50)  NOT NULL, Name varchar(255) NOT NULL, price decimal(6,2) NOT NULL, SPrice decimal(6,2) NOT NULL, main_quantity int NOT NULL, sold_quantity int NOT NULL, remaining int NOT NULL, added_quantity int NOT NULL)";

        $query1 = "CREATE TABLE  `".$uname.".dailysales` ( Day varchar(255) , Code BIGINT(50), Name varchar(255),price decimal(6,2) NOT NULL, SPrice int NOT NULL, main_quantity int NOT NULL, sold_quantity int NOT NULL, total_cash decimal(6,2) NOT NULL)";


mysqli_query($con, $query);
mysqli_query($con, $query1);

exit();

      }else {

         echo "Your Login Name or Password is invalid";
      }

      exit();


   }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>log in page</title>


    <!-- Custom styles -->
    <link href="style/sign-style.css" rel="stylesheet">
  </head>

  <body>
    <form action="index.php" method="post" class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="http://www.srmcm.ac.in/images/login.png" alt="" width="110" height="110">
        <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
        <p> Enter User Info To Continue Surfing This Site<a href="https://caniuse.com/#feat=css-placeholder-shown"></a></p>
      </div>
      <div class="form-label-group">
        <input type="text" name="username" id="username" class="form-control" placeholder="UserName" required>
        <label for="username">Username</label>
      </div>

      <div class="form-label-group">
        <input type="text" name="password" id="password" class="form-control" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <div class="sign-btn">
      <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Sign in">
      </div>
      <p class="mt-5 mb-3 text-muted ">&copy; 2017-2018</p>
    </form>
  </body>
</html>
