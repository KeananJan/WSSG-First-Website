<?php
session_start();
include "DB_Connection.php";

if (isset($_SESSION['cID']) && isset($_SESSION[ 'cName']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WSSG</title>

    <!-- used to keep the background there in the homepage -->
    <link  rel="stylesheet" href="./homePage.css?t=<?php echo round(microtime(true)*1000);?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://bootsnipp.com/snippets/dGWP"> 
   
    
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
            <!-- <i class="fa fa-bars" onclick="showMenu()"></i> -->
        </nav>
        <div class="text-box">
            <h1 class = "H1"> 
                WSSG
            </h1>

            <p class="welcome"> 
             
            WELCOME TO WSSG, WHERE WE VALUE AND TREAT ALL OUR CUSTOMERS AS FAMILY AND NOTHING LESS
            <br>
            AND EVERYTHING IS FIREGRILLED TO LAST DEGREE.

            </p>
            </p>
            <!-- this is how links are made -->
            <a href="about.php" class="hero-button">HISTORY OF WSSG</a>
            <link> 

        </div>
    </section>
 
   

<!-- Meals that WSSG is known for  -->
<section class="foods">
<h1 class="H2">OUR MOST MEALS WERE ARE MOST WELL KNOW FOR </h1>
<div class="row">
<!-- burgers and fries -->
  <div class="foods-col">

        <img src="images/B&F.jpg" >
 
          <div class="layer">

                <h3>BURGER AND FRIES  </h3>
          </div>
     </div>

     <!-- Wings -->
     <div class="foods-col">

        <img src="images/wing.jpg" >
 
          <div class="layer">

                <h3>  WINGS</h3>
          </div>
     </div>

     <div class="foods-col">

        <img src="images/pizza.jpg" >
 
          <div class="layer">

                <h3>PIZZA  </h3>
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
<?php
} else
{
    header("Location:loginForm.php" );
    exit();
}
?>