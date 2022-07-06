<?php

session_start(); 
include "DB_Connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WSSG LOGIN</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
<form  action="login.php" method="POST"  >

<div class="container">

    <h1 class="one">LOGIN</h1>

    <!-- this is used to display the error when one of the fields are empty  -->
    <?php if(isset($_GET['error'])) { 
      ?>
      <!-- this code doesn't run for some reason -->
      <?php $message = $_GET['error'];
      echo"<script type='text/javascript'>alert('$message');</script>";
      ?> 

    <?php } ?>
<!--  -->
    <p class="one">To login into your account fill in this form</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" reuired>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

   <button type="submit"  class="loginbtn">Login</button>

    <div class="container register">
    <p class="one" >Already have an account? <a href="registerForm.php">Register </a>.</p>
  </div>

</form>


</body>
</html>