<?php
session_start();
include "DB_Connection.php";

//  Admin user updating details 
if(isset($_POST['surname']) && isset($_POST['email']) &&isset($_POST['phoneNum']) && isset($_POST['password']))
{
    $id =$_SESSION['a_id'];
    // echo"<script type='text/javascript'>alert('$id');</script>";

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        return $data;

    }
    $surname = validation($_POST['surname']);
    $email = validation($_POST['email']);
    $phoneNum = validation($_POST['phoneNum']);
    $password = validation($_POST['password']);

    function passwordEncryption($data)
    {
        // encrypts the password 
        $data = md5($data);
        return $data;
    }
    $password = passwordEncryption($password);

    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }

        $email =upperCase($_POST['email']);
        $surname =upperCase($_POST['surname']);

    // Update sql statement

    $update = "UPDATE adminusers
                SET 
                aSurname = '$surname',
                aEmail = '$email',
                aPhone ='$phoneNum',
                aPassword ='$password'
                WHERE a_id ='$id'";

    if($conn->query($update) === TRUE)
    {
        echo ("<script>alert('Record Updated!');</script>");
        echo("<script>window.location ='adminPage.php';</script>");
    } 
      else 
      {
        
        echo ("<script>alert('Record Not Updated!');</script>");
        echo("<script>window.location ='adminPage.php';</script>");
      }
   
}
else 
{
    echo ("<script>alert('You've Missed A Few Fields');</script>");
}

?>