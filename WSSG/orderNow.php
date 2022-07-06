<?php
session_start();
include "DB_Connection.php";

$id = $_SESSION['cID'];
  // Collect Foods info
  $sqlFetch =  "SELECT * FROM foods";
  $results = mysqli_query($conn,$sqlFetch);


    if(mysqli_num_rows($results) >0)
    {
        //gets the results from the database
        $row = mysqli_fetch_assoc($results);

        // sessions varaiables beening set 
        $_SESSION['fID'] =$row['fID'];
        $_SESSION['fName'] =$row['fName'];
        $_SESSION['fPrice'] =$row['fPrice'];
        $_SESSION['categoryID'] =$row['categoryID']; 

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
    
    <title> PLACE ORDER</title>
    <link rel="stylesheet" href="orderNow.css">
    <link rel="stylesheet" href="quantity.css">        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://bootsnipp.com/snippets/dGWP"> 
</head>
<body>
    <div>
        
    </div>
    <section class="header"> 
        <nav> 
            <!--adding in the logo for the webspage top left-->
            <a href="homePage.php"> WSSG </a>

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
                PLACE ORDER
            </h1>
            
 <!-- PIZZA -->    
       <form method ="POST" action="#">

        <div class="orderNowMenu">

        <legend>

            <div>
        <label for="pizza"><b>PIZZA</b></label><br>
<!-- Chicken -->
        <input type="checkbox" id="orderNum" name="pizza" value="Chicken Pizza">
        <label for="chicken"> Chicken</label><br>

        <label for="quant"><b>Quantity</b></label>
        <input type="number" min="0" max="5" name="quant" id="quant">
        <br>
        

       
        
<!-- BBQ -->
        <input type="checkbox" id="BBQ" name="pizza" value="BBQ Pizza" >
        <label for="BBQ">BBQ</label><br>

        <label for="quant"><b>Quantity</b></label>
        <input type="number" min="0" max="5" name="quant" id="quant">
        <br>
        
<!-- SPICY PINEAPPLE -->
        <input type="checkbox" id="Spicy Pineapple" name="pizza" value="Spicy Pineapple Pizza" >
        <label for="Spicy Pineapple">Spicy Pineapple </label><br>
        
        <label for="quant"><b>Quantity</b></label>
        <input type="number" min="0" max="5" name="quant" id="quant">
        <br>
        <br>

            </div>
<!--             
        <div class="wings">
            <br>
            <label for="wings"><b>WINGS</b></label>
            <br>
            <input type="checkbox" id="Chicken" name="wings" value="Chicken">
            <label for="Chicken"> Chicken</label><br>

            <input type="checkbox" id="Beef" name="wings" value="Beef">
            <label for="Beef"> Beef</label><br>

            </div>

            <div class="burger ">
                <br>
                <label for="wings"><b>Burger  </b></label>
                <br>
                <input type="checkbox" id="Chicken" name="wings" value="Chicken">
                <label for="Chicken"> Chicken</label><br>
    
                <input type="checkbox" id="Beef" name="wings" value="Beef">
                <label for="Beef"> Beef</label><br>
    
            </div>
                <div class="fries ">
                    <br>
                    <label for="fries"><b>Fries  </b></label>
                    <br>
                    <input type="checkbox" id="small" name="fries" value="Small Fries">
                    <label for="small"> Small Fries</label><br>
        
                    <input type="checkbox" id="medium" name="fries" value="Medium Fries">
                    <label for="Bemediumef"> Medium Fries</label><br>

                    <input type="checkbox" id="large" name="fries" value="Large Fries">
                    <label for="large"> Large Fries</label><br>
        
                    </div>
        </legend>

        <div>
            <input type="submit"  class="addBtn" name="submit" value="checkOut">
        </div>

        </div>

        <br>
        <br>
        </form> -->

       
    </section>

    <section class="footer">
    
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>

</section>

<?php

// if (isset($_POST['gender'])){ echo $_POST['gender']; // Displays value of checked checkbox. }

while(isset($_POST['pizza']))
{ 
    $today = date("Y-m-d");
    $foodSelcted = $_POST['pizza'];

    // Collect Foods info
    $sqlFetch =  "SELECT * FROM foods WHERE fName ='$foodSelcted'";
    $results = mysqli_query($conn,$sqlFetch);
  
  
      if(mysqli_num_rows($results) == 1)
      {
          //gets the results from the database
          $row = mysqli_fetch_assoc($results);
  
          // sessions varaiables beening set 
          $_SESSION['fID'] =$row['fID'];
          $_SESSION['fName'] =$row['fName'];
          $_SESSION['fPrice'] =$row['fPrice'];
          $_SESSION['categoryID'] =$row['categoryID']; 
  
      }
      $fID=$_SESSION['fID'];
      $quant = $_POST['quant'];
    $itemTot =  $quant * $_SESSION['fPrice'];
    echo ("<script>alert('$itemTot');</script>");

    $insert = "INSERT INTO clientsorders 
                 (cID, foodID, orderDate,quantity) 
                 VALUES 
                 ('$id','$fID','$today; ','$quant')";

        if ($conn->query($insert) === TRUE) 
        {
            echo ("<script>alert('Order Place!');</script>");
            echo("<script>window.location ='orderNow.php';</script>");
        } 
        else 
        {
            
            echo ("<script>alert('Order Not Placed!');</script>");
            echo("<script>window.location ='orderNow.php';</script>");
        }
}
// else if(isset($_POST['pizza']))
// { 
//     $today = date("Y-m-d");
//     $foodSelcted = $_POST['pizza'];

//     // Collect Foods info
//     $sqlFetch =  "SELECT * FROM foods WHERE fName ='$foodSelcted'";
//     $results = mysqli_query($conn,$sqlFetch);
  
  
//       if(mysqli_num_rows($results) == 1)
//       {
//           //gets the results from the database
//           $row = mysqli_fetch_assoc($results);
  
//           // sessions varaiables beening set 
//           $_SESSION['fID'] =$row['fID'];
//           $_SESSION['fName'] =$row['fName'];
//           $_SESSION['fPrice'] =$row['fPrice'];
//           $_SESSION['categoryID'] =$row['categoryID']; 
  
//       }
//       $fID=$_SESSION['fID'];
//       $quant = $_POST['quant'];
//     $itemTot =  $quant * $_SESSION['fPrice'];
//     echo ("<script>alert('$itemTot');</script>");

//     $insert = "INSERT INTO clientsorders 
//                  (cID, foodID, orderDate,quantity) 
//                  VALUES 
//                  ('$id','$fID','$today; ','$quant')";

//         if ($conn->query($insert) === TRUE) 
//         {
//             echo ("<script>alert('Order Place!');</script>");
//             echo("<script>window.location ='orderNow.php';</script>");
//         } 
//         else 
//         {
            
//             echo ("<script>alert('Order Not Placed!');</script>");
//             echo("<script>window.location ='orderNow.php';</script>");
//         }
        
//     }


?>

</body>
</html>