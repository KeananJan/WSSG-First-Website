<?php

session_start(); 
include "DB_Connection.php";

$id = $_SESSION['a_id'];
// echo"<script type='text/javascript'>alert('$id');</script>";

// DELETE FROM clientsorders WHERE cID=3;
// delete example!

// to collect the customers information from the database 
$sqlFetch =  "SELECT * FROM adminusers WHERE a_id = '$id'";
      $results = mysqli_query($conn,$sqlFetch);

        if(mysqli_num_rows($results) === 1)
        {
            //gets the results from the database
            $row = mysqli_fetch_assoc($results);

            // sessions varaiables beening set 
            $_SESSION['aEmail'] =$row['aEmail'];
            $_SESSION['aName'] =$row['aName'];
            $_SESSION['aSurname'] =$row['aSurname'];  
            $_SESSION['aPhone'] =$row['aPhone'];
            $_SESSION['aPassword'] =$row['aPassword'];   
            

        }

        // Collect user info
        $sqlFetch =  "SELECT * FROM clients";
        $results = mysqli_query($conn,$sqlFetch);
  
  
          if(mysqli_num_rows($results) >0)
          {
              //gets the results from the database
              $row = mysqli_fetch_assoc($results);
  
              // sessions varaiables beening set 
              $_SESSION['cEmail'] =$row['cEmail'];
              $_SESSION['cName'] =$row['cName'];
              $_SESSION['cSurname'] =$row['cSurname'];
              $_SESSION['cPhone'] =$row['cPhone']; 
  
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
               ->

                <ul>
                 
                    <li><a href="loginForm.php">LOG OUT</a></li>
                </ul>

            </div>
            
        </nav>
        <div class="text-box">
            <h1 class = "H1"> 
                ADMIN PANEL
            </h1>
            
<!-- user -->    
       <form method= POST  action = "adminUpdate.php">

       <button type="button" class="updatebtn">Update User Infomation</button>

        <div class="updateInfo">

        <H3 class="one"> Update/Change User Infromation</H3>

        <label for="name"><b>Name</b></label>
        <input type="text" value ="<?php echo $_SESSION['aName'];?>" name="name" id="name" >

        <label for="surname"><b>Surname</b></label>
        <input type="text" value ="<?php echo $_SESSION['aSurname'];?>" name="surname" id="surname" >

        <label for="email"><b>Email</b></label>
        <input type="text" value ="<?php echo $_SESSION['aEmail'];?>" name="email" id="email">

        <label for="Phone Number"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" value ="<?php echo $_SESSION['aPhone'];?>" name="phoneNum" id="phoneNum"  >

        <label for="password"><b>Password (Only enter if you want to change your password)</b></label>
        <input type="text" placeholder="Enter Password"  value ="<?php echo $_SESSION['aPassword'];?>" name="password" id="password"  >

        <button type="submit" class="updatebtn">Update</button>

        </div>
        
        

       </form>

<!-- delete admin users(clients) -->
    <form method = POST  action = "deleteInfo.php">

        <button type="button" class="updatebtn">Delete Admin User Infomation</button>

        <div class="updateInfo">

        <label for="email"><b>Email</b></label>
        <input type="text" name="email" id="email">

        <button type="submit" class="updatebtn">Delete</button>

        </div>
        
    </form>
              
<!-- adding a new admin user -->  

        <form method= POST  action = "adminInsert.php">

        <button type="button" class="updatebtn">Add A New Admin User</button>

        <div class="updateInfo">

        <H3 class="one"> Add A New Admin User</H3>

        <label for="name"><b>Name</b></label>
        <input type="text"  name="name" id="name" >

        <label for="surname"><b>Surname</b></label>
        <input type="text"  name="surname" id="surname" >

        <label for="email"><b>Email</b></label>
        <input type="text" name="email" id="email">

        <label for="phone"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="phone" id="phoneNum" >

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password"  >

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Re-Password" name="password" id="password" >

        <button type="submit" class="updatebtn">INSERT</button>

        </div>
 
    </form>

<!-- insert foods -->
    <form method = POST  action = "foodsInsert.php">

        <button type="button" class="updatebtn">Add Foods</button>

        <div class="updateInfo">

        <label for="FfD"><b>Food ID</b></label>
        <input type="text" name="foodID" id="foodID">

        <label for="fName "><b>Food Name</b></label>
        <input type="text" name="fName" id="fName">

        <label for="fPrice"><b>Food Price</b></label>
        <input type="text" name="fPrice" id="fPrice">

        <label for="catergoryID"><b>Catergory</b></label>
        <input type="text" name="catergoryID" id="catergoryID">

        <button type="submit" class="updatebtn">Insert</button>

        </div>
        
    </form>
<!-- Remove foods -->
    <form method = POST  action = "deleteFoods.php">

        <button type="button" class="updatebtn">Delete Foods</button>

        <div class="updateInfo">

        <label for="fID"><b>Food ID</b></label>
        <input type="text" name="fID" id="fID">

        <button type="submit" class="updatebtn">Delete</button>

        </div>
        
    </form>
<!-- Check all orders  -->
    <form method = POST  action = "deleteInfo.php">

        <button type="button" class="updatebtn">Check all orders</button>

        <div class="updateInfo">

        <Textarea readonly rows="50" cols="50">
            <?php

             $sql =  "SELECT * FROM clientsorders";
             $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                if($row = $result->fetch_assoc()) 
                {
                    echo("Order ID :".$_SESSION['orderID']."\n");
           
                    echo("Customer Name :".$_SESSION['cName']."\n");
                   
                    echo("Customer Surname :".$_SESSION['cSurname']."\n");
                    
                    echo("Food ID :".$_SESSION['foodID']."\n");
                    
                    echo("Order Date :".$_SESSION['orderDate']."\n");
                    
                    echo("Quantity :".$_SESSION['quantity']."\n") ;
                  
                }
            } else 
            {
                echo "No results";
            }
        
        //     $sqlFetch =  "SELECT * FROM clientsorders";
        //     $results = mysqli_query($conn,$sqlFetch);
      
        //       if(mysqli_num_rows($results) >0)
        //       {
        //           //gets the results from the database
        //           $row = mysqli_fetch_assoc($results);
        //         //gets the results from the database
        //     // $row = mysqli_fetch_assoc($results);

        //     // sessions varaiables beening set 
        //     $_SESSION['orderID'] =$row['orderID'];
        //     $_SESSION['foodID'] =$row['foodID'];
        //     $_SESSION['orderDate'] =$row['orderDate'];
        //     $_SESSION['quantity'] =$row['quantity'];
        //     }
                       
           
        // echo("Order ID :".$_SESSION['orderID']."\n");
           
        // echo("Customer Name :".$_SESSION['cName']."\n");
       
        // echo("Customer Surname :".$_SESSION['cSurname']."\n");
        
        // echo("Food ID :".$_SESSION['foodID']."\n");
        
        // echo("Order Date :".$_SESSION['orderDate']."\n");
        
        // echo("Quantity :".$_SESSION['quantity']."\n");

            ?>
        </Textarea>

        <button type="submit" class="updatebtn">Get All</button>

        </div>
        
    </form>
    
    </div>
    </section>

    <section class="footer">
    
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>

</section>


</body>
</html>