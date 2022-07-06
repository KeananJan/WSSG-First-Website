<?php
session_start();
include "DB_Connection.php";


// UPDATE clients
// SET cName = 'Keashia', cSurname= 'January'
// WHERE id = 1; EXAMPLE!!!


if(isset($_POST['surname']) && empty($_POST['email'])&&empty($_POST['password']))
{
    $id =$_SESSION['a_id'];
    

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $email = validation($_POST['email']);
    $password = validation($_POST['password']);

    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }

        $email =upperCase($_POST['email']);
        $surname =upperCase($_POST['surname']);

    // Update sql statement

    $update = "UPDATE clients SET aSurname = '$surname' WHERE a_id ='$id";
    
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
else if(empty($_POST['surname']) && ($_POST['email'])&&empty($_POST['password']))
{
    $id =$_SESSION['id'];
    

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $email = validation($_POST['email']);
    $password = validation($_POST['password']);

    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }

        $email =upperCase($_POST['email']);
        $surname =upperCase($_POST['surname']);

    // Update sql statement

    $update = "UPDATE clients SET cEmail = '$email' WHERE id ='$id";
    
    if ($conn->query($update) === TRUE) 
    {
        echo "<script>alert('Record Updated!');</script>";
        echo("<script>window.location ='userAccount.php';</script>");
    } 
      else 
      {
        
        echo "<script>alert('Record Not Updated!');</script>";
        echo("<script>window.location ='userAccount.php';</script>");
      }
   
}
