<?php
   session_start();
   if(isset($_POST['edit']))
   {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $sql = mysqli_query($conn,$select);
      $row = mysqli_fetch_assoc($sql);
      if($res === $id)
      {
         $update = "update users set fname='$fname',lname='$lname',email='$email' where id='$id'";
         $sql2=mysqli_query($conn,$update);
      }

?>