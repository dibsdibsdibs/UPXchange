<?php

include 'dbconnector.php';
    session_start();
    $error = "";

if(isset($_POST['upmail']) && isset($_POST['password'])){
    
   $upmail = mysqli_real_escape_string($conn, $_POST['upmail']);
   $password = md5($_POST['password']);

   $select = " SELECT * FROM users WHERE upmail = '$upmail' && password = '$password'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['upmail'] = $upmail;
      header('location:home.html');
   }
   elseif (empty($_POST["upmail"]) || empty($_POST["password"])){
      $error = 'Please fill up the necessary field';
      $_SESSION["error"] = $error;
      header("Location: login.php");
   }
   else{
      $error = 'Login failed. Invalid UPmail or password';
      $_SESSION["error"] = $error;
      header("Location: login.php");
   }

}
?>