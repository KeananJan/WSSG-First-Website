<?php

session_start(); 
include "DB_Connection.php";





// to collect the customers information from the database 
$id = $_SESSION['cID'];
$sqlFetch =  "SELECT * FROM clients WHERE cID = '$id'";
      $results = mysqli_query($conn,$sqlFetch);


        if(mysqli_num_rows($results) === 1)
        {
            //gets the results from the database
            $row = mysqli_fetch_assoc($results);

            // sessions varaiables beening set 
            $_SESSION['cEmail'] =$row['cEmail'];
            $_SESSION['cName'] =$row['cName'];
            $_SESSION['cSurname'] =$row['cSurname'];
            $_SESSION['cPhone'] =$row['cPhone']; 
            $_SESSION['cPassword'] =$row['cPassword']; 


        }
    
    
      
// To collect the bank information from the databse 
$id = $_SESSION['cID'];
      $sqlFetch =  "SELECT * FROM banking WHERE cID = '$id'";
      $results = mysqli_query($conn,$sqlFetch);

        if(mysqli_num_rows($results) === 1)
        {
            //gets the results from the database
            $row = mysqli_fetch_assoc($results);

            // sessions varaiables beening set 
            $_SESSION['bName'] =$row['bName'];
            $_SESSION['ccv'] =$row['ccv'];
            $_SESSION['cardNum'] =$row['cardNum'];
            $_SESSION['bType'] =$row['bType'];

                       
        }
        elseif(mysqli_num_rows($results) === 0)
        {
            //gets the results from the database
            $row = mysqli_fetch_assoc($results);

            // sessions varaiables beening set 
            $_SESSION['bName'] ='None';
            $_SESSION['ccv'] ='None';
            $_SESSION['cardNum'] ='None';
            $_SESSION['bType'] ='None';

                       
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <style>
         <?php include "userAccount.css"?>
    </style> -->
    
    <title>ACCOUNT</title>
    <link rel="stylesheet" href="userAccount.css">       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://bootsnipp.com/snippets/dGWP"> 
    <script defer type="text/javascript" src="script.js"></script>
</head>
<body>
    <div>
        
    </div>
    <section class="header"> 
        <nav> 
            <!--adding in the logo for the webspage top left-->
            <a href="homePAGE.html"> WSSG </a>

            <!--adding links-->
            <div class=" navigationbar" id="navigationbar">
                <!-- <i class="fa fa-times" onclick="hideMenu()"></i> -->

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
                USER ACCOUNTS SETTINGS
            </h1>
            
 <!-- user -->    
       <form method= POST  action = "updateClients.php">

       <button type="button" class="updatebtn">Update User Infomation</button>

        <div class="updateInfo">

        <H3 class="one"> Update/Change User Infromation</H3>

        <label for="name"><b>Name</b></label>
        <input type="text" value ="<?php echo $_SESSION['cName'];?>" name="name" id="name" >

        <label for="surname"><b>Surname</b></label>
        <input type="text" value ="<?php echo $_SESSION['cSurname'];?>" name="surname" id="surname" >

        <label for="email"><b>Email</b></label>
        <input type="text" value ="<?php echo $_SESSION['cEmail'];?>" name="email" id="email">

        <label for="Phone Number"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" value ="<?php echo $_SESSION['cPhone'];?>" name="phoneNum" id="phoneNum"  >

        <label for="password"><b>Password (Below shows the encyption of the password but Only enter a number if you want to change your password)</b></label>
        <input type="text" placeholder="Enter Password"  value ="<?php echo $_SESSION['cPassword'];?>" name="password" id="password"  >


        <button type="submit" class="updatebtn">Update</button>

        </div>
        
        

       </form>

<!-- bank -->

    <form method = POST  action ="updateBank.php">

        <button type="button" class="updatebtn">Update Bank Infomation</button>

        <div class="updateInfo">

        <H3 class="one"> Update/Change Bank Details</H3>

        <label for="bName"><b>Bank Name</b></label>
        <input type="text" value ="<?php echo $_SESSION['bName'];?>" name="bName" id="bName" >

        <label for="cardNumber"><b>Card Number</b></label>
        <input type="text" value ="<?php echo $_SESSION['cardNum'];?>" name="cardNum" id="cardNum" >

        <label for="ccvNum"><b>CCV</b></label>
        <input type="text" value="<?php echo $_SESSION['ccv'];?>" name="ccvNum" id="ccvNum" >

        <label for="bType"><b>Bank Card Type</b></label>
        <input type="text" value="<?php echo $_SESSION['bType'];?>" name="bType" id="bType" >

        <button type="submit" class="updatebtn">Update</button>

        </div>
        
    </form>
<!-- Insert Bank -->
<form method = POST  action ="bankInsert.php">

<button type="button" class="updatebtn">Insert Bank Infomation</button>

<div class="updateInfo">

<H3 class="one"> Update/Change Bank Details(Note that if insert new card credentials the previous cards data will override with the new data )</H3>

<label for="bName"><b>Bank Name</b></label>
<input type="text" placeholder="Enter Bank Name" name="bName" id="bName" >

<label for="cardNumber"><b>Card Number</b></label>
<input type="text" placeholder="Enter Card Number" name="cardNum" id="cardNum" >

<label for="ccvNum"><b>CCV</b></label>
<input type="text" placeholder="Enter CCV " name="ccvNum" id="ccvNum" >

<label for="bType"><b>Bank Card Type</b></label>
<input type="text" placeholder="Enter Bank Card Type" name="bType" id="bType" >

<button type="submit" class="updatebtn">Insert</button>

</div>
</form>

<!-- Delete User -->
<form method = POST  action = "deleteClient.php">

<button type="button" class="updatebtn">Delete User</button>

<div class="updateInfo">

<H3 class="one"> Delete User</H3>

<label for="choice"><b>Type Yes to Delete</b></label>
<input type="text"  name="choice" id="choice" >


<button type="submit" class="updatebtn">Delete</button>

</div>
</form>
    
</div>
<section class="footer">
    
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>

</section>


</body>
</html>