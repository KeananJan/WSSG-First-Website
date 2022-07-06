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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <section class="regForm">

  <form class="regForm" action="register.php" method ="POST">

  <div class="container">

  <?php if(isset($_GET['error'])) 
  { 
      ?>
      <!-- this code doesn't run for some reason -->
      <?php $message = $_GET['error'];
      echo"<script type='text/javascript'>alert('$message');</script>";
      ?>
       <?php } ?>

    <h1>Register</h1>
    
    <p class="one">Please fill in this form to create an account.</p>
    <hr>
    <label for="surname"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="fname" required>

    <label for="surname"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="surname" id="lname" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <label for="password-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password-repeat" id="password-repeat" required>
    
    <label for="phone-number"><b>Phone Number</b></label>
    <input type="text"  placeholder="Enter Phone Number" name="phoneNum" id="phoneNum"  required>
    
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

</form>

  </section>
      
<div class="containerSignin">
    <p class="one">Don't have an account? <a href="loginForm.php">Sign in</a>.</p>
  </div>

</body>

<!--JavaScript validation-->
<script>
    const fName = document.getElementById('fname');
    const lName = document.getElementById('lname');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const form = document.getElementById('form');


  
form.addEventListener('submit', e=>
{
  const textfieldValid = /^[a-zA-Z]+$/;
  //trim removal of the white spaces

     const fNameValue = fName.value.trim();
     const lNameValue = lName.value.trim();
     const emailValue = email.value.trim();
   
     
   //checking if all the fields and checkboxed are empty/null
     if( fNameValue ==='' || lNameValue ==='' || emailValue ==='') 
    {
     
      //this stops the pages from refreshing
      e.preventDefault();
      
       alert("All the fields are mandatory, so you've missed some fields ");
    } 
    
    else if( !fNameValue.match(textfieldValid) ||!lNameValue.match(textfieldValid) )
    {
      e.preventDefault();
      alert("First Name  or Last Name Contains Numbers");

      return false;
    }

    //checks email format is correct
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailValue))
  {
    //checks if all the fields have been entered 
    if (fNameValue.match(textfieldValid)  &&  lNameValue.match(textfieldValid)  &&emailValue !=='' )
     {
       alert("Form is completed One of our employees will get into contact with you so!");
       
      }
    return (true)
  } 
  else if(emailValue != /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailValue))
  {
    e.preventDefault();
    alert("You have entered an invalid email address!")
    return (false)
  }

});

        </script>
</html>