<?php
include "DB_Connection.php";
session_start(); 


if (isset($_POST['email']) && isset($_POST['password']) )
{
    
    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        $data =ucfirst($data);

        return $data;

    }
    $email = validation($_POST['email']);
    $password = validation($_POST['password']);

    function passwordEncryption($data)
    {
        // passowrd encryption
        $data = md5($data);
        return $data;
    }
    $password = passwordEncryption($_POST['password']);

    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }

    $email =upperCase($_POST['email']);

    
// checks if the email field is empty 
    if(empty($email))
    {
        header("Location:loginForm.php?error=Email/Username is needed!");
        exit();
    }
    // checks if the password field is empty 
    else if(empty($password))
    {
        header("Location:loginForm.php?error=Password is needed!" );
        exit();
    }
    else
    {
        // SQL statement to check what the user entered against what we have in the database 
        $sql = "SELECT *FROM clients WHERE  cEmail='$email'AND cPassword='$password'";

        $results = mysqli_query($conn,$sql);

        if(mysqli_num_rows($results) === 1)
        {
            //gets the results from the database
            $row = mysqli_fetch_assoc($results);

            // sessions varaiables beening set 
            $_SESSION['cID'] =$row['cID'];
            $_SESSION['cEmail'] =$row['cEmail'];
            $_SESSION['cName'] =$row['cName'];
            $_SESSION['cSurname'] =$row['cSurname'];

            

            //  $message = $_SESSION['cSurname'];
            // echo"<script type='text/javascript'>alert('$message');</script>";

            header("Location:homePage.php" );
            exit();
            
            // checks whether what user entered corresponds with the database 
            // and if so the user gets logged in
            if($row['cEmail'] === $email && $row['cPassword'] === $password)
            {
                $message ="Logged In!";
                echo"<script type='text/javascript'>console.log('$message');</script>";
            }

            // if inserted data doesn't correspond with the data in the databse the below will be displayed
            else
            {
            header("Location: loginForm.php?error=Incorrect Email/Username or Password" );
            exit(); 
            }
        }
    //    this is for the log in of the admin page 
    // it first check of the entered data exist in the table 
    // based off the previous sql statement then executes
    // the following code
        else if(mysqli_num_rows($results) === 0)
        {
            $sqladmin = "SELECT *FROM adminusers WHERE  aEmail='$email'AND aPassword='$password'";

            $results = mysqli_query($conn,$sqladmin);

            if(mysqli_num_rows($results) === 1)
        {
            //gets the results from the database
            $row = mysqli_fetch_assoc($results);

            // sessions varaiables beening set 
            $_SESSION['a_id'] =$row['a_id'];
            $_SESSION['aEmail'] =$row['aEmail'];
            $_SESSION['aName'] =$row['aName'];
            $_SESSION['aSurname'] =$row['aSurname'];

            

            

            //  $message = $_SESSION['cSurname'];
            // echo"<script type='text/javascript'>alert('$message');</script>";

            header("Location:adminPage.php" );
        exit();

        }
        else
        {
            header("Location: loginForm.php?error=Incorrect Email/Username or Password" );
            exit(); 
        }
    }}
}
else
{
    // this allows the website to open on the correct page 
    header("Location: loginPage.php");
    exit();
}
?>