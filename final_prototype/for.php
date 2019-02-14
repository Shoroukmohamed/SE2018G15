<?php
$name = $_POST['name'];
$password = $_POST['password'];
$mom = $_POST['mom'];
$email = $_POST['email'];
$age = $_POST['age'];
$which = $_POST['which'];
$Number = $_POST['Number'];
if (!empty($name) || !empty($password) || !empty($mom) || !empty($email) ||
!empty($which) || !empty($Number)) {
    $host = "localhost";
    $dbusername = "root";
    $dbPassword = "";
    $dbname = "form";
    //create connection
    $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From mom Where email = ? Limit 1";
     $INSERT = "INSERT Into mom (name, password, email, mom, which, Number) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $name, $password, $mom, $email, $which, $Number);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
