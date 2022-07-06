<?php
session_start();
include "DB_Connection.php";


// UPDATE clients
// SET cName = 'Keashia', cSurname= 'January'
// WHERE id = 1; EXAMPLE!!!


if(isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phoneNum']))

{
    $id =$_SESSION['cID'];
    

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $email = validation($_POST['email']);
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
        $surname =upperCase($_POST['surname']);

    // Update sql statement

    $update =  "UPDATE clients 
                SET 
                cSurname = '$surname' ,
                cEmail = '$email',
                cPhone ='$phoneNum',
                cPassword='$password'

                WHERE cID ='$id'";
    
    if ($conn->query($update) === TRUE) 
    {
        echo ("<script>alert('Record Updated!');</script>");
        echo("<script>window.location ='userAccount.php';</script>");
    } 
      else 
      {
        
        echo ("<script>alert('Record Not Updated!');</script>");
        echo("<script>window.location ='userAccount.php';</script>");
      }
   
}

