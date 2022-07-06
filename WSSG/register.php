<?php

session_start(); 
include "DB_Connection.php";

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);

        return $data;

    }

    $email = validation($_POST['email']);
    $name = validation($_POST['name']);
    $surname = validation($_POST['surname']);
    $password = validation($_POST['password']);
    $phoneNum = validation($_POST['phoneNum']);

    function passwordEncryption($data)
    {
        // encrypts the password 
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
    $name =upperCase($_POST['name']);
    $surname =upperCase($_POST['surname']);

    if(empty($email))
    {
        header("Location: registerForm.php?error=Email/Username is needed!");
        exit();
    }
    else if(empty($name))
    {
        header("Location: registerForm.php?error=Name is needed!" );
        exit();
    }
    else if(empty($surname))
    {
        header("Location: registerForm.php?error=Surname is needed!" );
        exit();
    }
    else if(empty($password))
    {
        header("Location: registerForm.php?error=Passowrd is needed!" );
        exit();
    }
    else if(empty($phoneNum))
    {
        header("Location: registerForm.php?error=Phone number is needed!" );
        exit();
    }
    else
    {
        // check if the email exists already  
        $check ="SELECT * FROM clients WHERE cEmail = '$email'";
        $results = mysqli_query($conn,$check);

        if(mysqli_num_rows($results) === 1)
        {
            // to show the user is added and to redirect back to the registration form 
            echo "<script>alert('Account Alrerady Exist!');</script>";
            echo("<script>window.location ='registerForm.php';</script>");
        }else
        {
            // SQL statement to check what the user entered against what we have in the database 
        $insert = "INSERT INTO clients (cName,cSurname,cEmail,cPassword,cPhone)
        VALUES  ('$name','$surname','$email','$password','$phoneNum')";

         if ( $conn-> query($insert) == TRUE)
        {
            
            echo "<script>alert('Client was Added');</script>";
            echo("<script>window.location ='homePage.php';</script>");

                  
        }
			 

        }  
    }
?>