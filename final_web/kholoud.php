<?php
session_start();
//$con=mysql_connect("localhost","root","");

//mysql_select_db("mom");
$host = "sql311.epizy.com";
    $dbusername = "epiz_23455142";
    $dbPassword = "7QXe8FF1Jlgm";
    $dbname = "epiz_23455142_MOM";
    $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);
    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    } 

if(isset($_POST['reg_doctor'])){
$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$phone=$_POST["phone"];
$grade=$_POST["graduated"];
$hospital=$_POST["hospital"];
$university=$_POST["university"];
/*if($name=''||$email=''||$pass=''||$phone=''||$grade=''||$hospital='' ||$university=''){
echo " there is aprobleme";}*/
$sql = "INSERT Into doctor (name,password,email,mobile,year,hospital,university) values
('$name','$email','$pass','$phone','$grade','$hospital','$university')";
//$q=mysql_query("insert into doctor (name,password,email,mobile,year,hospital,university) values
//('$name','$email','$pass','$phone','$grade','$hospital','$university')");

if ($conn->query($sql) === TRUE) {  
         header("location:calc.php");
     // echo "succues"; 
    } else {  
        echo "error" . $conn->error;  
    }  


/*if ($q)
{
  header("location:selectALl.php");
}
else
{
  echo "probleme";

}*/
 }
if(isset($_POST['reg_mom'])){
$name=$_POST["name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$phone=$_POST["phone"];
$age=$_POST["age"];
$status=$_POST["status"];

$sql = "INSERT Into mother (name,email,password,mobile,age,status) values
('$name','$email','$pass','$phone','$age','$status')";
//$q=mysql_query("insert into mother (name,email,password,mobile,age,status) values
//('$name','$email','$pass','$phone','$age','$status')");
if ($conn->query($sql) === TRUE) {  
        header("location:calc.php");  
    } else {  
        echo "error" . $conn->error;  
    }  


/*if ($q)
{
  header("location:selectALl.php");
}
else
{
  echo "probleme";

}*/
}

//mysql_close($con);
$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mom</title>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/doctor.css">
    <link rel="stylesheet" href="css/MOM.css">
    <link rel="stylesheet" href="css/kholoud.css">
    
    
    
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<style>
  .s{
    /* background-image: url("imgs/doc.jpg");
    background-repeat: no-repeat;
    background-position: center;*/

  
    
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





<!-- form-->

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class"links">
        <li class="signin-active"><a class="btn">doctors</a></li>
        <li class="signup-inactive"><a class="btn">mothers </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
                <form class="form-signin" action="" method="post" name="form">
          <label for="username"><i class="fa fa-user-md"></i>Username</label>
          <input class="form-styling" type="text" name="name" placeholder="" required/>
          <label for="password">
          <i class="fa fa-key" aria-hidden="true"></i>Password</label>
         <input class="form-styling" type="text" name="password" placeholder="" required/>
         <label for="username">
          <i class="fa fa-envelope-o" aria-hidden="true"></i>email</label>
          <input class="form-styling" type="text" name="email" placeholder="" required/>
          <label for="username">
           <i class="fa fa-mobile" aria-hidden="true"></i>mobile number</label>
          <input class="form-styling" type="text" name="phone" placeholder="" required/>
          <label for="username">
          <i class="fa fa-graduation-cap" aria-hidden="true"></i>graduated at</label>
          <input class="form-styling" type="text" name="graduated" placeholder="" required/>
          <label for="username">
          <i class="fa fa-hospital-o" aria-hidden="true"></i>hospital</label>
          <input class="form-styling" type="text" name="hospital" placeholder="" required/>

          <label for="username">
          <i class="fa fa-university" aria-hidden="true"></i>choose university</label>
         
          <select class="form-styling"  name="university" required>
                              <option></option>
                              <option>ain shams</option>
                              <option>cairo</option>
                              <option>helwan</option>
                              <option>other</option>
                            </select>

           
         
          <div class="btn-animate">
           <button class="btn-signin" type="submit" value="sign in" name="reg_doctor">sign up</button> 
          </div>
                </form>
        
                <form class="form-signup" action="" method="post" name="form">
                  
            <label for="fullname">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>Full name</label>
          <input class="form-styling" type="text" name="name" placeholder="" required/>
          <label for="email">
          <i class="fa fa-envelope-o" aria-hidden="true"></i>Email</label>
          <input class="form-styling" type="text" name="email" placeholder="" required/>
          <label for="password">
          <i class="fa fa-key" aria-hidden="true"></i>Password</label>
          <input class="form-styling" type="text" name="password" placeholder="" required/>
          <label for="confirmpassword">
          <i class="fa fa-mobile" aria-hidden="true"></i>mobile number</label>
          <input class="form-styling" type="text" name="phone" placeholder="" required/>
          <label for="password"><i class="fas fa-hourglass-half"></i>Age</label>
          <input class="form-styling" type="text" name="age" placeholder="" required/>
          <label for="username"><i class="fa fa-hospital-o"></i>Status</label>
         
          <select class="form-styling"  name="status" required>
                              <option></option>
                              <option>Preganacy</option>
                              <option>Mother</option>
                            </select>
          <div class="btn-animate">
           <button class="btn-signin" type="submit" value="sign in" name="reg_mom">sign up</button> 
          </div>
                </form>
      
           
      </div>
      
     
      </div>

</div>
<!--end of form -->


    <footer>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                  <ul class="list-inline text-center">
                    <li class="list-inline-item">
                      <a href="#">
                        <span class="fa-stack fa-lg">
                          <i class="fas fa-circle fa-stack-2x"></i>
                          <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <span class="fa-stack fa-lg">
                          <i class="fas fa-circle fa-stack-2x"></i>
                          <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <span class="fa-stack fa-lg">
                          <i class="fas fa-circle fa-stack-2x"></i>
                          <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                  </ul>
                  <p class="copyright text-muted text-center">Copyright &copy; MOM 2018</p>
                </div>
              </div>
            </div>
          </footer>
          
          <script src="js\jquery-3.3.1.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
          <script src="js\bootstrap.min.js"></script>
          <script src="js\kholoud.js"></script>
        </body>
      </html>
      