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
    <title>WSSG</title>
    <link  rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://bootsnipp.com/snippets/dGWP"> 
   
    
    </head>
    <body>

    <section class="header"> 
        <nav> 
            <!--adding in the logo for the webspage top left-->
            <a href="homePAGE.html"> WSSG </a>

            <!--adding links-->
            <div class=" navigationbar" id="navigationbar">
                <i class="fa fa-times" onclick="hideMenu()"></i>

                <ul>
                    <li><a href="homePage.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="orderNow.php">ORDER NOW </a></li>
                    <li><a href="userAccount.php">USER ACCOUNT </a></li>
                    <li><a href="loginForm.php">LOG OUT</a></li>
                </ul>

            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <br>
            <h1 class = "H1">  COTACT INFORMATION    </h1>
            <br><br><br>
            
            <p>GIO MEIRING
                <br>
                {HEALTH AND SAFETY}
                <br>
                021 901 1958
                <br>
                <br>
                Keanan January 
                <br>{SALES AND ENQUIRES}
                <br>
                021 901 5445
                <br>
                <br>
                Sergio MEIRING 
                <br>{CEO,CO-FOUNDER AND COURIER}
                <br>
                021 901 5952
                <br> <br> <br>
            SHOP LOCATION
            <BR> 
        <br>
            SANBURY SQUARE SHOPPING  CENTRE<BR>
            CNR OF OLD FAURE & BADEN POWELL DRIVE
            <BR>
            EERSTERIVER
            <BR>CAPE TOWN 
                <BR>7100 </p>
                
         </p>

         
        </div>
        

    </section>

</div>
<div class="contactForm">
    <legend>
        <form id="form"   method="GET" >
            <H1> CONTACT ME</H1>
    
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name">
            <br>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name">
            <br>
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phon" placeholder="Phone Number">
            <br>
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" placeholder="Email Address">
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        <br>
            <input type="submit" value="Submit">
        <br>
          </form>
    </legend>
    
</div>

</section>

<section class="footer">
    
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>

</section>



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

        
</body>
</html>