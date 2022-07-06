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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://bootsnipp.com/snippets/dGWP"> 
    <link  rel="stylesheet" href="about.css">
 
   
    
    </head>
    <body>

    <section class="header"> 
        <nav> 
            <!--adding in the logo for the webspage top left-->
            <a href="homePage.php"> WSSG </a>

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
        <!-- end of nav bar -->


        <div class="text-box">

            <h1 class = "H1"> 
                WSSG
            </h1>

            <p class="history"> 
            WSSG (William, Shirley, Sergio, Gio) is a family owned fast-food shop established in the 
            hospitality industry in 2018 and we have made a big
           impact on the locals of the Mother City(Cape Town) as we've became very 
            recognized for our flame grilling techniques in preparing the foods for our 
            fellow customers as well as delivery, supplying, catering and preparation
           of foods at specials events at which WSSG.
         </p>
            
            

        </div>
    </section>

    <h1 class="H2">OUR MOST MEALS WERE ARE MOST WELL KNOW FOR </h1>

    <!-- Services they  -->
<section class="services-container">

    
    
    <!-- Fast Food -->
      <div class="services-images" >
    
            <img src="images/fastfood.jpg" >
     
              <div class="text">
    
                    <h3 >FAST FOODS  </h3>
              </div>
         </div>
    </div>
    
         <!-- Catering -->
         <div class="services-col">
    
            <img src="images/catering.jpg" >
     
              <div class="text">
    
                    <h3>  CATERING</h3>
              </div>
         </div>
    
         <!-- SPit -->
         <div class="services-col">
    
            <img src="images/spitbraai.jpg" >
     
              <div class="text">
    
                    <h3>SPIT BRAAI  </h3>
              </div>
         </div>
    
    </div>

</section>

<section class="footer">
    
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>

</section>



<!--JavaScript code toggle menu-->
        <script>
                 var navLinks= document.getElementById("navLinks");  
                 function showMenu()
                 {
                    navLinks.style.right ="0";
                 }     
                 
                 function hideMenu()
                 {
                    navLinks.style.right ="-300px";
                 } 
        </script>
</body>
</html>