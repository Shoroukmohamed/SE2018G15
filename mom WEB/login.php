<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 

      $sql = "SELECT * FROM mother WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) 
      {
    //     session_register("email");
         $_SESSION['email'] = $myemail;

         //go to the mom profile page

         header("location: welcome.php");
      }
      else 
      {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="css/fontawesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/MOM.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<style>
    #q{
    margin-top: 200px;
    }
    .h{
        margin-left: 30%;
    }
</style>
<body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-5 fixed-top" >
            <a class="navbar-brand px-5" href="#">
              <img src="imgs/logo.png" width="50%" height="50%" alt="MOM">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#momnav" aria-controls="momnav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="momnav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active px-3">
                  <a class="nav-link" href="MOM.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link" href="#">Nutrition</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link" href="#">Exercises</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link" href="#">Babies</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link" href="#">Log in</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link" href="signup.html">Sign up</a>
                </li>
              </ul>
            </div>
          </nav>

<div class="bg-secondary">
<div class="row" id="q" >
    <div class="col col-sm-6 col-lg-6 col-md-5" ><img class="float-right" src="imgs/4.png"> </div>
    <div class="col col-sm-6 col-lg-6 col-md-7" class="bg-danger">
  <h2 class="h">sign in</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </div>
</div>
</body>
</html>



