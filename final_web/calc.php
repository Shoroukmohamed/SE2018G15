<?php
if (isset($_POST['submit'])) {  
    extract($_POST); 
    $host = "sql311.epizy.com";
    $dbusername = "epiz_23455142";
    $dbPassword = "7QXe8FF1Jlgm";
    $dbname = "epiz_23455142_MOM";
    //create connection
    $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);
    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    } 

      $anemia=$_POST["anemia"];
      $suger=$_POST["suger"];
      $pressure=$_POST["pressure"];
      $weight=$_POST["weight"];
      $week=$_POST["week"];
      $email=$_POST["email"];

      $sql = "INSERT Into calc (anemia, suger, pressure, weight, week) values('$anemia','$suger','$pressure','$weight','$week')";

      if ($conn->query($sql) === TRUE) {  
        //echo "succues";  
        header("location:profile (2).php");
    } else {  
        echo "error" . $conn->error;  
    }  

   
     
     
    $conn->close();  
}  
?> 
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>calc form</title>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/calc.css">
    <script src="js/calc.js"></script>
  </head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-light px-5">
    <a class="navbar-brand px-5" href="MOM.html">
      <img src="imgs/logo.png" width="50%" height="16%" alt="MOM">
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
          <a class="nav-link" href="nutrition.html">Nutrition</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="exercises.html">Exercises</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="babies.html">Babies</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="login.php">Log in</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="kholoud.php">Sign up</a>
        </li>
      </ul>
    </div>
  </nav>

  <div id="calc">
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h3 class="mt-5">Let's do some tests quickly</h3>
          <form class="quick-tests mt-4"action="" method="POST" >
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Anemia analysis</label>
              <div class="col-sm-3">
                <input type="text" name="anemia" class="form-control form-control-sm" id="anemia" required>
              </div>
              <div id="anemia-output"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Sugar Analysis</label>
              <div class="col-sm-3">
                <input type="text" name="suger" class="form-control form-control-sm" id="suger" required>
              </div>
              <div id="suger-output"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">blood pressure measurement</label>
              <div class="col-sm-3">
                <input type="text" name="pressure" class="form-control form-control-sm" id="pressure" required>
              </div>
              <div id="pressure-output"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Add your weight</label>
              <div class="col-sm-3">
                <input type="text" name="weight" class="form-control form-control-sm" id="weight" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Add Baby week</label>
              <div class="col-sm-3">
                <input type="text" name="week" class="form-control form-control-sm" id="week" required>
              </div>
            </div>

            <div class="col-auto ml-5 mt-4">
              <button class="btn btn-dark mb-2 ml-5" name="submit" onclick="Check()">Check</button>
            </div>
          </form>
        </div>
        <div class="col-2">
          <img class="clac-mom" src="imgs/woman-pregnant.jpg" alt="mom">
        </div>
      </div>

    </div>
  </div>
  <script src="js\jquery-3.3.1.min.js"></script>
  <script src="js\bootstrap.min.js"></script>
</body>
</html>